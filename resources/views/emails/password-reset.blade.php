<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Reset</title>
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .container {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 150px;
            margin-bottom: 15px;
        }
        h1 {
            color: #2e84c5;
            margin-bottom: 20px;
        }
        .code-container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 15px;
            text-align: center;
            margin: 20px 0;
            border: 1px solid #e0e0e0;
        }
        .code {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            letter-spacing: 5px;
        }
        .expiry {
            margin-top: 20px;
            color: #666;
            font-size: 14px;
        }
        .footer {
            margin-top: 30px;
            font-size: 12px;
            color: #666;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ url('pics/toothpeace_logo.png') }}" alt="ToothPeace Logo" class="logo">
            <h1>Password Reset</h1>
        </div>
        
        <p>Hello,</p>
        
        <p>We received a request to reset your password for your ToothPeace Dental Clinic account. Please use the verification code below to complete the password reset process:</p>
        
        <div class="code-container">
            <div class="code">{{ $code }}</div>
        </div>
        
        <p><strong>Important:</strong> This code will expire in 15 minutes for security reasons.</p>
        
        <p>If you did not request this password reset, please ignore this email and ensure your account is secure.</p>
        
        <p>Thank you,<br>
        ToothPeace Dental Clinic Team</p>
        
        <div class="expiry">
            <p>This is an automated email. Please do not reply to this message.</p>
        </div>
    </div>
    
    <div class="footer">
        <p>&copy; 2025 ToothPeace Dental Clinic. All rights reserved.</p>
    </div>
</body>
</html>