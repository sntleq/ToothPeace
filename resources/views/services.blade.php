<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>ToothPeace Login</title>
    <link rel="icon" href="{{ asset('pics/toothpeace_logo.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/service.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container" id="container">
        <div class="form-container services-type-container">
            <form action="#">
                <button type="button" class="ghost" id="backToServices" style="display:none;" onclick="goBackToServices()">Back to Services</button>
                <div class="services-type" id="content1">
                    <h1>Dental Appointments</h1>
                    <p>Schedule your dental appointments for regular check-ups, consultations, and more.</p>
                    <ul>
                        <li>Dental Cleaning</li>
                        <li>Dental Exam/Check-up</li>
                        <li>X-rays</li>
                    </ul>
                </div>
                <div class="services-type" id="content2" style="display:none;">
                    <h1>Restorative Treatments</h1>
                    <p>Learn more about our restorative treatments like fillings, crowns, bridges, and more.</p>
                    <ul>
                        <li>Tooth Filling</li>
                        <li>Tooth Extraction</li>
                        <li>Root Canal</li>
                        <li>Dental Crown</li>
                        <li>Bridge Placement</li>
                        <li>Dental Implants</li>
                        <li>Inlays/Onlays</li>
                    </ul>
                </div>
                <div class="services-type" id="content3" style="display:none;">
                    <h1>Preventive Treatments</h1>
                    <p>Discover cleanings, sealants, and fluoride treatments that help prevent cavities and gum disease.</p>
                    <ul>
                        <li>Flouride Treatment</li>
                        <li>Dental Sealants</li>
                        <li>Oral Cancer Screening</li>
                        <li>Deep Cleaning</li>
                    </ul>
                </div>

                <div class="services-type" id="content4" style="display:none;">
                    <h1>Cosmetic Dentistry</h1>
                    <p>Explore teeth whitening, veneers, and bonding options for a more confident smile.</p>
                    <ul>
                        <li>Teeth Whitening</li>
                        <li>Dental Bonding</li>
                        <li>Veeners</li>
                        <li>Smile Makeover</li>
                        <li>Gum Contouring</li>
                    </ul>
                </div>

                <div class="services-type" id="content5" style="display:none;">
                    <h1>Orthodontics</h1>
                    <p>Find out how braces and aligners can help you achieve straighter teeth and a better bite.</p>
                    <ul>
                        <li>Braces</li>
                        <li>Traditional Metal Braces</li>
                        <li>Clear Aligners</li>
                        <li>Retainers</li>
                    </ul>
                </div>

                <div class="services-type" id="content6" style="display:none;">
                    <h1>Oral Surgery</h1>
                    <p>Understand our surgical services including extractions, wisdom teeth removal, and more.</p>
                    <ul>
                        <li>Wisdom Tooth Extraction</li>
                        <li>Bone Grafting</li>
                    </ul>
                </div>

                <div class="services-type" id="content7" style="display:none;">
                    <h1>Pediatric Dentistry</h1>
                    <p>Gentle, expert care for your little ones—from their first tooth to early dental habits.</p>
                    <ul>
                        <li>Children’s Check-up</li>
                        <li>Fluoride Treatment for Kids</li>
                        <li>Pediatric Dental Cleaning</li>
                        <li>Space Maintainers</li>
                        <li>Sealants for Children</li>
                    </ul>
                </div>

                <div class="services-type" id="content8" style="display:none;">
                    <h1>Periodontics</h1>
                    <p>Specialized care for gum health, including treatment of gingivitis and periodontitis.</p>
                    <ul>
                        <li>Deep Cleaning</li>
                        <li>Gum Grafting</li>
                        <li>Periodontal Maintenance</li>
                        <li>Crown Lengthening</li>
                    </ul>
                </div>

                <div class="services-type" id="content9" style="display:none;">
                    <h1>Emergency Dentistry</h1>
                    <p>Quick response and urgent care for unexpected dental issues and accidents.</p>
                    <ul>
                        <li>Toothache Relief</li>
                        <li>Trauma Care</li>
                        <li>Abscess Treatment</li>
                        <li>Lost Filling / Crown Repair</li>
                        <li>Broken Tooth Restoration</li>
                    </ul>
                </div>
            </form>
        </div>

        <div class="form-container services-container">
            <form action="#">
                <button class="loginback" onclick="location.href='index'" type="button">Back</button>
                <h1>Dental Services</h1>
                <p>Check and select our dental services <br> below for more details</p>
                <div class="buttons" id="serviceButtons">
                    <button type="button" class="ghost" id="service1" onclick="showService('content1', 'pics/dental_appointments.png')">Dental Appointments</button>
                    <button type="button" class="ghost" id="service2" onclick="showService('content2', 'pics/restorative_treatment.png')">Restorative Treatments</button>
                    <button type="button" class="ghost" id="service3" onclick="showService('content3', 'pics/preventive_treatments.png')">Preventive Treatments</button>
                    <button type="button" class="ghost" id="service4" onclick="showService('content4', 'pics/cosmetic_dentistry.png')">Cosmetic Dentistry</button>
                    <button type="button" class="ghost" id="service5" onclick="showService('content5', 'pics/orthodontics.png')">Orthodontics</button>
                    <button type="button" class="ghost" id="service6" onclick="showService('content6', 'pics/oral_surgery.png')">Oral Surgery</button>
                    <button type="button" class="ghost" id="service7" onclick="showService('content7', 'pics/pediatric_dentistry.png')">Pediatric Dentistry</button>
                    <button type="button" class="ghost" id="service8" onclick="showService('content8', 'pics/periodontics.png')">Periodontics</button>
                    <button type="button" class="ghost" id="service9" onclick="showService('content9', 'pics/emergency_dentistry.png')">Emergency Dentistry</button>
                </div>
            </form>
        </div>


        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <img id="overlay-left-img" src="{{ asset('pics/default_pic.png') }}" alt="Dental" />
                </div>
                <div class="overlay-panel overlay-right">
                    <img src="{{ asset('pics/dental_services.png') }}" alt="Dental" />
                </div>
            </div>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 ToothPeace Dental Clinic</p>
    </footer>

    <script src="{{ asset('js/services.js') }}"></script>
</body>
</html>
