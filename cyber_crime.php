<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cyber Crime & Deepfakes | SafeHer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --brand: #6a5acd;
            --muted-bg: #f8f9fc;
            --card-radius: 16px;
            --text-main: #2d3748;
            --accent-warm: #ff4d4f;
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(106, 90, 205, 0.95)), url('https://images.unsplash.com/photo-1614064641913-6b83f3f50280?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
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

        .tts-btn {
            background: #ffffff;
            color: var(--brand);
            border-radius: 50px;
            padding: 14px 35px;
            border: none;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
            font-weight: 700;
            font-size: 1.1rem;
            margin-top: 30px;
        }
        .tts-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            background: #f8f9fc;
        }

        section { padding: 80px 0; }
        
        .section-title {
            font-weight: 800;
            margin-bottom: 15px;
            color: var(--brand);
        }

        .section-subtitle {
            color: var(--text-muted);
            margin-bottom: 50px;
            font-weight: 400;
            font-size: 1.1rem;
        }

        .card-modern {
            background: #fff;
            border: none;
            border-radius: var(--card-radius);
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
            transition: 0.3s ease;
            height: 100%;
        }
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 25px rgba(106, 90, 205, 0.1);
        }

        .card-icon {
            font-size: 2.8rem;
            color: var(--brand);
            margin-bottom: 25px;
            background: rgba(106, 90, 205, 0.1);
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 20px;
        }

        .visual-flow-section {
            background: #fff;
            border-radius: var(--card-radius);
            padding: 60px 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.05);
        }

        .flow-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
            gap: 30px;
        }

        .flow-item {
            border-radius: 16px;
            padding: 25px;
            text-align: center;
            background: var(--muted-bg);
            position: relative;
            transition: 0.3s ease;
        }
        .flow-item:hover {
            background: #fff;
            box-shadow: 0 10px 25px rgba(0,0,0,0.08);
        }

        .flow-item img {
            width: 100%;
            height: 180px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 20px;
            background-color: var(--brand);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 1.2rem;
            box-shadow: 0 4px 10px rgba(106, 90, 205, 0.4);
        }

        .flow-desc { font-weight: 700; color: var(--text-main); margin-top: 10px; font-size: 1.1rem; }

        .footer-modern {
            background: #1a202c;
            color: #a0aec0;
            padding: 60px 0 30px 0;
            margin-top: 60px;
        }
        .footer-modern h5 { color: #fff; font-weight: 600; margin-bottom: 20px; }
        .footer-modern a { color: #a0aec0; text-decoration: none; transition: color 0.3s; }
        .footer-modern a:hover { color: var(--brand); }

        .btn-emergency-pill {
            background-color: var(--accent-warm);
            color: white;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 700;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 77, 79, 0.3);
        }
        .btn-emergency-pill:hover {
            background-color: #e6352b;
            color: white;
            transform: scale(1.05);
        }

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

        @media (max-width: 768px) {
            .hero-section { border-radius: 0 0 30px 30px; padding: 60px 0; }
            .hero-title { font-size: 2.5rem; }
            .visual-flow-section { padding: 40px 20px; }
        }
    </style>
</head>
<body>

<button id="scrollTop" onclick="scrollToTop()"><i class="fas fa-arrow-up"></i></button>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="../index.php">
            Safe<span class="brand-accent">Her</span>
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu" aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mobileMenu">
            <div class="navbar-nav ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0 text-center">
                
                <button onclick="toggleLanguage()" class="btn btn-glass lang-toggle" id="langToggleBtn">
                    <i class="fas fa-language me-1"></i> <span id="currentLangText">A/अ</span>
                </button>

                <a class="btn btn-glass" href="../basic_info.php">Basic Information</a>
                <a class="btn btn-glass" href="../add_place.php">Add Place</a>
                
                <div class="dropdown">
                    <button class="btn btn-glass dropdown-toggle w-100" type="button" id="womenProblemsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Select an Issue
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;" aria-labelledby="womenProblemsDropdown">
                        <li><h6 class="dropdown-header">Safety & Legal Crimes</h6></li>
                        <li><a class="dropdown-item" href="../domestic_violence.php">Domestic Violence & Cruelty</a></li>
                        <li><a class="dropdown-item" href="../sexual_assault.php">Sexual Assault & Rape</a></li>
                        <li><a class="dropdown-item" href="cyber_crime.php">Cyber Crime & Deepfakes</a></li>
                        <li><a class="dropdown-item" href="stalking_voyeurism.php">Stalking & Voyeurism</a></li>
                        <li><a class="dropdown-item" href="dowry_harassment.php">Dowry Harassment</a></li>
                        <li><a class="dropdown-item" href="human_trafficking.php">Human Trafficking</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Workplace & Economics</h6></li>
                        <li><a class="dropdown-item" href="workplace_harassment.php">Workplace Harassment (POSH)</a></li>
                        <li><a class="dropdown-item" href="wage_gap.php">Gender Wage Gap & Discrimination</a></li>
                        <li><a class="dropdown-item" href="maternity_rights.php">Maternity & Pregnancy Rights</a></li>
                        <li><a class="dropdown-item" href="property_rights.php">Inheritance & Property Rights</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Health & Social Issues</h6></li>
                        <li><a class="dropdown-item" href="child_marriage.php">Child Marriage</a></li>
                        <li><a class="dropdown-item" href="reproductive_health.php">Reproductive Health & Abortion Rights</a></li>
                        <li><a class="dropdown-item" href="mental_health.php">Mental Health & Social Stigma</a></li>
                        <li><a class="dropdown-item" href="education_bias.php">Access to Education</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item fw-bold text-danger" href="../emergency_contacts.php">Emergency Helpline Numbers</a></li>
                        <li><a class="dropdown-item fw-bold text-primary" href="../legal_aid.php">Find Free Legal Aid</a></li>
                    </ul>
                </div>

                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-danger px-4 rounded-pill fw-bold" href="../logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-primary px-4 rounded-pill fw-bold" href="../login.php" style="background: #ffffff; color: var(--brand);">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 js-fadeIn">
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-laptop-code me-2"></i>Digital Rights & Safety</span>
                <h1 class="hero-title" data-i18n="hero_title">Cyber Crime: Reclaim Your Digital Space</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Protect your identity and digital footprint. Understand the laws against cyberstalking, non-consensual image sharing, revenge porn, and deepfakes. You have the right to exist online without harassment.</p>
                
                <div class="mt-5">
                    <button class="tts-btn" onclick="toggleSpeak()">
                        <i class="fas fa-volume-up me-2"></i> <span id="speakBtnText" data-i18n="btn_listen">Listen Audio Guide</span>
                    </button>
                    <p class="text-white small mt-3 opacity-75" data-i18n="btn_listen_sub">*(If you cannot read, click this button to listen)*</p>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="data-insights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="chart_title">Digital Safety Awareness</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Online abuse is real abuse. As cyber laws strengthen, more women are coming forward to report digital crimes and take down malicious content.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative reporting trends for functional demonstration.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The Indian IT Act and BNS strictly penalize online abuse and privacy violations.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-shield-halved"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">The Information Technology (IT) Act</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Section 66E (Privacy):</strong> <span class="text-muted" data-i18n="art_14_d">Capturing, publishing, or transmitting images of a private area without consent is a crime.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Section 66C (Identity Theft):</strong> <span class="text-muted" data-i18n="art_15_d">Fraudulent use of your electronic signature or password (creating fake profiles).</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Section 67 (Obscenity):</strong> <span class="text-muted" data-i18n="art_21_d">Publishing or transmitting sexually explicit material in electronic form.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Protections Under BNS</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">Stalking (BNS context):</strong> <span class="text-muted" data-i18n="bns_63_d">Monitoring your internet, email, or electronic communication to harass you.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">Outraging Modesty Online:</strong> <span class="text-muted" data-i18n="bns_74_d">Words, gestures, or acts intended to insult your modesty via digital platforms.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Takedown Rights:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">You have the right to demand platforms to remove morphed images or revenge porn within 24 hours of reporting.</span></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="invasion" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="abuse_title">Identify the Violations</h2>
            <p class="section-subtitle" data-i18n="abuse_sub">Recognize the different forms of digital harassment so you can report them effectively.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-user-ninja text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Deepfakes & Morphing</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Using AI or editing tools to map your face onto explicit or inappropriate media.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-eye text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Cyberstalking</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Unwanted, continuous surveillance, tracking, or messaging across social media platforms.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-image text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Non-Consensual Sharing</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Revenge porn or distributing private, intimate images/videos without your explicit permission.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-id-card text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Identity Theft</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Creating fake profiles using your name, photos, and details to defame you or trick others.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="action-flow" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="guide_title">Emergency Digital Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Follow these immediate steps if you are a victim of cyber harassment or deepfakes.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?auto=format&fit=crop&w=600&q=80" alt="Save Evidence">
                    <p class="flow-desc" data-i18n="step1_title">Capture Evidence</p>
                    <p class="text-muted small" data-i18n="step1_desc">Do not delete the messages yet. Take screenshots, copy profile URLs, and save the content as proof.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1621360841013-c76831f1e35d?auto=format&fit=crop&w=600&q=80" alt="Block User">
                    <p class="flow-desc" data-i18n="step2_title">Block & Report In-App</p>
                    <p class="text-muted small" data-i18n="step2_desc">Use the social media platform's built-in tools to block the abuser and report the specific content for a takedown.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1593642532744-d377ab507dc8?auto=format&fit=crop&w=600&q=80" alt="National Cyber Crime">
                    <p class="flow-desc" data-i18n="step3_title">File Cyber Complaint</p>
                    <p class="text-muted small" data-i18n="step3_desc">Call the National Cyber Crime Helpline at 1930 immediately or register a complaint anonymously at cybercrime.gov.in.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=600&q=80" alt="Legal Action">
                    <p class="flow-desc" data-i18n="step4_title">Visit Cyber Cell</p>
                    <p class="text-muted small" data-i18n="step4_desc">Take your collected evidence to the local police Cyber Cell to file a formal FIR for criminal investigation.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Preserving evidence is the most critical first step.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Official cyber dispatch lines and portals. Available 24/7/365.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="tel:1930" class="btn-emergency-pill">
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_112">Cyber Helpline: 1930</span>
                </a>
                <a href="https://cybercrime.gov.in/" target="_blank" class="btn-emergency-pill" style="background-color: var(--text-main);">
                    <i class="fas fa-laptop me-2"></i> <span data-i18n="btn_1091">National Cyber Portal</span>
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="footer-modern">
    <div class="container">
        <div class="row g-5 js-fadeIn">
            <div class="col-lg-4 col-md-12">
                <h3 class="fw-bold text-white mb-3">Safe<span class="brand-accent">Her</span></h3>
                <p class="small text-muted mb-4" data-i18n="footer_desc">Our mission is to inform, secure, and empower every Indian woman. Your voice matters. Break the silence, become the power.</p>
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Get Emergency Help (1930)</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 data-i18n="footer_links_title">Quick Links</h5>
                <ul class="list-unstyled small d-flex flex-column gap-2">
                    <li><a href="../basic_info.php"><i class="fas fa-user text-primary me-2"></i><span data-i18n="f_link1">My Profile</span></a></li>
                    <li><a href="../basic_info.php#faq"><i class="fas fa-question-circle text-primary me-2"></i><span data-i18n="f_link2">Q & A</span></a></li>
                    <li><a href="../basic_info.php#know-laws"><i class="fas fa-book text-primary me-2"></i><span data-i18n="f_link3">Know the Laws</span></a></li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 data-i18n="footer_gov_title">Official Govt Portals</h5>
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to official complaint portals.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="https://cybercrime.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">National Cyber Crime Portal</a>
                    <a href="http://ncwapps.nic.in/onlinecomplaintsv2/frmInstructions.aspx" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">NCW Online Complaint</a>
                </div>
            </div>
        </div>
        <hr class="mt-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 SafeHer. <span data-i18n="footer_copy">Informational infrastructure, not legal advice. Dial 1930 for cyber emergencies.</span>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const translations = {
        en: {
            nav_profile: "My Space",
            nav_logout: "Logout",
            nav_login: "Login",
            hero_badge: "Digital Rights & Safety",
            hero_title: "Cyber Crime: Reclaim Your Digital Space",
            hero_desc: "Protect your identity and digital footprint. Understand the laws against cyberstalking, non-consensual image sharing, revenge porn, and deepfakes. You have the right to exist online without harassment.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Digital Safety Awareness",
            chart_sub: "Online abuse is real abuse. As cyber laws strengthen, more women are coming forward to report digital crimes and take down malicious content.",
            chart_label: "Reported Cyber Crimes (illustrative)",
            chart_y: "Cases (in thousands)",
            chart_note: "* Note: This graph displays illustrative reporting trends for functional demonstration.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian IT Act and BNS strictly penalize online abuse and privacy violations.",
            rights_const_title: "The Information Technology (IT) Act",
            art_14: "Section 66E (Privacy):", art_14_d: "Capturing, publishing, or transmitting images of a private area without consent is a crime.",
            art_15: "Section 66C (Identity Theft):", art_15_d: "Fraudulent use of your electronic signature or password (creating fake profiles).",
            art_21: "Section 67 (Obscenity):", art_21_d: "Publishing or transmitting sexually explicit material in electronic form.",
            rights_bns_title: "Protections Under BNS",
            bns_63: "Stalking (BNS context):", bns_63_d: "Monitoring your internet, email, or electronic communication to harass you.",
            bns_74: "Outraging Modesty Online:", bns_74_d: "Words, gestures, or acts intended to insult your modesty via digital platforms.",
            more_rights_2_p1: "Takedown Rights:", more_rights_2_p2: "You have the right to demand platforms to remove morphed images or revenge porn within 24 hours of reporting.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Recognize the different forms of digital harassment so you can report them effectively.",
            abuse_1: "Deepfakes & Morphing", abuse_1_d: "Using AI or editing tools to map your face onto explicit or inappropriate media.",
            abuse_2: "Cyberstalking", abuse_2_d: "Unwanted, continuous surveillance, tracking, or messaging across social media platforms.",
            abuse_3: "Non-Consensual Sharing", abuse_3_d: "Revenge porn or distributing private, intimate images/videos without your explicit permission.",
            abuse_4: "Identity Theft", abuse_4_d: "Creating fake profiles using your name, photos, and details to defame you or trick others.",
            guide_title: "Emergency Digital Protocol",
            guide_sub: "Follow these immediate steps if you are a victim of cyber harassment or deepfakes.",
            step1_title: "Capture Evidence", step1_desc: "Do not delete the messages yet. Take screenshots, copy profile URLs, and save the content as proof.",
            step2_title: "Block & Report In-App", step2_desc: "Use the social media platform's built-in tools to block the abuser and report the specific content for a takedown.",
            step3_title: "File Cyber Complaint", step3_desc: "Call the National Cyber Crime Helpline at 1930 immediately or register a complaint anonymously at cybercrime.gov.in.",
            step4_title: "Visit Cyber Cell", step4_desc: "Take your collected evidence to the local police Cyber Cell to file a formal FIR for criminal investigation.",
            guide_note: "*Look at all the steps carefully. Preserving evidence is the most critical first step.*",
            support_title: "Immediate Intervention",
            support_sub: "Official cyber dispatch lines and portals. Available 24/7/365.",
            btn_112: "Cyber Helpline: 1930",
            btn_1091: "National Cyber Portal",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Get Emergency Help (1930)",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official complaint portals.",
            gov_btn1: "National Cyber Crime Portal",
            gov_btn2: "NCW Online Complaint",
            footer_copy: "Informational infrastructure, not a substitute for active law enforcement. Dial 1930 for cyber emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "डिजिटल अधिकार और सुरक्षा",
            hero_title: "साइबर क्राइम: अपने डिजिटल स्पेस को सुरक्षित करें",
            hero_desc: "अपनी पहचान और डिजिटल फुटप्रिंट को सुरक्षित रखें। साइबर स्टॉकिंग, बिना सहमति के तस्वीरें साझा करने, और डीपफेक के खिलाफ कानूनों को समझें। आपको बिना किसी उत्पीड़न के ऑनलाइन रहने का अधिकार है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "डिजिटल सुरक्षा जागरूकता",
            chart_sub: "ऑनलाइन दुर्व्यवहार भी असली दुर्व्यवहार है। साइबर कानूनों के मजबूत होने से अधिक महिलाएं अपराधों की रिपोर्ट कर रही हैं।",
            chart_label: "दर्ज साइबर अपराध (illustrative)",
            chart_y: "मामले (thousands में)",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय आईटी अधिनियम और बीएनएस ऑनलाइन दुर्व्यवहार और गोपनीयता उल्लंघन पर कड़ी सजा देते हैं।",
            rights_const_title: "सूचना प्रौद्योगिकी (IT) अधिनियम",
            art_14: "धारा 66E (गोपनीयता):", art_14_d: "बिना सहमति के किसी निजी क्षेत्र की तस्वीरें लेना या प्रकाशित करना अपराध है।",
            art_15: "धारा 66C (पहचान की चोरी):", art_15_d: "फर्जी प्रोफाइल बनाने के लिए आपके विवरण या पासवर्ड का धोखाधड़ी से उपयोग।",
            art_21: "धारा 67 (अश्लीलता):", art_21_d: "इलेक्ट्रॉनिक रूप में यौन रूप से स्पष्ट सामग्री प्रकाशित या प्रसारित करना।",
            rights_bns_title: "BNS के तहत सुरक्षा",
            bns_63: "स्टॉकिंग (BNS):", bns_63_d: "आपको परेशान करने के लिए आपके इंटरनेट, ईमेल या संचार की निगरानी करना।",
            bns_74: "ऑनलाइन शील भंग करना:", bns_74_d: "डिजिटल प्लेटफॉर्म के माध्यम से आपका अपमान करने के इरादे से शब्द या कार्य।",
            more_rights_2_p1: "सामग्री हटाने का अधिकार:", more_rights_2_p2: "आप रिपोर्ट करने के 24 घंटे के भीतर मॉर्फ्ड तस्वीरों को हटाने की मांग कर सकती हैं।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "डिजिटल उत्पीड़न के विभिन्न रूपों को पहचानें ताकि आप प्रभावी ढंग से रिपोर्ट कर सकें।",
            abuse_1: "डीपफेक और मॉर्फिंग", abuse_1_d: "आपके चेहरे को आपत्तिजनक मीडिया पर लगाने के लिए AI या संपादन टूल का उपयोग करना।",
            abuse_2: "साइबर स्टॉकिंग", abuse_2_d: "सोशल मीडिया पर अवांछित निगरानी, नज़र रखना, या लगातार संदेश भेजना।",
            abuse_3: "बिना सहमति के शेयर करना", abuse_3_d: "आपकी स्पष्ट अनुमति के बिना निजी तस्वीरें या वीडियो साझा करना।",
            abuse_4: "पहचान की चोरी", abuse_4_d: "आपको बदनाम करने के लिए आपके नाम और तस्वीरों का उपयोग करके फर्जी प्रोफाइल बनाना।",
            guide_title: "आपातकालीन डिजिटल प्रोटोकॉल",
            guide_sub: "यदि आप साइबर उत्पीड़न के शिकार हैं तो इन तत्काल कदमों का पालन करें।",
            step1_title: "सबूत सुरक्षित रखें", step1_desc: "संदेशों को अभी न हटाएं। स्क्रीनशॉट लें, URL कॉपी करें, और सामग्री को सबूत के रूप में सहेजें।",
            step2_title: "ब्लॉक और रिपोर्ट करें", step2_desc: "सोशल मीडिया प्लेटफॉर्म के टूल का उपयोग करके दुर्व्यवहार करने वाले को ब्लॉक करें।",
            step3_title: "साइबर शिकायत दर्ज करें", step3_desc: "तुरंत राष्ट्रीय साइबर क्राइम हेल्पलाइन 1930 पर कॉल करें या cybercrime.gov.in पर शिकायत दर्ज करें।",
            step4_title: "साइबर सेल जाएं", step4_desc: "औपचारिक FIR दर्ज करने के लिए अपने सबूतों के साथ स्थानीय पुलिस साइबर सेल में जाएं।",
            guide_note: "*सभी कदमों को ध्यान से देखें। सबूत सुरक्षित रखना सबसे महत्वपूर्ण कदम है।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "आधिकारिक साइबर प्रेषण लाइनें। 24/7/365 उपलब्ध।",
            btn_112: "साइबर हेल्पलाइन: 1930",
            btn_1091: "राष्ट्रीय साइबर पोर्टल",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "आपातकालीन मदद लें (1930)",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी शिकायत पोर्टल तक पहुँच।",
            gov_btn1: "राष्ट्रीय साइबर क्राइम पोर्टल",
            gov_btn2: "NCW ऑनलाइन शिकायत",
            footer_copy: "सूचनात्मक ढांचा, कानूनी सलाह नहीं। साइबर आपात स्थिति के लिए 1930 डायल करें।"
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

        if (window.dataChartInstance) {
            window.dataChartInstance.data.datasets[0].label = translations[currentLanguage].chart_label;
            window.dataChartInstance.options.scales.y.title.text = translations[currentLanguage].chart_y;
            window.dataChartInstance.update();
        }

        if(isSpeaking) {
            stopSpeechUI();
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
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
        setupChart();
    });

    window.onscroll = function() { scrollFunction(); };
    function scrollFunction() {
        const btn = document.getElementById("scrollTop");
        if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
            btn.style.display = "flex";
        } else {
            btn.style.display = "none";
        }
    }
    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    function setupChart() {
        const ctx = document.getElementById('dataChart').getContext('2d');
        window.dataChartInstance = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025 (Est.)'],
                datasets: [{
                    label: translations['en'].chart_label,
                    data: [15, 28, 54, 98, 142],
                    backgroundColor: 'rgba(106, 90, 205, 0.2)',
                    borderColor: '#6a5acd',
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#6a5acd',
                    pointBorderWidth: 2,
                    pointRadius: 5,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        title: { display: true, text: translations['en'].chart_y }
                    }
                },
                plugins: {
                    legend: { position: 'top' }
                }
            }
        });
    }

    const ttsContent = {
        en: "Welcome to SafeHer. Protect your identity and digital footprint. Online abuse, including deepfakes, cyberstalking, and non-consensual image sharing, is a severe crime. The Indian IT Act and Bharatiya Nyaya Sanhita strictly penalize these violations. You have the right to demand platforms remove morphed images within 24 hours. If you are a victim of cyber harassment, do not panic. First, capture evidence by taking screenshots and saving URLs. Do not delete the messages. Next, use the app's tools to block the user and report the content. Then, call the National Cyber Crime Helpline at 1930 immediately or report anonymously on cybercrime.gov.in. Finally, visit your local police cyber cell to file a formal FIR. You have the right to exist online without harassment.",
        hi: "सेफ हर में आपका स्वागत है। अपनी पहचान और डिजिटल फुटप्रिंट को सुरक्षित रखें। ऑनलाइन दुर्व्यवहार, जिसमें डीपफेक, साइबर स्टॉकिंग और बिना सहमति के तस्वीरें साझा करना शामिल है, एक गंभीर अपराध है। भारतीय आईटी अधिनियम और बीएनएस इन उल्लंघनों पर कड़ी सजा देते हैं। यदि आप साइबर उत्पीड़न के शिकार हैं, तो घबराएं नहीं। सबसे पहले, स्क्रीनशॉट लेकर और URL सहेज कर सबूत जुटाएं। संदेशों को हटाएं नहीं। अगला, उपयोगकर्ता को ब्लॉक करने और सामग्री की रिपोर्ट करने के लिए ऐप के टूल का उपयोग करें। फिर, तुरंत राष्ट्रीय साइबर क्राइम हेल्पलाइन 1930 पर कॉल करें या cybercrime.gov.in पर रिपोर्ट करें। अंत में, औपचारिक FIR दर्ज करने के लिए अपने स्थानीय पुलिस साइबर सेल जाएं। आपको बिना किसी उत्पीड़न के ऑनलाइन रहने का अधिकार है।"
    };

    let speech = new SpeechSynthesisUtterance();
    let isSpeaking = false;

    function toggleSpeak() {
        window.speechSynthesis.cancel();
        
        if (!isSpeaking) {
            speech.text = ttsContent[currentLanguage];
            speech.lang = currentLanguage === 'en' ? 'en-IN' : 'hi-IN';
            speech.rate = 0.9;
            window.speechSynthesis.speak(speech);
            document.getElementById('speakBtnText').innerText = translations[currentLanguage].btn_listen_stop;
            isSpeaking = true;
            speech.onend = stopSpeechUI;
        } else {
            stopSpeechUI();
        }
    }

    function stopSpeechUI() {
        window.speechSynthesis.cancel();
        document.getElementById('speakBtnText').innerText = translations[currentLanguage].btn_listen;
        isSpeaking = false;
    }
</script>

</body>
</html>