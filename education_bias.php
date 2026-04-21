<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Access to Education | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(172, 168, 201, 0.95)), url('https://images.pexels.com/photos/8422132/pexels-photo-8422132.jpeg') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-graduation-cap me-2"></i>Fundamental Rights</span>
                <h1 class="hero-title" data-i18n="hero_title">Access to Education: Your Right to Learn</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Education is a constitutional right, not a privilege. Protect yourself and other girls from forced dropouts, financial bias, and discrimination. Empower your future through learning.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Bridging the Gap</h2>
            <p class="section-subtitle" data-i18n="chart_sub">With government initiatives and growing awareness, female enrollment in higher education is steadily breaking historic barriers.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding female enrollment trends.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The Indian Constitution and specific acts guarantee equal educational opportunities.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-book-open"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Constitutional Rights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Article 21A:</strong> <span class="text-muted" data-i18n="art_14_d">The State shall provide free and compulsory education to all children of the age of 6 to 14 years.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Article 15:</strong> <span class="text-muted" data-i18n="art_15_d">Prohibits discrimination on grounds of religion, race, caste, sex, or place of birth, ensuring equal access to institutions.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Article 15(3):</strong> <span class="text-muted" data-i18n="art_21_d">Allows the State to make special provisions for women and children, such as reserved seats and scholarships.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-school"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Statutory & Policy Protections</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">RTE Act, 2009:</strong> <span class="text-muted" data-i18n="bns_63_d">Prohibits denial of admission and protects children from expulsion without completing elementary education.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">NEP 2020:</strong> <span class="text-muted" data-i18n="bns_74_d">The National Education Policy constitutes a 'Gender Inclusion Fund' to build equitable educational infrastructure.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Government Schemes:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">Programs like Beti Bachao Beti Padhao and Sukanya Samriddhi Yojana financially support a girl's education.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Educational bias can happen at home or within institutions. Recognize the barriers.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-person-walking-arrow-right text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Forced Dropout</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Pulling girls out of school prematurely to handle household chores, sibling care, or to work.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-wallet text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Financial Bias</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Families refusing to pay for a daughter's higher education while willingly funding a son's degree.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ring text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Early Marriage Pressure</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Stopping a girl's education to force an early or child marriage against her will and legal rights.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-restroom text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Institutional Bias</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Schools failing to provide safe sanitation (WASH facilities) or denying girls equal access to sports or STEM fields.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Education Access Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Follow these steps if you or someone you know is being denied an education.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1456513080510-7bf3a84b82f8?auto=format&fit=crop&w=600&q=80" alt="Know Your Rights">
                    <p class="flow-desc" data-i18n="step1_title">Know Your Rights</p>
                    <p class="text-muted small" data-i18n="step1_desc">Understand that the RTE Act guarantees your right to school. Research state-specific schemes meant to support girls' education.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80" alt="Seek Counseling">
                    <p class="flow-desc" data-i18n="step2_title">Seek Mediation</p>
                    <p class="text-muted small" data-i18n="step2_desc">If facing resistance at home, reach out to school counselors, teachers, or local NGOs to mediate with your parents.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1434030216411-0b793f4b4173?auto=format&fit=crop&w=600&q=80" alt="Access Aid">
                    <p class="flow-desc" data-i18n="step3_title">Access Government Aid</p>
                    <p class="text-muted small" data-i18n="step3_desc">Apply for national and state scholarships via the National Scholarship Portal, or seek education loans designed for women.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="Report Violations">
                    <p class="flow-desc" data-i18n="step4_title">Report Violations</p>
                    <p class="text-muted small" data-i18n="step4_desc">If you are a minor being forced to drop out for marriage, contact Childline (1098) or the NCPCR immediately for intervention.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Education is the strongest tool for your independence.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention & Support</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Reach out to these helplines and portals to secure your educational rights.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="tel:1098" class="btn-emergency-pill">
                    <i class="fas fa-child me-2"></i> <span data-i18n="btn_112">Childline: 1098</span>
                </a>
                <a href="https://scholarships.gov.in/" target="_blank" class="btn-emergency-pill" style="background-color: var(--text-main);">
                    <i class="fas fa-laptop me-2"></i> <span data-i18n="btn_1091">National Scholarship Portal</span>
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
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Find Scholarships</a>
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
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to educational and child protection portals.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="https://www.education.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">Ministry of Education</a>
                    <a href="https://ncpcr.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">NCPCR</a>
                </div>
            </div>
        </div>
        <hr class="mt-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 SafeHer. <span data-i18n="footer_copy">Informational infrastructure, not a substitute for active legal counsel. Dial 1098 for child emergencies.</span>
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
            hero_badge: "Fundamental Rights",
            hero_title: "Access to Education: Your Right to Learn",
            hero_desc: "Education is a constitutional right, not a privilege. Protect yourself and other girls from forced dropouts, financial bias, and discrimination. Empower your future through learning.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Bridging the Gap",
            chart_sub: "With government initiatives and growing awareness, female enrollment in higher education is steadily breaking historic barriers.",
            chart_label: "Female Enrollment in Higher Ed (illustrative)",
            chart_y: "Enrollment (Millions)",
            chart_note: "* Note: This graph displays illustrative data regarding female enrollment trends.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian Constitution and specific acts guarantee equal educational opportunities.",
            rights_const_title: "Constitutional Rights",
            art_14: "Article 21A:", art_14_d: "The State shall provide free and compulsory education to all children of the age of 6 to 14 years.",
            art_15: "Article 15:", art_15_d: "Prohibits discrimination on grounds of religion, race, caste, sex, or place of birth, ensuring equal access to institutions.",
            art_21: "Article 15(3):", art_21_d: "Allows the State to make special provisions for women and children, such as reserved seats and scholarships.",
            rights_bns_title: "Statutory & Policy Protections",
            bns_63: "RTE Act, 2009:", bns_63_d: "Prohibits denial of admission and protects children from expulsion without completing elementary education.",
            bns_74: "NEP 2020:", bns_74_d: "The National Education Policy constitutes a 'Gender Inclusion Fund' to build equitable educational infrastructure.",
            more_rights_2_p1: "Government Schemes:", more_rights_2_p2: "Programs like Beti Bachao Beti Padhao and Sukanya Samriddhi Yojana financially support a girl's education.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Educational bias can happen at home or within institutions. Recognize the barriers.",
            abuse_1: "Forced Dropout", abuse_1_d: "Pulling girls out of school prematurely to handle household chores, sibling care, or to work.",
            abuse_2: "Financial Bias", abuse_2_d: "Families refusing to pay for a daughter's higher education while willingly funding a son's degree.",
            abuse_3: "Early Marriage Pressure", abuse_3_d: "Stopping a girl's education to force an early or child marriage against her will and legal rights.",
            abuse_4: "Institutional Bias", abuse_4_d: "Schools failing to provide safe sanitation (WASH facilities) or denying girls equal access to sports or STEM fields.",
            guide_title: "Education Access Protocol",
            guide_sub: "Follow these steps if you or someone you know is being denied an education.",
            step1_title: "Know Your Rights", step1_desc: "Understand that the RTE Act guarantees your right to school. Research state-specific schemes meant to support girls' education.",
            step2_title: "Seek Mediation", step2_desc: "If facing resistance at home, reach out to school counselors, teachers, or local NGOs to mediate with your parents.",
            step3_title: "Access Government Aid", step3_desc: "Apply for national and state scholarships via the National Scholarship Portal, or seek education loans designed for women.",
            step4_title: "Report Violations", step4_desc: "If you are a minor being forced to drop out for marriage, contact Childline (1098) or the NCPCR immediately for intervention.",
            guide_note: "*Look at all the steps carefully. Education is the strongest tool for your independence.*",
            support_title: "Immediate Intervention & Support",
            support_sub: "Reach out to these helplines and portals to secure your educational rights.",
            btn_112: "Childline: 1098",
            btn_1091: "National Scholarship Portal",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Find Scholarships",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to educational and child protection portals.",
            gov_btn1: "Ministry of Education",
            gov_btn2: "NCPCR",
            footer_copy: "Informational infrastructure, not a substitute for active legal counsel. Dial 1098 for child emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "मौलिक अधिकार",
            hero_title: "शिक्षा तक पहुंच: आपका सीखने का अधिकार",
            hero_desc: "शिक्षा एक संवैधानिक अधिकार है, कोई विशेषाधिकार नहीं। जबरन पढ़ाई छुड़ाने, वित्तीय भेदभाव और पक्षपात से खुद को और अन्य लड़कियों को बचाएं। सीखने के माध्यम से अपने भविष्य को सशक्त बनाएं।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "अंतर को पाटना",
            chart_sub: "सरकारी पहलों और बढ़ती जागरूकता के साथ, उच्च शिक्षा में महिलाओं का नामांकन लगातार ऐतिहासिक बाधाओं को तोड़ रहा है।",
            chart_label: "उच्च शिक्षा में महिला नामांकन (illustrative)",
            chart_y: "नामांकन (Millions में)",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय संविधान और विशिष्ट अधिनियम समान शैक्षिक अवसरों की गारंटी देते हैं।",
            rights_const_title: "संवैधानिक अधिकार",
            art_14: "अनुच्छेद 21A:", art_14_d: "राज्य 6 से 14 वर्ष की आयु के सभी बच्चों को मुफ्त और अनिवार्य शिक्षा प्रदान करेगा।",
            art_15: "अनुच्छेद 15:", art_15_d: "धर्म, मूलवंश, जाति, लिंग या जन्म स्थान के आधार पर भेदभाव को रोकता है, संस्थानों तक समान पहुंच सुनिश्चित करता है।",
            art_21: "अनुच्छेद 15(3):", art_21_d: "राज्य को महिलाओं और बच्चों के लिए विशेष प्रावधान करने की अनुमति देता है, जैसे आरक्षित सीटें और छात्रवृत्ति।",
            rights_bns_title: "वैधानिक और नीतिगत सुरक्षा",
            bns_63: "RTE अधिनियम, 2009:", bns_63_d: "प्रवेश से इनकार करने पर रोक लगाता है और बच्चों को प्रारंभिक शिक्षा पूरी किए बिना निष्कासन से बचाता है।",
            bns_74: "NEP 2020:", bns_74_d: "राष्ट्रीय शिक्षा नीति न्यायसंगत शैक्षिक बुनियादी ढांचे के निर्माण के लिए 'जेंडर इंक्लूजन फंड' (Gender Inclusion Fund) का गठन करती है।",
            more_rights_2_p1: "सरकारी योजनाएं:", more_rights_2_p2: "बेटी बचाओ बेटी पढ़ाओ और सुकन्या समृद्धि योजना जैसे कार्यक्रम लड़कियों की शिक्षा का आर्थिक रूप से समर्थन करते हैं।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "शैक्षिक पूर्वाग्रह घर या संस्थानों के भीतर हो सकता है। बाधाओं को पहचानें।",
            abuse_1: "जबरन पढ़ाई छुड़ाना", abuse_1_d: "घर के कामकाज, भाई-बहनों की देखभाल या काम करने के लिए लड़कियों को समय से पहले स्कूल से निकाल लेना।",
            abuse_2: "वित्तीय भेदभाव", abuse_2_d: "बेटे की डिग्री के लिए खुशी-खुशी पैसे देना लेकिन बेटी की उच्च शिक्षा के लिए भुगतान करने से इनकार करना।",
            abuse_3: "कम उम्र में शादी का दबाव", abuse_3_d: "लड़की की इच्छा और कानूनी अधिकारों के खिलाफ कम उम्र में या बाल विवाह करने के लिए उसकी शिक्षा रोकना।",
            abuse_4: "संस्थागत पूर्वाग्रह", abuse_4_d: "स्कूलों द्वारा सुरक्षित स्वच्छता (WASH सुविधाएं) प्रदान करने में विफलता या लड़कियों को खेल या STEM क्षेत्रों तक समान पहुंच से वंचित करना।",
            guide_title: "शिक्षा पहुंच प्रोटोकॉल",
            guide_sub: "यदि आपको या आपके किसी परिचित को शिक्षा से वंचित किया जा रहा है तो इन चरणों का पालन करें।",
            step1_title: "अपने अधिकार जानें", step1_desc: "समझें कि RTE अधिनियम स्कूल के आपके अधिकार की गारंटी देता है। लड़कियों की शिक्षा का समर्थन करने वाली राज्य-विशिष्ट योजनाओं पर शोध करें।",
            step2_title: "मध्यस्थता की तलाश करें", step2_desc: "यदि घर पर विरोध का सामना करना पड़ रहा है, तो अपने माता-पिता के साथ मध्यस्थता करने के लिए स्कूल परामर्शदाताओं, शिक्षकों या स्थानीय गैर सरकारी संगठनों (NGO) तक पहुंचें।",
            step3_title: "सरकारी सहायता प्राप्त करें", step3_desc: "राष्ट्रीय छात्रवृत्ति पोर्टल के माध्यम से राष्ट्रीय और राज्य छात्रवृत्ति के लिए आवेदन करें, या महिलाओं के लिए डिज़ाइन किए गए शिक्षा ऋण लें।",
            step4_title: "उल्लंघनों की रिपोर्ट करें", step4_desc: "यदि आप नाबालिग हैं और शादी के लिए जबरन स्कूल से निकाला जा रहा है, तो हस्तक्षेप के लिए तुरंत चाइल्डलाइन (1098) या NCPCR से संपर्क करें।",
            guide_note: "*सभी कदमों को ध्यान से देखें। शिक्षा आपकी स्वतंत्रता का सबसे मजबूत साधन है।*",
            support_title: "तत्काल हस्तक्षेप और सहायता",
            support_sub: "अपने शैक्षिक अधिकारों को सुरक्षित करने के लिए इन हेल्पलाइन और पोर्टलों तक पहुंचें।",
            btn_112: "चाइल्डलाइन: 1098",
            btn_1091: "राष्ट्रीय छात्रवृत्ति पोर्टल",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "छात्रवृत्ति खोजें",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "शैक्षिक और बाल संरक्षण पोर्टलों तक सीधी पहुंच।",
            gov_btn1: "शिक्षा मंत्रालय",
            gov_btn2: "NCPCR",
            footer_copy: "सूचनात्मक ढांचा, कानूनी सलाह नहीं। बाल आपात स्थिति के लिए 1098 डायल करें।"
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
                    data: [18.2, 19.5, 20.8, 22.4, 24.1],
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
                        beginAtZero: false,
                        min: 15,
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
        en: "Welcome to SafeHer. Education is your fundamental constitutional right. Under Article 21A and the Right to Education Act, the State guarantees free and compulsory education. It is illegal to pull a girl out of school prematurely for household chores, or to force an early marriage. Financial bias, where a family refuses to fund a daughter's education but pays for a son's, is a social violation that you can fight. If you are facing pressure to drop out, first, know your rights and research government scholarship schemes like Beti Bachao Beti Padhao. Second, reach out to your school counselors or local NGOs to mediate with your parents. Third, apply for financial aid through the National Scholarship Portal. Finally, if you are a minor being forced into marriage and pulled out of school, call Childline at 1 0 9 8 immediately. Education is the strongest tool for your independence.",
        hi: "सेफ हर में आपका स्वागत है। शिक्षा आपका मौलिक संवैधानिक अधिकार है। अनुच्छेद 21A और शिक्षा के अधिकार अधिनियम के तहत, राज्य मुफ्त और अनिवार्य शिक्षा की गारंटी देता है। घर के कामकाज के लिए समय से पहले किसी लड़की को स्कूल से निकालना, या जल्दी शादी के लिए मजबूर करना गैरकानूनी है। वित्तीय भेदभाव, जहां एक परिवार बेटी की शिक्षा के लिए भुगतान करने से इनकार करता है लेकिन बेटे के लिए भुगतान करता है, एक सामाजिक उल्लंघन है जिससे आप लड़ सकती हैं। यदि आप स्कूल छोड़ने के दबाव का सामना कर रही हैं, तो सबसे पहले, अपने अधिकारों को जानें और बेटी बचाओ बेटी पढ़ाओ जैसी सरकारी छात्रवृत्ति योजनाओं पर शोध करें। दूसरा, अपने माता-पिता के साथ मध्यस्थता करने के लिए अपने स्कूल के परामर्शदाताओं या स्थानीय गैर सरकारी संगठनों (NGO) से संपर्क करें। तीसरा, राष्ट्रीय छात्रवृत्ति पोर्टल के माध्यम से वित्तीय सहायता के लिए आवेदन करें। अंत में, यदि आप एक नाबालिग हैं जिसे शादी के लिए मजबूर किया जा रहा है और स्कूल से निकाला जा रहा है, तो तुरंत चाइल्डलाइन 1 0 9 8 पर कॉल करें। शिक्षा आपकी स्वतंत्रता का सबसे मजबूत साधन है।"
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