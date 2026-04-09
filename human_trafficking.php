<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Trafficking Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(162, 157, 193, 0.95)), url('https://images.pexels.com/photos/8107550/pexels-photo-8107550.jpeg') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-link-slash me-2"></i>Liberty & Rescue Rights</span>
                <h1 class="hero-title" data-i18n="hero_title">Human Trafficking: Break the Chains</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Buying, selling, or forcing individuals into labor, commercial sex, or fraudulent marriage is a grave crime against humanity. Learn the warning signs, understand your rights, and discover how to seek immediate rescue.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">The Fight for Freedom</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Vigilance and strong anti-trafficking units are leading to an increase in successful rescue operations across the country.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding rescue operations for functional demonstration.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The Indian legal framework aggressively prosecutes traffickers and protects victims.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-scale-balanced"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Constitutional & Civil Protections</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Article 23:</strong> <span class="text-muted" data-i18n="art_14_d">Strictly prohibits traffic in human beings, begar, and other similar forms of forced labor.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">ITPA:</strong> <span class="text-muted" data-i18n="art_15_d">The Immoral Traffic (Prevention) Act penalizes trafficking for commercial sexual exploitation.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Right to Rehabilitation:</strong> <span class="text-muted" data-i18n="art_21_d">Rescued victims have the legal right to shelter, medical care, and reintegration programs.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Protections Under BNS</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">BNS Section 143:</strong> <span class="text-muted" data-i18n="bns_63_d">Defines and severely punishes the trafficking of persons for physical or sexual exploitation.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">BNS Section 137:</strong> <span class="text-muted" data-i18n="bns_74_d">Punishment for kidnapping, abducting, or inducing a woman to compel her into marriage or illicit intercourse.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Child Protection:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">Trafficking of minors carries enhanced, extremely rigorous penalties under BNS and POCSO.</span></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="invasion" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="abuse_title">Identify the Indicators</h2>
            <p class="section-subtitle" data-i18n="abuse_sub">Trafficking often hides in plain sight. Recognize the methods used to trap victims.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-briefcase text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Fraudulent Recruitment</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Fake job offers promising high salaries in other cities or countries, leading to forced labor.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ring text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Sham Marriages</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Luring women into fake marriages only to sell them into domestic servitude or prostitution.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-passport text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Withholding Documents</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Employers or agents confiscating your ID, Aadhaar, or passport to prevent you from escaping.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-money-bill-wave text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Debt Bondage</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Forcing you to work for free or under abusive conditions to pay off an artificially inflated or inherited debt.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Emergency Escape & Rescue Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">If you or someone you know is trapped, follow these critical steps for rescue.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1578357078586-491adf1aa5ba?auto=format&fit=crop&w=600&q=80" alt="Recognize Signs">
                    <p class="flow-desc" data-i18n="step1_title">Identify Isolation</p>
                    <p class="text-muted small" data-i18n="step1_desc">If your communication is monitored, your movements restricted, and documents taken, you are in danger.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1588702547923-7093a6c3ba33?auto=format&fit=crop&w=600&q=80" alt="Secure Communication">
                    <p class="flow-desc" data-i18n="step2_title">Secret Communication</p>
                    <p class="text-muted small" data-i18n="step2_desc">Find a safe moment to use a phone, write a note, or signal a neighbor, doctor, or customer for help.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1584515933487-779824d29309?auto=format&fit=crop&w=600&q=80" alt="Call Authorities">
                    <p class="flow-desc" data-i18n="step3_title">Contact Helplines</p>
                    <p class="text-muted small" data-i18n="step3_desc">Dial 112 (Police), 181 (Women), or 1098 (Childline). Share your location or any defining landmarks.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1544928147-79a2dbc1f389?auto=format&fit=crop&w=600&q=80" alt="Rehabilitation">
                    <p class="flow-desc" data-i18n="step4_title">AHTU Rescue</p>
                    <p class="text-muted small" data-i18n="step4_desc">The Anti Human Trafficking Unit (AHTU) will extract you. You have the right to a safe shelter and legal aid.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Reaching out to authorities is your fastest path to freedom.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Official government dispatch lines for rescue. Available 24/7/365.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="tel:112" class="btn-emergency-pill">
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_112">Police Rescue: 112</span>
                </a>
                <a href="tel:1098" class="btn-emergency-pill" style="background-color: #2b6cb0;">
                    <i class="fas fa-child me-2"></i> <span data-i18n="btn_1091">Childline: 1098</span>
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
                    <li><a href="../basic_info.php"><i class="fas fa-user text-primary me-2"></i><span data-i18n="f_link1">My Profile</span></a></li>
                    <li><a href="../basic_info.php#faq"><i class="fas fa-question-circle text-primary me-2"></i><span data-i18n="f_link2">Q & A</span></a></li>
                    <li><a href="../basic_info.php#know-laws"><i class="fas fa-book text-primary me-2"></i><span data-i18n="f_link3">Know the Laws</span></a></li>
                </ul>
            </div>
            <div class="col-lg-5 col-md-6">
                <h5 data-i18n="footer_gov_title">Official Govt Portals</h5>
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to official complaint portals.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="http://ncwapps.nic.in/onlinecomplaintsv2/frmInstructions.aspx" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">NCW Online Complaint</a>
                    <a href="https://wcd.nic.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">Ministry of WCD</a>
                    <a href="https://wcd.nic.in/schemes/one-stop-centre-scheme" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn3">One Stop Center Locator</a>
                </div>
            </div>
        </div>
        <hr class="mt-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 SafeHer. <span data-i18n="footer_copy">Informational infrastructure, not a substitute for active law enforcement. Dial 112 for immediate emergencies.</span>
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
            hero_badge: "Liberty & Rescue Rights",
            hero_title: "Human Trafficking: Break the Chains",
            hero_desc: "Buying, selling, or forcing individuals into labor, commercial sex, or fraudulent marriage is a grave crime against humanity. Learn the warning signs, understand your rights, and discover how to seek immediate rescue.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "The Fight for Freedom",
            chart_sub: "Vigilance and strong anti-trafficking units are leading to an increase in successful rescue operations across the country.",
            chart_label: "Rescued Trafficking Victims (illustrative)",
            chart_y: "Individuals Rescued",
            chart_note: "* Note: This graph displays illustrative data regarding rescue operations for functional demonstration.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian legal framework aggressively prosecutes traffickers and protects victims.",
            rights_const_title: "Constitutional & Civil Protections",
            art_14: "Article 23:", art_14_d: "Strictly prohibits traffic in human beings, begar, and other similar forms of forced labor.",
            art_15: "ITPA:", art_15_d: "The Immoral Traffic (Prevention) Act penalizes trafficking for commercial sexual exploitation.",
            art_21: "Right to Rehabilitation:", art_21_d: "Rescued victims have the legal right to shelter, medical care, and reintegration programs.",
            rights_bns_title: "Protections Under BNS",
            bns_63: "BNS Section 143:", bns_63_d: "Defines and severely punishes the trafficking of persons for physical or sexual exploitation.",
            bns_74: "BNS Section 137:", bns_74_d: "Punishment for kidnapping, abducting, or inducing a woman to compel her into marriage or illicit intercourse.",
            more_rights_2_p1: "Child Protection:", more_rights_2_p2: "Trafficking of minors carries enhanced, extremely rigorous penalties under BNS and POCSO.",
            abuse_title: "Identify the Indicators",
            abuse_sub: "Trafficking often hides in plain sight. Recognize the methods used to trap victims.",
            abuse_1: "Fraudulent Recruitment", abuse_1_d: "Fake job offers promising high salaries in other cities or countries, leading to forced labor.",
            abuse_2: "Sham Marriages", abuse_2_d: "Luring women into fake marriages only to sell them into domestic servitude or prostitution.",
            abuse_3: "Withholding Documents", abuse_3_d: "Employers or agents confiscating your ID, Aadhaar, or passport to prevent you from escaping.",
            abuse_4: "Debt Bondage", abuse_4_d: "Forcing you to work for free or under abusive conditions to pay off an artificially inflated or inherited debt.",
            guide_title: "Emergency Escape & Rescue Protocol",
            guide_sub: "If you or someone you know is trapped, follow these critical steps for rescue.",
            step1_title: "Identify Isolation", step1_desc: "If your communication is monitored, your movements restricted, and documents taken, you are in danger.",
            step2_title: "Secret Communication", step2_desc: "Find a safe moment to use a phone, write a note, or signal a neighbor, doctor, or customer for help.",
            step3_title: "Contact Helplines", step3_desc: "Dial 112 (Police), 181 (Women), or 1098 (Childline). Share your location or any defining landmarks.",
            step4_title: "AHTU Rescue", step4_desc: "The Anti Human Trafficking Unit (AHTU) will extract you. You have the right to a safe shelter and legal aid.",
            guide_note: "*Look at all the steps carefully. Reaching out to authorities is your fastest path to freedom.*",
            support_title: "Immediate Intervention",
            support_sub: "Official government dispatch lines for rescue. Available 24/7/365.",
            btn_112: "Police Rescue: 112",
            btn_1091: "Childline: 1098",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Get Emergency Help (112)",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official complaint portals.",
            gov_btn1: "NCW Online Complaint",
            gov_btn2: "Ministry of WCD",
            gov_btn3: "One Stop Center Locator",
            footer_copy: "Informational infrastructure, not a substitute for active law enforcement. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "स्वतंत्रता और बचाव के अधिकार",
            hero_title: "मानव तस्करी: शोषण की जंजीरें तोड़ें",
            hero_desc: "श्रम, देह व्यापार, या फर्जी शादी के लिए लोगों को खरीदना, बेचना या मजबूर करना मानवता के खिलाफ एक गंभीर अपराध है। चेतावनी के संकेतों को जानें, अपने अधिकारों को समझें, और तत्काल बचाव के तरीके खोजें।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "स्वतंत्रता की लड़ाई",
            chart_sub: "जागरूकता और मजबूत एंटी-ट्रैफिकिंग इकाइयों के कारण देश भर में सफल बचाव अभियानों में वृद्धि हो रही है।",
            chart_label: "बचाए गए तस्करी के शिकार (illustrative)",
            chart_y: "बचाए गए व्यक्ति",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय कानूनी ढांचा तस्करों पर आक्रामक रूप से मुकदमा चलाता है और पीड़ितों की रक्षा करता है।",
            rights_const_title: "संवैधानिक और नागरिक सुरक्षा",
            art_14: "अनुच्छेद 23:", art_14_d: "मानव व्यापार, बेगार (बिना वेतन के काम), और इसी तरह के अन्य जबरन श्रम पर सख्त प्रतिबंध लगाता है।",
            art_15: "ITPA:", art_15_d: "अनैतिक व्यापार (निवारण) अधिनियम व्यावसायिक यौन शोषण के लिए तस्करी को दंडित करता है।",
            art_21: "पुनर्वास का अधिकार:", art_21_d: "बचाए गए पीड़ितों को आश्रय, चिकित्सा देखभाल और समाज में वापस लौटने के कार्यक्रमों का कानूनी अधिकार है।",
            rights_bns_title: "BNS के तहत सुरक्षा",
            bns_63: "BNS धारा 143:", bns_63_d: "शारीरिक या यौन शोषण के लिए व्यक्तियों की तस्करी को परिभाषित करता है और कड़ी सजा देता है।",
            bns_74: "BNS धारा 137:", bns_74_d: "किसी महिला को शादी या अवैध संभोग के लिए मजबूर करने हेतु अपहरण या बहला-फुसलाकर ले जाने पर सजा।",
            more_rights_2_p1: "बाल संरक्षण:", more_rights_2_p2: "नाबालिगों की तस्करी के लिए BNS और POCSO के तहत बहुत सख्त और कठोर दंड हैं।",
            abuse_title: "संकेतों को पहचानें",
            abuse_sub: "तस्करी अक्सर सामने छिप जाती है। पीड़ितों को फंसाने के लिए इस्तेमाल किए जाने वाले तरीकों को पहचानें।",
            abuse_1: "धोखाधड़ी से भर्ती", abuse_1_d: "अन्य शहरों या देशों में उच्च वेतन का वादा करने वाले नकली नौकरी के प्रस्ताव, जो जबरन श्रम की ओर ले जाते हैं।",
            abuse_2: "फर्जी शादियां", abuse_2_d: "महिलाओं को घरेलू दासता या वेश्यावृत्ति में बेचने के लिए नकली शादियों का लालच देना।",
            abuse_3: "दस्तावेज़ रोकना", abuse_3_d: "नियोक्ता या एजेंट आपके भागने को रोकने के लिए आपका आईडी, आधार या पासपोर्ट जब्त कर लेते हैं।",
            abuse_4: "कर्ज का बंधन", abuse_4_d: "बढ़ा-चढ़ाकर बताए गए या विरासत में मिले कर्ज को चुकाने के लिए आपको मुफ्त में काम करने के लिए मजबूर करना।",
            guide_title: "आपातकालीन बचाव प्रोटोकॉल",
            guide_sub: "यदि आप या आपका कोई परिचित फंसा हुआ है, तो बचाव के लिए इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "अलगाव को पहचानें", step1_desc: "यदि आपके संचार की निगरानी की जाती है, आपकी गतिविधियों को प्रतिबंधित किया जाता है, और दस्तावेज़ ले लिए जाते हैं, तो आप खतरे में हैं।",
            step2_title: "गुप्त संचार", step2_desc: "फोन का उपयोग करने, एक नोट लिखने, या मदद के लिए पड़ोसी, डॉक्टर या ग्राहक को संकेत देने का एक सुरक्षित क्षण खोजें।",
            step3_title: "हेल्पलाइन पर संपर्क करें", step3_desc: "112 (पुलिस), 181 (महिला), या 1098 (चाइल्डलाइन) डायल करें। अपना स्थान या कोई पहचान चिह्न साझा करें।",
            step4_title: "AHTU बचाव", step4_desc: "एंटी ह्यूमन ट्रैफिकिंग यूनिट (AHTU) आपको बचाएगी। आपको एक सुरक्षित आश्रय और कानूनी सहायता का अधिकार है।",
            guide_note: "*सभी कदमों को ध्यान से देखें। अधिकारियों तक पहुंचना आपकी स्वतंत्रता का सबसे तेज़ मार्ग है।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "बचाव के लिए आधिकारिक सरकारी प्रेषण लाइनें। 24/7/365 उपलब्ध।",
            btn_112: "पुलिस बचाव: 112",
            btn_1091: "चाइल्डलाइन: 1098",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "आपातकालीन मदद लें (112)",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी शिकायत पोर्टल तक पहुँच।",
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
                    data: [1500, 1800, 2200, 2900, 3400],
                    backgroundColor: 'rgba(43, 108, 176, 0.2)',
                    borderColor: '#2b6cb0',
                    borderWidth: 3,
                    pointBackgroundColor: '#fff',
                    pointBorderColor: '#2b6cb0',
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
        en: "Welcome to SafeHer. Buying, selling, or forcing individuals into labor, commercial sex, or fraudulent marriage is a grave crime known as human trafficking. Under Article 23 of the Constitution and BNS Section 143, trafficking and forced labor are strictly prohibited. The Immoral Traffic Prevention Act also protects victims of commercial sexual exploitation. Trafficking often hides behind fake job offers, sham marriages, or debt bondage where your documents are taken from you. If your communication is monitored and your movements are restricted, you are in danger. Try to find a safe moment to use a phone, write a note, or signal someone for help. Dial 112 for the police, 181 for the Women's Helpline, or 1098 for Childline. The Anti Human Trafficking Unit will extract you. You have the legal right to rescue, shelter, and rehabilitation. Reaching out to authorities is your fastest path to freedom.",
        hi: "सेफ हर में आपका स्वागत है। श्रम, देह व्यापार, या फर्जी शादी के लिए व्यक्तियों को खरीदना, बेचना या मजबूर करना एक गंभीर अपराध है जिसे मानव तस्करी कहा जाता है। संविधान के अनुच्छेद 23 और BNS की धारा 143 के तहत, तस्करी और जबरन श्रम सख्त वर्जित है। अनैतिक व्यापार निवारण अधिनियम भी पीड़ितों की रक्षा करता है। तस्करी अक्सर फर्जी नौकरी के प्रस्तावों, नकली शादियों, या कर्ज के बंधन के पीछे छिपी होती है जहां आपके दस्तावेज़ आपसे छीन लिए जाते हैं। यदि आपके संचार की निगरानी की जाती है और आपकी गतिविधियों को प्रतिबंधित किया जाता है, तो आप खतरे में हैं। फोन का उपयोग करने, नोट लिखने या मदद के लिए किसी को संकेत देने का एक सुरक्षित क्षण खोजने का प्रयास करें। पुलिस के लिए 112, महिला हेल्पलाइन के लिए 181, या चाइल्डलाइन के लिए 1098 डायल करें। एंटी ह्यूमन ट्रैफिकिंग यूनिट आपको बचाएगी। आपको बचाव, आश्रय और पुनर्वास का कानूनी अधिकार है। अधिकारियों तक पहुंचना आपकी स्वतंत्रता का सबसे तेज़ मार्ग है।"
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