<?php
session_start();
include "db.php";

$alert_html = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['full_name'])) {
    
    // 1. Sanitize text inputs
    $name = strip_tags($_POST['full_name']);
    $phone = strip_tags($_POST['phone']);
    $email = strip_tags($_POST['email']);
    $issue_type = strip_tags($_POST['issue_type']);
    $description = strip_tags($_POST['description']);
    $support_type = strip_tags($_POST['support_type']);
    
    $evidence_path = NULL;
    $audio_path = NULL;

    // 2. Create upload directories if they don't exist
    if (!file_exists('uploads/evidence')) {
        mkdir('uploads/evidence', 0777, true);
    }
    if (!file_exists('uploads/audio')) {
        mkdir('uploads/audio', 0777, true);
    }

    // 3. Handle Evidence File Upload
    if (isset($_FILES['evidence']) && $_FILES['evidence']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['evidence']['tmp_name'];
        // Clean filename to prevent issues
        $file_name = preg_replace("/[^a-zA-Z0-9.]/", "_", basename($_FILES['evidence']['name']));
        $unique_file_name = time() . '_' . $file_name;
        $destination = 'uploads/evidence/' . $unique_file_name;
        
        if (move_uploaded_file($file_tmp, $destination)) {
            $evidence_path = $destination;
        }
    }

    // 4. Handle Audio Base64 Upload
    $audio_data = isset($_POST['audio_base64']) ? $_POST['audio_base64'] : '';
    if (!empty($audio_data)) {
        $audio_parts = explode(',', $audio_data);
        if (count($audio_parts) == 2) {
            $audio_decoded = base64_decode($audio_parts[1]);
            $unique_audio_name = 'audio_' . time() . '.webm';
            $audio_destination = 'uploads/audio/' . $unique_audio_name;
            
            if (file_put_contents($audio_destination, $audio_decoded)) {
                $audio_path = $audio_destination;
            }
        }
    }

    // 5. Insert Securely into Database
    $stmt = $conn->prepare("INSERT INTO legal_applications (full_name, phone, email, issue_type, description, support_type, evidence_path, audio_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    
    // Bind parameters: "ssssssss" means 8 strings
    $stmt->bind_param("ssssssss", $name, $phone, $email, $issue_type, $description, $support_type, $evidence_path, $audio_path);

    if ($stmt->execute()) {
        $alert_html = "
        <div class='alert alert-success border-0 shadow-sm rounded-4 p-4 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
            <i class='fas fa-check-circle fs-2 text-success me-3'></i>
            <div>
                <h5 class='alert-heading fw-bold mb-1'>Application Submitted Successfully</h5>
                <p class='mb-0 text-muted'>Your case details have been securely saved. Our legal team will review your application and contact you soon.</p>
            </div>
        </div>";
    } else {
        $alert_html = "
        <div class='alert alert-danger border-0 shadow-sm rounded-4 p-4 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
            <i class='fas fa-exclamation-circle fs-2 text-danger me-3'></i>
            <div>
                <h5 class='alert-heading fw-bold mb-1'>Submission Failed</h5>
                <p class='mb-0 text-muted'>We encountered a system error while saving your details. Please try again.</p>
            </div>
        </div>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Free Legal Aid | SafeHer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --brand: #6a5acd;
            --brand-dark: #4b3ca7;
            --muted-bg: #f8f9fc;
            --card-radius: 20px;
            --text-main: #2d3748;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--muted-bg);
            color: var(--text-main);
            overflow-x: hidden;
            scroll-behavior: smooth;
            padding-top: 76px;
        }

        .custom-navbar {
            background: linear-gradient(135deg, #4b3ca7, #6a5acd);
            padding: 12px 0;
        }
        .brand-text {
            font-size: 1.8rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #ffffff !important;
        }
        .brand-accent { color: #ffd700; }
        
        .btn-glass {
            background: rgba(255,255,255,0.15);
            color: #ffffff;
            border: 1px solid rgba(255,255,255,0.25);
            backdrop-filter: blur(8px);
            transition: all 0.3s ease;
        }
        .btn-glass:hover {
            background: rgba(255,255,255,0.25);
            color: #ffffff;
        }

        .lang-toggle {
            background: rgba(255, 215, 0, 0.2);
            color: #ffd700;
            border-color: rgba(255, 215, 0, 0.4);
            font-weight: bold;
        }
        .lang-toggle:hover {
            background: rgba(255, 215, 0, 0.3);
            color: #ffffff;
        }

        .hero-section {
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(106, 90, 205, 0.95)), url('https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
            padding: 100px 0 100px 0;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(106, 90, 205, 0.2);
            color: white;
            position: relative;
        }

        .hero-title {
            font-weight: 800;
            font-size: 3.5rem;
            line-height: 1.2;
            margin-bottom: 20px;
        }

        .badge-safety {
            background-color: rgba(255,255,255,0.2);
            backdrop-filter: blur(5px);
            color: white;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 50px;
            border: 1px solid rgba(255,255,255,0.3);
            display: inline-block;
        }

        .card-modern {
            background: #fff;
            border: none;
            border-radius: var(--card-radius);
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            overflow: hidden;
        }

        .how-it-works-box {
            background: linear-gradient(145deg, #ffffff, #f0f4f8);
            border: 1px solid #e2e8f0;
            border-radius: var(--card-radius);
            padding: 40px;
            height: 100%;
        }

        .icon-circle {
            width: 50px;
            height: 50px;
            background: rgba(106, 90, 205, 0.1);
            color: var(--brand);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 15px;
        }

        .form-control-custom {
            background-color: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 1rem;
            color: var(--text-main);
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            outline: none;
            background-color: #ffffff;
            border-color: var(--brand);
            box-shadow: 0 0 0 4px rgba(106, 90, 205, 0.1);
        }

        .form-label {
            font-weight: 600;
            color: #4a5568;
            margin-bottom: 8px;
        }

        .support-card {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
        }

        .support-card:hover {
            border-color: #cbd5e1;
            background: #f8fafc;
        }

        .support-card input[type="radio"] {
            position: absolute;
            opacity: 0;
        }

        .support-card input[type="radio"]:checked + .support-content {
            color: var(--brand);
        }

        .support-card:has(input[type="radio"]:checked) {
            border-color: var(--brand);
            background: rgba(106, 90, 205, 0.05);
            box-shadow: 0 4px 15px rgba(106, 90, 205, 0.1);
        }

        .audio-recorder {
            background: #f8fafc;
            border: 2px dashed #cbd5e1;
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
        }

        .audio-recorder.recording {
            border-color: #ff4d4f;
            background: rgba(255, 77, 79, 0.05);
        }

        .btn-record {
            background: #cbd5e1;
            color: white;
            border: none;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px auto;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        .btn-record.recording {
            background: #ff4d4f;
            animation: pulseRecord 1.5s infinite;
        }

        @keyframes pulseRecord {
            0% { box-shadow: 0 0 0 0 rgba(255, 77, 79, 0.4); }
            70% { box-shadow: 0 0 0 15px rgba(255, 77, 79, 0); }
            100% { box-shadow: 0 0 0 0 rgba(255, 77, 79, 0); }
        }

        .btn-submit {
            background: linear-gradient(135deg, var(--brand), var(--brand-dark));
            color: white;
            border: none;
            border-radius: 50px;
            padding: 16px 40px;
            font-weight: 700;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(106, 90, 205, 0.3);
            width: 100%;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(106, 90, 205, 0.4);
            color: white;
        }

        .footer-modern {
            background: #1a202c;
            color: #a0aec0;
            padding: 60px 0 30px 0;
            margin-top: 60px;
        }
        .footer-modern h5 { color: #fff; font-weight: 600; margin-bottom: 20px; }
        .footer-modern a { color: #a0aec0; text-decoration: none; transition: color 0.3s; }
        .footer-modern a:hover { color: var(--brand); }

        .js-fadeIn { opacity: 0; transform: translateY(30px); transition: 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .js-fadeIn.visible { opacity: 1; transform: translateY(0); }

        #scrollTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--text-main);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            transition: background-color 0.3s;
        }
        #scrollTop:hover { background-color: var(--brand); }
    </style>
</head>
<body>

<button id="scrollTop" onclick="scrollToTop()"><i class="fas fa-arrow-up"></i></button>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="index.php">
            Safe<span class="brand-accent">Her</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobileMenu">
            <div class="navbar-nav ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0 text-center">
                <button onclick="toggleLanguage()" class="btn btn-glass lang-toggle" id="langToggleBtn">
                    <i class="fas fa-language me-1"></i> <span id="currentLangText">A/अ</span>
                </button>
                <a class="btn btn-glass" href="basic_info.php">Basic Information</a>
                <a class="btn btn-glass" href="add_place.php">Add Place</a>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-danger px-4 rounded-pill fw-bold" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-primary px-4 rounded-pill fw-bold" href="login.php" style="background: #ffffff; color: var(--brand);">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 js-fadeIn">
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-scale-balanced me-2"></i>Pro-Bono Legal Support</span>
                <h1 class="hero-title" data-i18n="hero_title">Expert Legal Aid, Accessible to You</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Justice shouldn't depend on your financial capacity. Submit your case details, evidence, and voice statement securely. Our dedicated network of lawyers reviews every submission personally to help those who need it most.</p>
                <div class="mt-4">
                    <p class="text-white small fw-bold opacity-75"><i class="fas fa-lock me-2"></i>100% Confidential & Secure Submission</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container" style="margin-top: -40px; position: relative; z-index: 10;">
    <div class="row g-4">
        
        <div class="col-lg-4 js-fadeIn">
            <div class="how-it-works-box">
                <h4 class="fw-bold mb-4 border-bottom pb-3">How We Operate</h4>
                
                <div class="mb-4">
                    <div class="icon-circle"><i class="fas fa-filter"></i></div>
                    <h6 class="fw-bold">Selective Process</h6>
                    <p class="small text-muted mb-0">We operate as a social initiative. Because our pro-bono legal capacity is finite, our panel carefully selects cases prioritizing the most severe violations and vulnerable individuals.</p>
                </div>
                
                <div class="mb-4">
                    <div class="icon-circle"><i class="fas fa-user-tie"></i></div>
                    <h6 class="fw-bold">Personalized Attention</h6>
                    <p class="small text-muted mb-0">If selected, an experienced lawyer will be assigned to guide you personally through your legal options, FIR filing, or court procedures.</p>
                </div>

                <div class="mb-4">
                    <div class="icon-circle"><i class="fas fa-hand-holding-heart"></i></div>
                    <h6 class="fw-bold">Sustainable Support</h6>
                    <p class="small text-muted mb-0">Our services are fundamentally free. However, if you are financially stable, selecting the 'Nominal Contribution' option allows us to fund cases for women who have zero resources.</p>
                </div>

                <div class="mt-5 p-3 bg-white rounded shadow-sm border border-light">
                    <p class="small text-danger fw-bold mb-1"><i class="fas fa-exclamation-circle me-1"></i>Emergency?</p>
                    <p class="small text-muted mb-0">This form is for legal review, which takes 24-48 hours. If you are in immediate physical danger, dial <strong>112</strong> right now.</p>
                </div>
            </div>
        </div>

        <div class="col-lg-8 js-fadeIn" style="animation-delay: 0.1s;">
            <div class="card-modern p-4 p-md-5">
                <h3 class="fw-bold mb-1">Confidential Case Submission</h3>
                <p class="text-muted mb-4">Provide as much detail as possible to help our legal team evaluate your situation accurately.</p>

                <?php echo $alert_html; ?>

                <form method="POST" enctype="multipart/form-data" id="legalAidForm">
                    
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="full_name" class="form-control-custom w-100" required placeholder="Enter your legal name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Contact Number</label>
                            <input type="tel" name="phone" class="form-control-custom w-100" required placeholder="Safe phone number">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control-custom w-100" required placeholder="Safe email address">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Primary Legal Issue</label>
                            <select name="issue_type" class="form-control-custom w-100" required>
                                <option value="" disabled selected>Select category...</option>
                                <option value="Domestic Violence">Domestic Violence</option>
                                <option value="Sexual Assault">Sexual Assault</option>
                                <option value="Cyber Crime">Cyber Crime / Deepfakes</option>
                                <option value="Stalking">Stalking / Harassment</option>
                                <option value="Dowry/Property">Dowry & Property Dispute</option>
                                <option value="Workplace Harassment">Workplace Harassment (POSH)</option>
                                <option value="Other">Other Civil/Criminal Issue</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Detailed Description of the Incident</label>
                        <textarea name="description" class="form-control-custom w-100" rows="5" required placeholder="Please explain the timeline of events, the parties involved, and any actions you have taken so far (e.g., filed an FIR)."></textarea>
                    </div>

                    <div class="row g-4 mb-4">
                        <div class="col-md-6">
                            <label class="form-label d-block mb-2">Upload Evidence (Optional)</label>
                            <div class="p-3 bg-light border rounded-3 text-center">
                                <i class="fas fa-cloud-upload-alt text-muted fs-3 mb-2"></i><br>
                                <input type="file" name="evidence" class="form-control form-control-sm mt-2" accept=".jpg,.jpeg,.png,.pdf,.doc,.docx">
                                <small class="text-muted d-block mt-1">Screenshots, medical reports, or PDFs.</small>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <label class="form-label d-block mb-2">Record Voice Statement (Optional)</label>
                            <div class="audio-recorder" id="recorderContainer">
                                <button type="button" class="btn-record" id="recordButton">
                                    <i class="fas fa-microphone" id="recordIcon"></i>
                                </button>
                                <div id="recordStatus" class="small fw-bold text-muted mb-2">Click to start recording</div>
                                <audio id="audioPlayback" controls class="w-100 d-none mt-2"></audio>
                                <button type="button" id="clearAudio" class="btn btn-sm btn-outline-danger mt-2 d-none">Delete Recording</button>
                                <input type="hidden" name="audio_base64" id="audioInput">
                            </div>
                        </div>
                    </div>

                    <div class="mb-5">
                        <label class="form-label mb-3">Select Support Model</label>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="support-card w-100 h-100">
                                    <input type="radio" name="support_type" value="Free Legal Aid" required>
                                    <div class="support-content">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="fw-bold mb-0">Free Legal Aid</h6>
                                            <i class="fas fa-check-circle fs-5"></i>
                                        </div>
                                        <p class="small text-muted mb-0">I am seeking pro-bono assistance. I do not have the financial means to hire private legal counsel.</p>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-6">
                                <label class="support-card w-100 h-100">
                                    <input type="radio" name="support_type" value="Nominal Contribution">
                                    <div class="support-content">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="fw-bold mb-0">Nominal Contribution</h6>
                                            <i class="fas fa-check-circle fs-5"></i>
                                        </div>
                                        <p class="small text-muted mb-0">I can afford a nominal consulting fee. My contribution will help subsidize free aid for vulnerable women.</p>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <p class="small text-muted mb-3"><i class="fas fa-shield-alt text-success me-1"></i> By submitting, you consent to our legal team reviewing your sensitive data confidentially.</p>
                        <button type="submit" class="btn-submit">Submit Application for Review</button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>

<footer class="footer-modern text-center">
    <div class="container">
        <div class="text-center small">
            © <?php echo date("Y"); ?> SafeHer Social Legal Initiative. All Rights Reserved. Emergency: Dial 112.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const recordButton = document.getElementById('recordButton');
        const recordIcon = document.getElementById('recordIcon');
        const recordStatus = document.getElementById('recordStatus');
        const audioPlayback = document.getElementById('audioPlayback');
        const audioInput = document.getElementById('audioInput');
        const recorderContainer = document.getElementById('recorderContainer');
        const clearAudioBtn = document.getElementById('clearAudio');

        let mediaRecorder;
        let audioChunks = [];
        let isRecording = false;

        recordButton.addEventListener('click', async () => {
            if (!isRecording) {
                try {
                    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
                    mediaRecorder = new MediaRecorder(stream);
                    
                    mediaRecorder.ondataavailable = event => {
                        audioChunks.push(event.data);
                    };

                    mediaRecorder.onstop = () => {
                        const audioBlob = new Blob(audioChunks, { type: 'audio/webm' });
                        const audioUrl = URL.createObjectURL(audioBlob);
                        audioPlayback.src = audioUrl;
                        audioPlayback.classList.remove('d-none');
                        clearAudioBtn.classList.remove('d-none');
                        
                        const reader = new FileReader();
                        reader.readAsDataURL(audioBlob);
                        reader.onloadend = function() {
                            audioInput.value = reader.result;
                        }
                    };

                    audioChunks = [];
                    mediaRecorder.start();
                    isRecording = true;
                    
                    recordButton.classList.add('recording');
                    recorderContainer.classList.add('recording');
                    recordIcon.className = 'fas fa-stop';
                    recordStatus.innerText = "Recording... Click to stop";
                    recordStatus.classList.add('text-danger');
                    audioPlayback.classList.add('d-none');
                    clearAudioBtn.classList.add('d-none');

                } catch (err) {
                    alert("Microphone access denied or not available. Please check browser permissions.");
                }
            } else {
                mediaRecorder.stop();
                mediaRecorder.stream.getTracks().forEach(track => track.stop());
                isRecording = false;
                
                recordButton.classList.remove('recording');
                recorderContainer.classList.remove('recording');
                recordIcon.className = 'fas fa-microphone';
                recordStatus.innerText = "Recording saved";
                recordStatus.classList.remove('text-danger');
                recordStatus.classList.add('text-success');
            }
        });

        clearAudioBtn.addEventListener('click', () => {
            audioPlayback.src = "";
            audioPlayback.classList.add('d-none');
            clearAudioBtn.classList.add('d-none');
            audioInput.value = "";
            audioChunks = [];
            recordStatus.innerText = "Click to start recording";
            recordStatus.classList.remove('text-success');
        });

        const faders = document.querySelectorAll('.js-fadeIn');
        const appearOptions = { threshold: 0.1, rootMargin: "0px 0px -50px 0px" };

        const appearOnScroll = new IntersectionObserver(function(entries, appearOnScroll) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    appearOnScroll.unobserve(entry.target);
                }
            });
        }, appearOptions);

        faders.forEach(fader => appearOnScroll.observe(fader));

        window.onscroll = function() { scrollFunction(); };
        function scrollFunction() {
            const btn = document.getElementById("scrollTop");
            if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
                btn.style.display = "flex";
            } else {
                btn.style.display = "none";
            }
        }
    });

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    const translations = {
        en: {
            nav_profile: "My Space",
            nav_logout: "Logout",
            nav_login: "Login",
            hero_badge: "Pro-Bono Legal Support",
            hero_title: "Expert Legal Aid, Accessible to You",
            hero_desc: "Justice shouldn't depend on your financial capacity. Submit your case details, evidence, and voice statement securely. Our dedicated network of lawyers reviews every submission personally to help those who need it most."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "निःशुल्क कानूनी सहायता",
            hero_title: "विशेषज्ञ कानूनी सहायता, आप तक पहुंच",
            hero_desc: "न्याय आपकी वित्तीय क्षमता पर निर्भर नहीं होना चाहिए। अपने मामले का विवरण, सबूत और वॉयस स्टेटमेंट सुरक्षित रूप से जमा करें। हमारे वकीलों का नेटवर्क हर आवेदन की व्यक्तिगत रूप से समीक्षा करता है ताकि जरूरतमंदों की मदद की जा सके।"
        }
    };

    let currentLanguage = 'en';

    function toggleLanguage() {
        currentLanguage = currentLanguage === 'en' ? 'hi' : 'en';
        document.getElementById('html-tag').setAttribute('lang', currentLanguage);
        document.getElementById('currentLangText').innerText = currentLanguage === 'en' ? 'हिन्दी' : 'English';
        
        const elements = document.querySelectorAll('[data-i18n]');
        elements.forEach(element => {
            const key = element.getAttribute('data-i18n');
            if (translations[currentLanguage][key]) {
                element.innerText = translations[currentLanguage][key];
            }
        });
    }
</script>

</body>
</html>