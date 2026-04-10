<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dowry Harassment Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(158, 152, 198, 0.95)), url('img/hq720.jpg') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-balance-scale me-2"></i>Marital Rights & Safety</span>
                <h1 class="hero-title" data-i18n="hero_title">Dowry Harassment: Your Life is Not a Transaction</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Demanding dowry, emotional torture, and financial control are severe criminal offenses. Protect yourself and claim your rightful property (Stridhan). The law stands firmly with you.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Ending the Silence on Dowry</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Women across the nation are refusing to bow down to illegal demands, leading to a rise in legal action against perpetrators.</p>
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
            <p class="section-subtitle" data-i18n="rights_sub">The Indian legal system provides powerful tools to combat dowry demands and cruelty.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-ban"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Dowry Prohibition Act, 1961</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Complete Ban:</strong> <span class="text-muted" data-i18n="art_14_d">Giving, taking, or even demanding dowry is a punishable criminal offense.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Right to Stridhan:</strong> <span class="text-muted" data-i18n="art_15_d">Gifts given voluntarily to the bride are her absolute property (Stridhan). Holding it back is a crime.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Agreement Void:</strong> <span class="text-muted" data-i18n="art_21_d">Any agreement or contract made for the giving or taking of dowry is legally void.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Protections Under BNS</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">BNS Section 85 (Cruelty):</strong> <span class="text-muted" data-i18n="bns_63_d">Strict punishment for a husband or his relatives subjecting a woman to cruelty or harassment.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">BNS Section 80 (Dowry Death):</strong> <span class="text-muted" data-i18n="bns_74_d">Severe penalties if a woman dies under unnatural circumstances related to dowry demands.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Criminal Breach of Trust:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">If in-laws refuse to return your Stridhan, it constitutes a criminal breach of trust under the law.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Harassment takes many forms. Recognize the signs of illegal dowry demands.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-coins text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Direct Demands</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Asking for cash, property, vehicles, or expensive goods from you or your parents after marriage.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-brain text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Emotional Torture</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Constant taunts, humiliation regarding your family's status, or threats of divorce over money.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-lock text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Withholding Stridhan</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">In-laws forcibly taking your jewelry, gifts, or salary and refusing to give you access to them.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-hand-fist text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Physical Violence</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Beating, denying food, or locking you up as a tactic to force your family to fulfill demands.</span>
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
            <p class="section-subtitle" data-i18n="guide_sub">Follow these crucial steps if you are facing harassment for dowry.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=600&q=80" alt="Secure Evidence">
                    <p class="flow-desc" data-i18n="step1_title">Secure Evidence</p>
                    <p class="text-muted small" data-i18n="step1_desc">Quietly gather audio recordings, WhatsApp messages, bank statements, and a list of your Stridhan items.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1582213782179-e0d53f98f2ca?auto=format&fit=crop&w=600&q=80" alt="Move to Safety">
                    <p class="flow-desc" data-i18n="step2_title">Move to Safety</p>
                    <p class="text-muted small" data-i18n="step2_desc">If physical violence occurs, leave the house immediately and reach your parents, a trusted friend, or a shelter.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="File Complaint">
                    <p class="flow-desc" data-i18n="step3_title">File a Complaint</p>
                    <p class="text-muted small" data-i18n="step3_desc">Go to the local Crime Against Women (CAW) Cell or police station to file an FIR under BNS Section 85.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1555448248-2571daf6344b?auto=format&fit=crop&w=600&q=80" alt="Legal Action">
                    <p class="flow-desc" data-i18n="step4_title">Claim Your Stridhan</p>
                    <p class="text-muted small" data-i18n="step4_desc">Through your lawyer or the police, file an official demand for the immediate return of your jewelry and belongings.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Escaping physical danger is your first priority.*</p>
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
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_112">Police Emergency: 112</span>
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
            hero_badge: "Marital Rights & Safety",
            hero_title: "Dowry Harassment: Your Life is Not a Transaction",
            hero_desc: "Demanding dowry, emotional torture, and financial control are severe criminal offenses. Protect yourself and claim your rightful property (Stridhan). The law stands firmly with you.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Ending the Silence on Dowry",
            chart_sub: "Women across the nation are refusing to bow down to illegal demands, leading to a rise in legal action against perpetrators.",
            chart_label: "Reported Dowry Cases (illustrative)",
            chart_y: "Cases (in thousands)",
            chart_note: "* Note: This graph displays illustrative reporting trends for functional demonstration.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian legal system provides powerful tools to combat dowry demands and cruelty.",
            rights_const_title: "Dowry Prohibition Act, 1961",
            art_14: "Complete Ban:", art_14_d: "Giving, taking, or even demanding dowry is a punishable criminal offense.",
            art_15: "Right to Stridhan:", art_15_d: "Gifts given voluntarily to the bride are her absolute property (Stridhan). Holding it back is a crime.",
            art_21: "Agreement Void:", art_21_d: "Any agreement or contract made for the giving or taking of dowry is legally void.",
            rights_bns_title: "Protections Under BNS",
            bns_63: "BNS Section 85 (Cruelty):", bns_63_d: "Strict punishment for a husband or his relatives subjecting a woman to cruelty or harassment.",
            bns_74: "BNS Section 80 (Dowry Death):", bns_74_d: "Severe penalties if a woman dies under unnatural circumstances related to dowry demands.",
            more_rights_2_p1: "Criminal Breach of Trust:", more_rights_2_p2: "If in-laws refuse to return your Stridhan, it constitutes a criminal breach of trust under the law.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Harassment takes many forms. Recognize the signs of illegal dowry demands.",
            abuse_1: "Direct Demands", abuse_1_d: "Asking for cash, property, vehicles, or expensive goods from you or your parents after marriage.",
            abuse_2: "Emotional Torture", abuse_2_d: "Constant taunts, humiliation regarding your family's status, or threats of divorce over money.",
            abuse_3: "Withholding Stridhan", abuse_3_d: "In-laws forcibly taking your jewelry, gifts, or salary and refusing to give you access to them.",
            abuse_4: "Physical Violence", abuse_4_d: "Beating, denying food, or locking you up as a tactic to force your family to fulfill demands.",
            guide_title: "Emergency Protocol Flow",
            guide_sub: "Follow these crucial steps if you are facing harassment for dowry.",
            step1_title: "Secure Evidence", step1_desc: "Quietly gather audio recordings, WhatsApp messages, bank statements, and a list of your Stridhan items.",
            step2_title: "Move to Safety", step2_desc: "If physical violence occurs, leave the house immediately and reach your parents, a trusted friend, or a shelter.",
            step3_title: "File a Complaint", step3_desc: "Go to the local Crime Against Women (CAW) Cell or police station to file an FIR under BNS Section 85.",
            step4_title: "Claim Your Stridhan", step4_desc: "Through your lawyer or the police, file an official demand for the immediate return of your jewelry and belongings.",
            guide_note: "*Look at all the steps carefully. Escaping physical danger is your first priority.*",
            support_title: "Immediate Intervention",
            support_sub: "Official government dispatch lines. Available 24/7/365.",
            btn_112: "Police Emergency: 112",
            btn_1091: "Women Helpline: 1091",
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
            hero_badge: "वैवाहिक अधिकार और सुरक्षा",
            hero_title: "दहेज उत्पीड़न: आपका जीवन कोई सौदा नहीं है",
            hero_desc: "दहेज मांगना, मानसिक प्रताड़ना, और वित्तीय नियंत्रण गंभीर अपराध हैं। अपनी रक्षा करें और अपनी संपत्ति (स्त्रीधन) पर दावा करें। कानून मजबूती से आपके साथ है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "दहेज पर चुप्पी तोड़ना",
            chart_sub: "देश भर में महिलाएं अवैध मांगों के आगे झुकने से इनकार कर रही हैं, जिससे अपराधियों के खिलाफ कानूनी कार्रवाई में वृद्धि हुई है।",
            chart_label: "दर्ज दहेज उत्पीड़न मामले (illustrative)",
            chart_y: "मामले (thousands में)",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय कानूनी प्रणाली दहेज की मांगों और क्रूरता से निपटने के लिए शक्तिशाली अधिकार प्रदान करती है।",
            rights_const_title: "दहेज निषेध अधिनियम, 1961",
            art_14: "पूर्ण प्रतिबंध:", art_14_d: "दहेज देना, लेना या यहाँ तक कि मांगना एक दंडनीय आपराधिक कृत्य है।",
            art_15: "स्त्रीधन का अधिकार:", art_15_d: "दुल्हन को स्वेच्छा से दिए गए उपहार उसकी पूर्ण संपत्ति (स्त्रीधन) हैं। इसे रोकना अपराध है।",
            art_21: "समझौता शून्य:", art_21_d: "दहेज देने या लेने के लिए किया गया कोई भी समझौता या अनुबंध कानूनी रूप से शून्य (अमान्य) है।",
            rights_bns_title: "BNS के तहत सुरक्षा",
            bns_63: "BNS धारा 85 (क्रूरता):", bns_63_d: "पति या उसके रिश्तेदारों द्वारा महिला को क्रूरता या उत्पीड़न का शिकार बनाने पर सख्त सजा।",
            bns_74: "BNS धारा 80 (दहेज मृत्यु):", bns_74_d: "दहेज की मांगों से संबंधित अप्राकृतिक परिस्थितियों में महिला की मृत्यु होने पर गंभीर दंड।",
            more_rights_2_p1: "आपराधिक विश्वासघात:", more_rights_2_p2: "यदि ससुराल वाले आपका स्त्रीधन वापस करने से इनकार करते हैं, तो यह कानून के तहत विश्वास का आपराधिक हनन है।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "उत्पीड़न कई रूप लेता है। अवैध दहेज की मांगों के संकेतों को पहचानें।",
            abuse_1: "सीधी मांग", abuse_1_d: "शादी के बाद आपसे या आपके माता-पिता से नकद, संपत्ति, वाहन या महंगे सामान मांगना।",
            abuse_2: "मानसिक प्रताड़ना", abuse_2_d: "पैसे को लेकर लगातार ताने मारना, आपके परिवार की स्थिति का अपमान करना, या तलाक की धमकी देना।",
            abuse_3: "स्त्रीधन रोकना", abuse_3_d: "ससुराल वालों द्वारा जबरन आपके गहने, उपहार या वेतन लेना और आपको उन तक पहुँचने से रोकना।",
            abuse_4: "शारीरिक हिंसा", abuse_4_d: "आपके परिवार को मांगें पूरी करने के लिए मजबूर करने की रणनीति के रूप में पीटना, खाना न देना, या आपको बंद करना।",
            guide_title: "आपातकालीन प्रोटोकॉल",
            guide_sub: "यदि आप दहेज के लिए उत्पीड़न का सामना कर रही हैं तो इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "सबूत सुरक्षित करें", step1_desc: "चुपचाप ऑडियो रिकॉर्डिंग, व्हाट्सएप संदेश, बैंक स्टेटमेंट, और अपने स्त्रीधन आइटम की सूची एकत्र करें।",
            step2_title: "सुरक्षित स्थान पर जाएं", step2_desc: "यदि शारीरिक हिंसा होती है, तो तुरंत घर छोड़ दें और अपने माता-पिता, एक विश्वसनीय दोस्त, या आश्रय स्थल पर पहुँचें।",
            step3_title: "शिकायत दर्ज करें", step3_desc: "BNS की धारा 85 के तहत FIR दर्ज करने के लिए स्थानीय महिला अपराध (CAW) सेल या पुलिस स्टेशन जाएं।",
            step4_title: "स्त्रीधन का दावा करें", step4_desc: "अपने वकील या पुलिस के माध्यम से, अपने गहने और सामान की तत्काल वापसी के लिए एक आधिकारिक मांग दर्ज करें।",
            guide_note: "*सभी कदमों को ध्यान से देखें। शारीरिक खतरे से बचना आपकी पहली प्राथमिकता है।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "आधिकारिक सरकारी प्रेषण लाइनें। 24/7/365 उपलब्ध।",
            btn_112: "आपातकालीन: 112",
            btn_1091: "महिला हेल्पलाइन: 1091",
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
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025 (Est.)'],
                datasets: [{
                    label: translations['en'].chart_label,
                    data: [120, 115, 95, 88, 75],
                    backgroundColor: 'rgba(255, 77, 79, 0.7)',
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
        en: "Welcome to SafeHer. Demanding dowry, emotional torture, and financial control are severe criminal offenses. Under the Dowry Prohibition Act and Bharatiya Nyaya Sanhita Section 85, you are protected from cruelty by a husband or his relatives. Any gifts given to you voluntarily belong entirely to you. This is called Stridhan. If your in-laws refuse to return your Stridhan, it is a criminal breach of trust. If you are facing physical violence, direct demands for cash, or emotional torture, you must act. First, secure evidence like messages and audio recordings. Second, if you are in physical danger, leave the house immediately and reach a safe place. Third, file an FIR at the nearest police station or Crime Against Women Cell. Finally, use legal help to claim back your Stridhan. You have the right to live with dignity. Dial 112 for immediate police help.",
        hi: "सेफ हर में आपका स्वागत है। दहेज की मांग करना, मानसिक प्रताड़ना, और वित्तीय नियंत्रण गंभीर आपराधिक कृत्य हैं। दहेज निषेध अधिनियम और बीएनएस की धारा 85 के तहत, आप पति या उसके रिश्तेदारों द्वारा क्रूरता से सुरक्षित हैं। आपको स्वेच्छा से दिए गए कोई भी उपहार पूरी तरह से आपके हैं, इसे स्त्रीधन कहा जाता है। यदि ससुराल वाले आपका स्त्रीधन वापस करने से इनकार करते हैं, तो यह एक अपराध है। यदि आप शारीरिक हिंसा, नकद की सीधी मांग, या मानसिक प्रताड़ना का सामना कर रही हैं, तो आपको कार्रवाई करनी चाहिए। सबसे पहले, संदेश और ऑडियो रिकॉर्डिंग जैसे सबूत सुरक्षित करें। दूसरा, यदि आप शारीरिक खतरे में हैं, तो तुरंत घर छोड़ दें और सुरक्षित स्थान पर पहुंचें। तीसरा, निकटतम पुलिस स्टेशन या महिला अपराध सेल में एफआईआर दर्ज करें। अंत में, अपना स्त्रीधन वापस पाने के लिए कानूनी मदद लें। आपको सम्मान के साथ जीने का अधिकार है। तत्काल पुलिस सहायता के लिए 112 डायल करें।"
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