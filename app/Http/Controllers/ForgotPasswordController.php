<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Mail\PasswordResetMail;
use App\Models\Patient;
use App\Models\Dentist;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Mail\Mailer;


class ForgotPasswordController extends Controller
{
    /**
     * Show the forgot password form
     */
    public function showForgotPasswordForm()
    {
        return view('forgot_pass'); // Ensure this matches the view file
    }

    /**
     * Send password reset code via email
     */
    public function sendResetCode(Request $request)
    {
        try {
            $request->validate(['email' => 'required|email']);
    
            $email = $request->email;
            
            // Rate limit email sending (3 per hour per email/IP combo)
            $emailIpKey = Str::lower($email).'|'.request()->ip();
            if (RateLimiter::tooManyAttempts($emailIpKey, 3)) {
                $seconds = RateLimiter::availableIn($emailIpKey);
                $minutes = ceil($seconds / 60);
                
                return response()->json([
                    'success' => false,
                    'message' => "Too many reset attempts. Please try again in {$minutes} minutes."
                ], 429);
            }
            
            $userType = $this->getUserType($email);
    
            if (!$userType) {
                \Log::info("Password reset attempted for non-existent email: {$email}");
            
                return response()->json([
                    'success' => false,
                    'message' => 'Email is not registered in our system.'
                ]);
            }
            
    
            // Create a more secure code - 8 digits instead of 6
            $code = sprintf("%08d", mt_rand(0, 99999999));
    
            // Ensure consistent table names
            $resetTable = $userType === 'patient' ? 'password_resets_patients' : 'password_resets_dentists';
    
            DB::beginTransaction();
            try {
                // Clear existing reset codes
                DB::table($resetTable)->where('email', $email)->delete();
                
                // Store new reset code with attempts counter
                DB::table($resetTable)->insert([
                    'email' => $email,
                    'token' => Hash::make($code),
                    'created_at' => Carbon::now(),
                    'attempts' => 0 // Initialize attempts counter
                ]);
                
                // Send email with error catching
                try {
                    Mail::to($email)->send(new PasswordResetMail($code));
                    
                } catch (\Exception $mailError) {
                    \Log::error('Mail sending error: ' . $mailError->getMessage());
                    throw $mailError;
                }
                
                DB::commit();
                
                // Record this attempt
                RateLimiter::hit($emailIpKey, 3600); // Key expires after 1 hour
                
                return response()->json([
                    'success' => true,
                    'message' => 'We have sent a password reset code to your email!'
                ]);
            } catch (\Exception $e) {
                DB::rollBack();
                throw $e;
            }
        } catch (\Exception $e) {
            \Log::error('Password reset error details:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'oten' .$e->getMessage()
            ], 500);
        }
    }

    /**
     * Verify code and reset password
     */
    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email',
                'code' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);

            $email = $request->email;
            $userType = $this->getUserType($email);
            
            // For security, use generic error messages
            if (!$userType) {
                return response()->json([
                    'success' => false, 
                    'message' => 'Invalid or expired reset code. Please request a new one.'
                ]);
            }
            
            // Determine the reset table
            $resetTable = $userType === 'patient' ? 'password_resets_patients' : 'password_resets_dentists';
            
            // Find the reset record
            $resetRecord = DB::table($resetTable)
                ->where('email', $email)
                ->first();
                
            if (!$resetRecord) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid or expired reset code. Please request a new one.'
                ]);
            }
            
            // Check if too many failed attempts (5 max)
            if ($resetRecord->attempts >= 5) {
                DB::table($resetTable)->where('email', $email)->delete();
                return response()->json([
                    'success' => false,
                    'message' => 'Too many failed attempts. Please request a new code.'
                ]);
            }
            
            // Verify the token
            if (!Hash::check($request->code, $resetRecord->token)) {
                // Increment the attempts counter
                DB::table($resetTable)
                    ->where('email', $email)
                    ->update(['attempts' => DB::raw('attempts + 1')]);
                    
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid reset code.'
                ]);
            }
            
            // Update password in the appropriate table
            if ($userType === 'patient') {
                Patient::where('email', $email)->update([
                    'password' => Hash::make($request->password)
                ]);
            } else {
                Dentist::where('email', $email)->update([
                    'password' => Hash::make($request->password)
                ]);
            }
            
            // Log successful password reset (for audit purposes)
            \Log::info("Password reset successful for {$userType}: {$email}");
            
            // Delete the used token
            DB::table($resetTable)->where('email', $email)->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Password has been reset successfully!'
            ]);
        } catch (\Exception $e) {
            \Log::error('Password reset error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while resetting your password. Please try again.'
            ], 500);
        }
    }
    
    /**
     * Determine if email belongs to a patient or dentist
     */
    private function getUserType($email)
    {
        $patient = Patient::where('email', $email)->first();
        if ($patient) {
            return 'patient';
        }
        
        $dentist = Dentist::where('email', $email)->first();
        if ($dentist) {
            return 'dentist';
        }
        
        return null;
    }   
}