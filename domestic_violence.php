<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Domestic Violence Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(106, 90, 205, 0.95)), url('https://images.unsplash.com/photo-1573164713988-8665fc963095?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
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
        <a class="navbar-brand brand-text" href="index.php">
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

                <a class="btn btn-glass" href="basic_info.php">Basic Information</a>
                <a class="btn btn-glass" href="add_place.php">Add Place</a>
                
                <div class="dropdown">
                    <button class="btn btn-glass dropdown-toggle w-100" type="button" id="womenProblemsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        Select an Issue
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width: 250px;" aria-labelledby="womenProblemsDropdown">
                        <li><h6 class="dropdown-header">Safety & Legal Crimes</h6></li>
                        <li><a class="dropdown-item" href="domestic_violence.php">Domestic Violence & Cruelty</a></li>
                        <li><a class="dropdown-item" href="sexual_assault.php">Sexual Assault & Rape</a></li>
                        <li><a class="dropdown-item" href="problems/cyber_crime.php">Cyber Crime & Deepfakes</a></li>
                        <li><a class="dropdown-item" href="problems/stalking_voyeurism.php">Stalking & Voyeurism</a></li>
                        <li><a class="dropdown-item" href="problems/dowry_harassment.php">Dowry Harassment</a></li>
                        <li><a class="dropdown-item" href="problems/human_trafficking.php">Human Trafficking</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Workplace & Economics</h6></li>
                        <li><a class="dropdown-item" href="problems/workplace_harassment.php">Workplace Harassment (POSH)</a></li>
                        <li><a class="dropdown-item" href="problems/wage_gap.php">Gender Wage Gap & Discrimination</a></li>
                        <li><a class="dropdown-item" href="problems/maternity_rights.php">Maternity & Pregnancy Rights</a></li>
                        <li><a class="dropdown-item" href="problems/property_rights.php">Inheritance & Property Rights</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><h6 class="dropdown-header">Health & Social Issues</h6></li>
                        <li><a class="dropdown-item" href="problems/child_marriage.php">Child Marriage</a></li>
                        <li><a class="dropdown-item" href="problems/reproductive_health.php">Reproductive Health & Abortion Rights</a></li>
                        <li><a class="dropdown-item" href="problems/mental_health.php">Mental Health & Social Stigma</a></li>
                        <li><a class="dropdown-item" href="problems/education_bias.php">Access to Education</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item fw-bold text-danger" href="emergency_contacts.php">Emergency Helpline Numbers</a></li>
                        <li><a class="dropdown-item fw-bold text-primary" href="legal_aid.php">Find Free Legal Aid</a></li>
                    </ul>
                </div>

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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-shield-halved me-2"></i>Safety & Legal Rights</span>
                <h1 class="hero-title" data-i18n="hero_title">Domestic Violence: Breaking the Silence</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Understand your rights against physical, emotional, sexual, or economic abuse. You are not alone. The laws of India are designed to protect your dignity and safety.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">The Beginning of Change</h2>
            <p class="section-subtitle" data-i18n="chart_sub">More women are raising their voices. An increase in reporting means the silence is breaking.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">Note: This graph displays illustrative data for functional demonstration.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Knowledge is Your Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">Know the strict legal weapons that protect you.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Constitutional Rights</h4>
                    <p class="text-muted mb-4" data-i18n="rights_const_desc">The Constitution of India grants every woman these fundamental rights:</p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Article 14:</strong> <span class="text-muted" data-i18n="art_14_d">Equality before the law.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Article 15:</strong> <span class="text-muted" data-i18n="art_15_d">No discrimination on the basis of gender.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Article 21:</strong> <span class="text-muted" data-i18n="art_21_d">Right to live with dignity, free from violence.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-scale-balanced"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">New Penal Law (BNS)</h4>
                    <p class="text-muted mb-4" data-i18n="rights_bns_desc">Replacing the IPC, the Bharatiya Nyaya Sanhita (BNS) has strict provisions:</p>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_85">BNS Section 85:</strong> <span class="text-muted" data-i18n="bns_85_d">Strict punishment for cruelty by husband or relatives.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_80">BNS Section 80:</strong> <span class="text-muted" data-i18n="bns_80_d">Protection against Dowry Death.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="pwdva">PWDVA 2005:</strong> <span class="text-muted" data-i18n="pwdva_d">This civil law provides Protection Orders, Right to Residence, and Monetary Relief.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Domestic violence is not just physical assault. It includes anything that harms your body, mind, or dignity.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-hand-fist text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Physical Abuse:</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Hitting, beating, pushing, or using weapons.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-brain text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Emotional/Verbal Abuse:</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Abusing, humiliating, taunting, or isolating from family.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-coins text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Economic Abuse:</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Snatching your money, stopping you from working, or forcibly taking your jewelry (Stridhan).</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-bed text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Sexual Abuse:</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Forced sexual relations within marriage or any act without your consent.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Emergency Protocol Flow</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Visual action guide. Follow these crucial steps immediately after an incident.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=600&q=80" alt="Secure Location">
                    <p class="flow-desc" data-i18n="step1_title">Move to a secure location</p>
                    <p class="text-muted small" data-i18n="step1_desc">If you feel threatened, immediately leave the room or lock the door to establish physical distance.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?auto=format&fit=crop&w=600&q=80" alt="Call Police">
                    <p class="flow-desc" data-i18n="step2_title">Call emergency dispatch</p>
                    <p class="text-muted small" data-i18n="step2_desc">Dial 112 (Emergency) or 1091 (Women Helpline) immediately to report the ongoing threat.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=600&q=80" alt="Medical Help">
                    <p class="flow-desc" data-i18n="step3_title">Seek medical documentation</p>
                    <p class="text-muted small" data-i18n="step3_desc">Tell a trusted contact. If injured, visit a hospital for treatment and secure an official medical report.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="File FIR">
                    <p class="flow-desc" data-i18n="step4_title">File an official FIR</p>
                    <p class="text-muted small" data-i18n="step4_desc">Go to the nearest police station or 'Mahila Cell', explain your situation, and file a First Information Report.</p>
                </div>
            </div>
            <p class="text-center text-muted small mt-5"><em data-i18n="guide_note">*Look at all the steps carefully. These images demonstrate the legal path to safety.*</em></p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Official government dispatch lines. Available 24/7/365.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="tel:112" class="btn-emergency-pill">
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_112">Emergency: 112</span>
                </a>
                <a href="tel:1091" class="btn-emergency-pill" style="background-color: var(--text-main);">
                    <i class="fas fa-female me-2"></i> <span data-i18n="btn_1091">Women Helpline: 1091</span>
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
                <p class="small text-muted mb-4">Our mission is to inform, secure, and empower every Indian woman. Your voice matters. Break the silence, become the power.</p>
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Get Emergency Help (112)</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 data-i18n="footer_links_title">Quick Links</h5>
                <ul class="list-unstyled small d-flex flex-column gap-2">
                    <li><a href="basic_info.php"><i class="fas fa-user text-primary me-2"></i><span data-i18n="f_link1">My Profile</span></a></li>
                    <li><a href="basic_info.php#faq"><i class="fas fa-question-circle text-primary me-2"></i><span data-i18n="f_link2">Q & A</span></a></li>
                    <li><a href="basic_info.php#know-laws"><i class="fas fa-book text-primary me-2"></i><span data-i18n="f_link3">Know the Laws</span></a></li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 data-i18n="footer_gov_title">Official Govt Portals</h5>
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to official complaint portals or help centers.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="http://ncwapps.nic.in/onlinecomplaintsv2/frmInstructions.aspx" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">NCW Online Complaint</a>
                    <a href="https://wcd.nic.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">Ministry of WCD</a>
                    <a href="https://wcd.nic.in/schemes/one-stop-centre-scheme" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn3">One Stop Center Locator</a>
                </div>
            </div>
        </div>
        <hr class="mt-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 SafeHer. <span data-i18n="footer_copy">Informational infrastructure, not legal advice. Dial 112 for immediate emergencies.</span>
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
            hero_badge: "Safety & Legal Rights",
            hero_title: "Domestic Violence: Breaking the Silence",
            hero_desc: "Understand your rights against physical, emotional, sexual, or economic abuse. You are not alone. The laws of India are designed to protect your dignity and safety.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio",
            chart_title: "The Beginning of Change",
            chart_sub: "More women are raising their voices. An increase in reporting means the silence is breaking.",
            chart_label: "Reported Cases of Cruelty (illustrative)",
            chart_y: "Cases (thousands)",
            chart_note: "Note: This graph displays illustrative data for functional demonstration.",
            rights_title: "Knowledge is Your Shield",
            rights_sub: "Know the strict legal weapons that protect you.",
            rights_const_title: "Constitutional Rights",
            rights_const_desc: "The Constitution of India grants every woman these fundamental rights:",
            art_14: "Article 14:", art_14_d: "Equality before the law.",
            art_15: "Article 15:", art_15_d: "No discrimination on the basis of gender.",
            art_21: "Article 21:", art_21_d: "Right to live with dignity, free from violence.",
            rights_bns_title: "New Penal Law (BNS)",
            rights_bns_desc: "Replacing the IPC, the Bharatiya Nyaya Sanhita (BNS) has strict provisions:",
            bns_85: "BNS Section 85:", bns_85_d: "Strict punishment for cruelty by husband or relatives.",
            bns_80: "BNS Section 80:", bns_80_d: "Protection against Dowry Death.",
            pwdva: "PWDVA 2005:", pwdva_d: "This civil law provides Protection Orders, Right to Residence, and Monetary Relief.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Domestic violence is not just physical assault. It includes anything that harms your body, mind, or dignity.",
            abuse_1: "Physical Abuse:", abuse_1_d: "Hitting, beating, pushing, or using weapons.",
            abuse_2: "Emotional/Verbal Abuse:", abuse_2_d: "Abusing, humiliating, taunting, or isolating from family.",
            abuse_3: "Economic Abuse:", abuse_3_d: "Snatching your money, stopping you from working, or forcibly taking your jewelry (Stridhan).",
            abuse_4: "Sexual Abuse:", abuse_4_d: "Forced sexual relations within marriage or any act without your consent.",
            guide_title: "Emergency Protocol Flow",
            guide_sub: "Visual action guide. Follow these crucial steps immediately after an incident.",
            step1_title: "Move to a secure location", step1_desc: "If you feel threatened, immediately leave the room or lock the door to establish physical distance.",
            step2_title: "Call emergency dispatch", step2_desc: "Dial 112 (Emergency) or 1091 (Women Helpline) immediately to report the ongoing threat.",
            step3_title: "Seek medical documentation", step3_desc: "Tell a trusted contact. If injured, visit a hospital for treatment and secure an official medical report.",
            step4_title: "File an official FIR", step4_desc: "Go to the nearest police station or 'Mahila Cell', explain your situation, and file a First Information Report.",
            guide_note: "*Look at all the steps carefully. These images demonstrate the legal path to safety.*",
            support_title: "Immediate Intervention",
            support_sub: "Official government dispatch lines. Available 24/7/365.",
            btn_112: "Emergency: 112",
            btn_1091: "Women Helpline: 1091",
            footer_desc: "Our mission is to inform, secure, and empower every Indian woman. Your voice matters. Break the silence, become the power.",
            footer_emg: "Get Emergency Help (112)",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official complaint portals or help centers.",
            gov_btn1: "NCW Online Complaint",
            gov_btn2: "Ministry of WCD",
            gov_btn3: "One Stop Center Locator",
            footer_copy: "Informational infrastructure, not legal advice. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "सुरक्षा और कानूनी अधिकार",
            hero_title: "घरेलू हिंसा: अब और चुप नहीं रहना",
            hero_desc: "शारीरिक, भावनात्मक, यौन, या आर्थिक शोषण के खिलाफ अपने अधिकारों को समझें। आप अकेली नहीं हैं। भारत का कानून आपके सम्मान और सुरक्षा की रक्षा के लिए बना है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "बदलाव की शुरुआत",
            chart_sub: "अधिक महिलाएं हिंसा के खिलाफ आवाज उठा रही हैं। रिपोर्टिंग बढ़ने का मतलब है कि चुप्पी टूट रही है।",
            chart_label: "घरेलू क्रूरता के दर्ज मामले",
            chart_y: "मामले (thousands में)",
            chart_note: "नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "ज्ञान ही आपकी ढाल है",
            rights_sub: "इन सख्त कानूनी हथियारों को जानें जो आपकी रक्षा करते हैं।",
            rights_const_title: "संविधानिक अधिकार",
            rights_const_desc: "भारत का संविधान हर महिला को ये मूल अधिकार देता है:",
            art_14: "अनुच्छेद 14:", art_14_d: "कानून के सामने समानता।",
            art_15: "अनुच्छेद 15:", art_15_d: "लिंग के आधार पर कोई भेदभाव नहीं।",
            art_21: "अनुच्छेद 21:", art_21_d: "सम्मान के साथ जीने का अधिकार, हिंसा से मुक्त।",
            rights_bns_title: "नया कानून (BNS)",
            rights_bns_desc: "IPC की जगह अब Bharatiya Nyaya Sanhita (BNS) में कड़े प्रावधान हैं:",
            bns_85: "BNS धारा 85:", bns_85_d: "पति या रिश्तेदारों द्वारा क्रूरता के खिलाफ कड़ी सजा।",
            bns_80: "BNS धारा 80:", bns_80_d: "दहेज मृत्यु के खिलाफ सुरक्षा।",
            pwdva: "PWDVA 2005:", pwdva_d: "यह सिविल कानून आपको Protection Orders, घर में रहने का अधिकार, और आर्थिक मदद दिलाता है।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "घरेलू हिंसा केवल मारपीट नहीं है। इसमें वो सब शामिल है जो आपके शरीर, मन, या सम्मान को ठेस पहुँचाता है।",
            abuse_1: "शारीरिक शोषण:", abuse_1_d: "मारना, पीटना, धक्का देना, हथियार का इस्तेमाल करना।",
            abuse_2: "मानसिक/मौखिक शोषण:", abuse_2_d: "गाली देना, अपमानित करना, ताने मारना, परिवार से अलग-थलग करना।",
            abuse_3: "आर्थिक शोषण:", abuse_3_d: "आपके पैसे छीन लेना, आपको काम न करने देना, स्त्रीधन (गहने) जबरदस्ती ले लेना।",
            abuse_4: "यौन शोषण:", abuse_4_d: "शादी में जबरदस्ती यौन संबंध बनाना या आपकी असहमति के बिना कोई भी कृत्य।",
            guide_title: "आपातकालीन प्रोटोकॉल",
            guide_sub: "विज़ुअल एक्शन गाइड। किसी घटना के तुरंत बाद इन महत्वपूर्ण कानूनी कदमों का पालन करें।",
            step1_title: "सुरक्षित स्थान पर जाएं", step1_desc: "अगर खतरा महसूस हो, तो तुरंत उस कमरे से बाहर निकलें या दरवाजा बंद कर लें।",
            step2_title: "आपातकालीन कॉल करें", step2_desc: "तुरंत 112 (आपातकालीन) या 1091 (महिला हेल्पलाइन) डायल करें।",
            step3_title: "मेडिकल दस्तावेज़ जुटाएं", step3_desc: "किसी विश्वसनीय संपर्क को बताएं। चोट लगने पर अस्पताल जाकर मेडिकल रिपोर्ट लें।",
            step4_title: "आधिकारिक FIR दर्ज करें", step4_desc: "नजदीकी पुलिस स्टेशन या 'महिला सेल' जाकर अपनी आपबीती बताएं और FIR दर्ज कराएं।",
            guide_note: "*सभी कदमों को ध्यान से देखें। यह तस्वीरें सुरक्षा का कानूनी रास्ता दिखाती हैं।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "आधिकारिक सरकारी प्रेषण लाइनें। 24/7/365 उपलब्ध।",
            btn_112: "आपातकालीन: 112",
            btn_1091: "महिला हेल्पलाइन: 1091",
            footer_desc: "हमारा लक्ष्य हर भारतीय महिला को सूचित, सुरक्षित और सशक्त बनाना है। आपकी आवाज़ मायने रखती है। चुप्पी तोड़ें, शक्ति बनें।",
            footer_emg: "आपातकालीन मदद लें (112)",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी शिकायत पोर्टल या सहायता केंद्रों तक पहुँच।",
            gov_btn1: "NCW ऑनलाइन शिकायत",
            gov_btn2: "WCD मंत्रालय",
            gov_btn3: "वन स्टॉप सेंटर खोजें",
            footer_copy: "सूचनात्मक ढांचा, कानूनी सलाह नहीं। आपात स्थिति के लिए 112 डायल करें।"
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
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025 (Est.)'],
                datasets: [{
                    label: translations['en'].chart_label,
                    data: [110, 118, 125, 132, 140],
                    backgroundColor: 'rgba(106, 90, 205, 0.7)',
                    borderRadius: 8,
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
        en: "Welcome to SafeHer. It is important to know your rights against domestic violence and cruelty. The laws of India protect your dignity and safety. Domestic violence is not just physical assault; it includes hitting, verbal abuse, taunting, isolating you from family, snatching your money, or forcing sexual relations without your consent. All of this is wrong and a legal offense. The new Bharatiya Nyaya Sanhita, Section 85, provides strict punishment against cruelty by a husband or relatives. The Domestic Violence Act of 2005 ensures your safety and financial support. If you are in danger, here is how to handle it: First, move to a secure location or lock the door. Immediately call the police at 112 or the women's helpline at 1091. Tell a trusted friend and get medical treatment at a hospital if needed. Go to the nearest police station to file a complaint. You are not alone. Dial 112 for help.",
        hi: "सेफ हर में आपका स्वागत है। घरेलू हिंसा के खिलाफ आपके अधिकार जानना ज़रूरी है। भारत का कानून आपकी रक्षा करता है। घरेलू हिंसा केवल मारपीट नहीं है, इसमें शारीरिक चोट पहुँचाना, गाली देना, अपमानित करना, ताने मारना, परिवार से अलग करना, आपके पैसे छीन लेना, या आपकी मर्ज़ी के बिना यौन संबंध बनाना शामिल है। नया भारतीय न्याय संहिता कानून बी.एन.एस. की धारा 85 पति या रिश्तेदारों की क्रूरता के खिलाफ कड़ी सजा देता है। घरेलू हिंसा अधिनियम 2005 आपको सुरक्षा और आर्थिक मदद दिलाता है। अगर आप संकट में हैं: सबसे पहले सुरक्षित कमरे में जाएं या दरवाजा बंद कर लें। तुरंत पुलिस को 112 पर या महिला हेल्पलाइन को 1091 पर फोन करें। किसी विश्वसनीय दोस्त को बताएं और अस्पताल जाकर अपना इलाज कराएं। नजदीकी पुलिस स्टेशन जाकर शिकायत दर्ज कराएं। आप अकेली नहीं हैं।"
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