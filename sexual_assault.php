<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sexual Assault Rights | SafeHer</title>
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
                <h1 class="hero-title" data-i18n="hero_title">Sexual Assault: Demand Justice</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">A sexual act without your consent is a severe crime. Understand the legal procedures, medical rights, and how the Bharatiya Nyaya Sanhita (BNS) protects you. You have the absolute right to justice, dignity, and privacy.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">The Power of Reporting</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Fear is turning into courage. With strictly enforced laws, more cases are being reported as women become aware of their absolute rights and legal protections.</p>
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
            <h2 class="section-title" data-i18n="rights_title">Knowledge is Your Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The legal system is designed to protect your identity and punish the guilty. Know your weapons.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-shield-halved"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Procedural & Dignity Rights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Right to Privacy:</strong> <span class="text-muted" data-i18n="art_14_d">Your identity must not be disclosed to the public or media.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Female Officer:</strong> <span class="text-muted" data-i18n="art_15_d">Your statement must be recorded by a woman police officer.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Free Medical Aid:</strong> <span class="text-muted" data-i18n="art_21_d">Immediate medical treatment at any hospital is your absolute right.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="more_rights_1_p2">Zero FIR:</strong> <span class="text-muted" data-i18n="more_rights_1_p1">File a complaint at any police station. The invasive two-finger test is strictly banned.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-scale-balanced"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Strict Penal Laws (BNS)</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">BNS Section 63:</strong> <span class="text-muted" data-i18n="bns_63_d">Punishment for rape, including life imprisonment or death in severe cases.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">BNS Section 74:</strong> <span class="text-muted" data-i18n="bns_74_d">Punishment for assault or criminal force outraging a woman's modesty.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_69">BNS Section 69:</strong> <span class="text-muted" data-i18n="bns_69_d">Criminalizes sexual intercourse under false promises of marriage.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">BNS Section 70 & 72:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">Mandates severe punishment for gang rape and abuse of authority by public servants. Fast-track courts are enforced.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Consent must be clear, conscious, and voluntary. Recognize what constitutes a legal violation.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-hand-paper text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Lack of Consent</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Any sexual act committed against your will, or when unable to give consent (e.g., intoxicated or asleep).</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-user-shield text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Outraging Modesty</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Unwelcome physical contact, use of criminal force, or actions explicitly meant to violate your dignity.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-masks-theater text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">False Promises</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Deceitfully obtaining consent through false, manipulative promises of marriage or professional advancement.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-hospital-user text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Medical Denial</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Denial of immediate, free medical treatment or forensic examination at any public or private hospital.</span>
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
                    <p class="flow-desc" data-i18n="step1_title">Reach a Safe Place</p>
                    <p class="text-muted small" data-i18n="step1_desc">Get to a secure location away from the perpetrator immediately. Call a trusted friend or family member.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1618060867425-c618bc325983?auto=format&fit=crop&w=600&q=80" alt="Preserve Evidence">
                    <p class="flow-desc" data-i18n="step2_title">Preserve Evidence</p>
                    <p class="text-muted small" data-i18n="step2_desc">Do not shower, wash your clothes, or clean up. Keep physical evidence exactly as it is for forensic examination.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1523966211575-eb4a01e7dd51?auto=format&fit=crop&w=600&q=80" alt="Call Police">
                    <p class="flow-desc" data-i18n="step3_title">Call Police</p>
                    <p class="text-muted small" data-i18n="step3_desc">Dial 112 for police or 1091 for the women's helpline. Request a female officer to record your initial statement.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=600&q=80" alt="File FIR">
                    <p class="flow-desc" data-i18n="step4_title">Zero FIR & Medical</p>
                    <p class="text-muted small" data-i18n="step4_desc">Go to ANY police station to file a 'Zero FIR'. A free medical examination must be conducted by a registered doctor.</p>
                </div>
            </div>
            <p class="text-center text-muted small mt-5"><em data-i18n="guide_note">*Look at all the steps carefully. These instructions show you the legal path.*</em></p>
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
                <p class="small text-muted mb-4" data-i18n="footer_desc">Our mission is to inform, secure, and empower every Indian woman. Your voice matters. Break the silence, become the power.</p>
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
            hero_title: "Sexual Assault: Demand Justice",
            hero_desc: "A sexual act without your consent is a severe crime. Understand the legal procedures, medical rights, and how the Bharatiya Nyaya Sanhita (BNS) protects you. You have the absolute right to justice, dignity, and privacy.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio",
            chart_title: "The Power of Reporting",
            chart_sub: "Fear is turning into courage. With strictly enforced laws, more cases are being reported as women become aware of their absolute rights and legal protections.",
            chart_label: "Reported Sexual Offenses (illustrative)",
            chart_y: "Cases (in thousands)",
            chart_note: "* Note: This graph displays illustrative reporting trends for functional demonstration.",
            rights_title: "Knowledge is Your Shield",
            rights_sub: "The legal system is designed to protect your identity and punish the guilty. Know your weapons.",
            rights_const_title: "Procedural & Dignity Rights",
            art_14: "Right to Privacy:", art_14_d: "Your identity must not be disclosed to the public or media.",
            art_15: "Female Officer:", art_15_d: "Your statement must be recorded by a woman police officer.",
            art_21: "Free Medical Aid:", art_21_d: "Immediate medical treatment at any hospital is your absolute right.",
            more_rights_1_p1: "File a complaint at any police station. The invasive two-finger test is strictly banned.",
            more_rights_1_p2: "Zero FIR:",
            rights_bns_title: "Strict Penal Laws (BNS)",
            bns_63: "BNS Section 63:", bns_63_d: "Punishment for rape, including life imprisonment or death in severe cases.",
            bns_74: "BNS Section 74:", bns_74_d: "Punishment for assault or criminal force outraging a woman's modesty.",
            bns_69: "BNS Section 69:", bns_69_d: "Criminalizes sexual intercourse under false promises of marriage.",
            more_rights_2_p1: "BNS Section 70 & 72:",
            more_rights_2_p2: "Mandates severe punishment for gang rape and abuse of authority by public servants. Fast-track courts are enforced.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Consent must be clear, conscious, and voluntary. Recognize what constitutes a legal violation.",
            abuse_1: "Lack of Consent", abuse_1_d: "Any sexual act committed against your will, or when unable to give consent (e.g., intoxicated or asleep).",
            abuse_2: "Outraging Modesty", abuse_2_d: "Unwelcome physical contact, use of criminal force, or actions explicitly meant to violate your dignity.",
            abuse_3: "False Promises", abuse_3_d: "Deceitfully obtaining consent through false, manipulative promises of marriage or professional advancement.",
            abuse_4: "Medical Denial", abuse_4_d: "Denial of immediate, free medical treatment or forensic examination at any public or private hospital.",
            guide_title: "Emergency Protocol Flow",
            guide_sub: "Visual action guide. Follow these crucial steps immediately after an incident.",
            step1_title: "Reach a Safe Place", step1_desc: "Get to a secure location away from the perpetrator immediately. Call a trusted friend or family member.",
            step2_title: "Preserve Evidence", step2_desc: "Do not shower, wash your clothes, or clean up. Keep physical evidence exactly as it is for forensic examination.",
            step3_title: "Call Police", step3_desc: "Dial 112 for police or 1091 for the women's helpline. Request a female officer to record your initial statement.",
            step4_title: "Zero FIR & Medical", step4_desc: "Go to ANY police station to file a 'Zero FIR'. A free medical examination must be conducted by a registered doctor.",
            guide_note: "*Look at all the steps carefully. These instructions show you the legal path.*",
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
            hero_title: "यौन उत्पीड़न: न्याय की मांग करें",
            hero_desc: "आपकी सहमति के बिना यौन कृत्य एक गंभीर अपराध है। कानूनी प्रक्रियाओं, चिकित्सा अधिकारों और भारतीय न्याय संहिता (BNS) को समझें। आपको न्याय, गरिमा और निजता का पूर्ण अधिकार है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "रिपोर्टिंग की शक्ति",
            chart_sub: "डर अब साहस में बदल रहा है। सख्त कानूनों के साथ, अधिक महिलाएं अपने अधिकारों के प्रति जागरूक हो रही हैं और मामले दर्ज करा रही हैं।",
            chart_label: "दर्ज यौन अपराध (illustrative)",
            chart_y: "मामले (thousands में)",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "ज्ञान ही आपकी ढाल है",
            rights_sub: "कानूनी व्यवस्था आपकी पहचान की रक्षा करने और दोषियों को सजा देने के लिए बनाई गई है। अपने हथियारों को जानें।",
            rights_const_title: "प्रक्रियात्मक और गरिमा अधिकार",
            art_14: "निजता का अधिकार:", art_14_d: "आपकी पहचान जनता या मीडिया के सामने उजागर नहीं की जा सकती।",
            art_15: "महिला अधिकारी:", art_15_d: "आपका बयान एक महिला पुलिस अधिकारी द्वारा ही दर्ज किया जाना चाहिए।",
            art_21: "मुफ्त चिकित्सा सहायता:", art_21_d: "किसी भी अस्पताल में तत्काल चिकित्सा उपचार आपका पूर्ण अधिकार है।",
            more_rights_1_p1: "किसी भी पुलिस स्टेशन में शिकायत दर्ज करें। टू-फिंगर टेस्ट पर पूरी तरह से प्रतिबंध है।",
            more_rights_1_p2: "जीरो एफआईआर:",
            rights_bns_title: "सख्त दंड कानून (BNS)",
            bns_63: "BNS धारा 63:", bns_63_d: "बलात्कार के लिए सजा, जिसमें आजीवन कारावास या गंभीर मामलों में मृत्युदंड शामिल है।",
            bns_74: "BNS धारा 74:", bns_74_d: "किसी महिला का शील भंग करने के इरादे से हमले या आपराधिक बल के लिए सजा।",
            bns_69: "BNS धारा 69:", bns_69_d: "शादी के झूठे वादे के तहत यौन संबंध बनाने को अपराध मानती है।",
            more_rights_2_p1: "BNS धारा 70 व 72:",
            more_rights_2_p2: "सामूहिक बलात्कार और अधिकारी द्वारा पद के दुरुपयोग पर कड़ी सजा। फास्ट-ट्रैक अदालतें लागू।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "सहमति स्पष्ट और स्वैच्छिक होनी चाहिए। पहचानें कि कानूनी उल्लंघन क्या है।",
            abuse_1: "सहमति का अभाव", abuse_1_d: "आपकी इच्छा के विरुद्ध, या जब आप सहमति देने में असमर्थ हों (जैसे नशे में या सोते हुए)।",
            abuse_2: "शील भंग करना", abuse_2_d: "अवांछित शारीरिक संपर्क, आपराधिक बल, या आपकी गरिमा का उल्लंघन करने वाले कार्य।",
            abuse_3: "झूठे वादे", abuse_3_d: "शादी या पेशेवर उन्नति के झूठे, जोड़-तोड़ वाले वादों के माध्यम से धोखे से सहमति प्राप्त करना।",
            abuse_4: "चिकित्सा इनकार", abuse_4_d: "किसी भी अस्पताल में तत्काल मुफ्त चिकित्सा उपचार या फोरेंसिक जांच से इनकार करना।",
            guide_title: "आपातकालीन प्रोटोकॉल",
            guide_sub: "विज़ुअल एक्शन गाइड। किसी घटना के तुरंत बाद इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "सुरक्षित स्थान पर पहुंचें", step1_desc: "अपराधी से दूर तुरंत एक सुरक्षित स्थान पर जाएं। किसी भरोसेमंद दोस्त को बुलाएं।",
            step2_title: "सबूत सुरक्षित रखें", step2_desc: "नहाएं नहीं, कपड़े न धोएं और न ही सफाई करें। फोरेंसिक जांच के लिए सबूतों को वैसे ही रखें।",
            step3_title: "पुलिस को कॉल करें", step3_desc: "पुलिस के लिए 112 डायल करें। प्रारंभिक बयान दर्ज करने के लिए महिला अधिकारी की मांग करें।",
            step4_title: "जीरो FIR और मेडिकल", step4_desc: "किसी भी पुलिस स्टेशन में 'जीरो FIR' दर्ज कराएं। डॉक्टर द्वारा मुफ्त चिकित्सा जांच की जानी चाहिए।",
            guide_note: "*सभी कदमों को ध्यान से देखें। यह निर्देश आपको कानूनी रास्ता दिखाते हैं।*",
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
            type: 'line',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025 (Est.)'],
                datasets: [{
                    label: translations['en'].chart_label,
                    data: [85, 92, 105, 118, 126],
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
        en: "Welcome to SafeHer. A sexual act without your consent is a severe crime. You have the right to demand justice. The Bharatiya Nyaya Sanhita strictly punishes rape, assault, and obtaining consent through false promises. Your identity must be kept private, your statement should be recorded by a female officer, and you are entitled to free legal and medical aid. A Zero FIR allows you to complain anywhere. If you are assaulted, reach a safe place immediately. Do not shower or wash your clothes to preserve evidence. Call the police at 112. Go to any police station to file a Zero FIR and get a medical test. You are not alone, the law protects you.",
        hi: "सेफ हर में आपका स्वागत है। आपकी सहमति के बिना यौन कृत्य एक गंभीर अपराध है। भारतीय न्याय संहिता बलात्कार, हमले और झूठे वादों के माध्यम से सहमति प्राप्त करने पर कड़ी सजा देती है। आपकी पहचान गुप्त रखी जानी चाहिए, आपका बयान एक महिला अधिकारी द्वारा दर्ज किया जाना चाहिए, और आपको मुफ्त कानूनी और चिकित्सा सहायता का अधिकार है। जीरो एफआईआर से आप कहीं भी शिकायत कर सकती हैं। यदि आपके साथ यह अपराध होता है, तो तुरंत एक सुरक्षित स्थान पर पहुंचें। सबूत बचाने के लिए नहाएं या कपड़े न धोएं। पुलिस को 112 पर कॉल करें। जीरो FIR दर्ज करने और मेडिकल टेस्ट के लिए किसी भी पुलिस स्टेशन जाएं। आप अकेली नहीं हैं।"
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