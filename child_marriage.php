<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Child Marriage Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(174, 170, 200, 0.95)), url('https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-child-reaching me-2"></i>Health & Social Rights</span>
                <h1 class="hero-title" data-i18n="hero_title">Child Marriage: Protect Her Future</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Marriage before the age of 18 is a crime, not a tradition. Every girl has the absolute right to complete her education, choose her path, and live her childhood freely.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Saving Childhoods</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Through active reporting to Childline and police interventions, thousands of illegal child marriages are being stopped every year.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding prevented child marriages.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The law strictly prohibits the marriage of any girl under 18 and any boy under 21.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-book-open"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Prohibition of Child Marriage Act, 2006</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Strict Punishment:</strong> <span class="text-muted" data-i18n="art_14_d">Adults marrying minors, and those organizing or attending the wedding, face rigorous imprisonment and heavy fines.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Right to Annulment:</strong> <span class="text-muted" data-i18n="art_15_d">A child bride has the right to declare the marriage void within two years of turning 18 (i.e., before she turns 20).</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Maintenance Rights:</strong> <span class="text-muted" data-i18n="art_21_d">Even if a child marriage is annulled, the girl has the legal right to claim maintenance from the husband or his parents until she remarries.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">POCSO and BNS Implications</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">POCSO Act:</strong> <span class="text-muted" data-i18n="bns_63_d">Any sexual relationship with a girl under 18, even within a marriage, is classified as statutory rape under the POCSO Act.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">Court Injunctions:</strong> <span class="text-muted" data-i18n="bns_74_d">Courts can issue immediate stay orders (injunctions) to stop a planned child marriage from taking place.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Duty to Report:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">It is the legal duty of teachers, neighbors, and local authorities to report suspected child marriages immediately.</span></div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="invasion" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="abuse_title">Identify the Warning Signs</h2>
            <p class="section-subtitle" data-i18n="abuse_sub">Child marriages are often planned in secret. Recognize the red flags.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-school-circle-xmark text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Sudden Dropout</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">A young girl abruptly stopping her education for vague "family reasons" or "travel."</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-id-badge text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Falsified Documents</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Families creating fake Aadhaar cards or birth certificates to prove the girl is over 18.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-user-secret text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Secret Ceremonies</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Arranging weddings late at night, during long holidays, or moving the girl to a different state for the ceremony.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ring text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Forced Engagement</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Engaging or "promising" a minor girl to an older man in exchange for money, debt relief, or familial ties.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Emergency Intervention Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Follow these crucial steps if you suspect a child marriage is taking place.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1584483766114-2cea6fac8fcb?auto=format&fit=crop&w=600&q=80" alt="Call Childline">
                    <p class="flow-desc" data-i18n="step1_title">Call Childline Immediately</p>
                    <p class="text-muted small" data-i18n="step1_desc">Dial 1098 immediately. This is a free, 24/7 emergency phone service for children in need of aid and assistance.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?auto=format&fit=crop&w=600&q=80" alt="Inform Teachers">
                    <p class="flow-desc" data-i18n="step2_title">Inform School Authorities</p>
                    <p class="text-muted small" data-i18n="step2_desc">If the girl is a student, confidentially alert her teachers or the school principal so they can intervene.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="Contact Police">
                    <p class="flow-desc" data-i18n="step3_title">Contact the CMPO / Police</p>
                    <p class="text-muted small" data-i18n="step3_desc">Report the issue to the local police (112) or the designated Child Marriage Prohibition Officer (CMPO) in your district.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1505664177941-10f1c1f4e1f7?auto=format&fit=crop&w=600&q=80" alt="Court Injunction">
                    <p class="flow-desc" data-i18n="step4_title">Get a Court Injunction</p>
                    <p class="text-muted small" data-i18n="step4_desc">The police or CMPO can immediately approach the local court to get an injunction order to legally stop the wedding.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Reporting a child marriage can be done completely anonymously.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Official rescue and protection helplines. Available 24/7.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="tel:1098" class="btn-emergency-pill">
                    <i class="fas fa-child me-2"></i> <span data-i18n="btn_112">Childline: 1098</span>
                </a>
                <a href="tel:112" class="btn-emergency-pill" style="background-color: var(--text-main);">
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_1091">Police Emergency: 112</span>
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
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Call Childline (1098)</a>
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
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to official protection and legal portals.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="https://ncpcr.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">NCPCR (Child Rights)</a>
                    <a href="https://wcd.nic.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">Ministry of WCD</a>
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
            hero_badge: "Health & Social Rights",
            hero_title: "Child Marriage: Protect Her Future",
            hero_desc: "Marriage before the age of 18 is a crime, not a tradition. Every girl has the absolute right to complete her education, choose her path, and live her childhood freely.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Saving Childhoods",
            chart_sub: "Through active reporting to Childline and police interventions, thousands of illegal child marriages are being stopped every year.",
            chart_label: "Prevented Child Marriages (illustrative)",
            chart_y: "Marriages Stopped",
            chart_note: "* Note: This graph displays illustrative data regarding prevented child marriages.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The law strictly prohibits the marriage of any girl under 18 and any boy under 21.",
            rights_const_title: "Prohibition of Child Marriage Act, 2006",
            art_14: "Strict Punishment:", art_14_d: "Adults marrying minors, and those organizing or attending the wedding, face rigorous imprisonment and heavy fines.",
            art_15: "Right to Annulment:", art_15_d: "A child bride has the right to declare the marriage void within two years of turning 18 (i.e., before she turns 20).",
            art_21: "Maintenance Rights:", art_21_d: "Even if a child marriage is annulled, the girl has the legal right to claim maintenance from the husband or his parents until she remarries.",
            rights_bns_title: "POCSO and BNS Implications",
            bns_63: "POCSO Act:", bns_63_d: "Any sexual relationship with a girl under 18, even within a marriage, is classified as statutory rape under the POCSO Act.",
            bns_74: "Court Injunctions:", bns_74_d: "Courts can issue immediate stay orders (injunctions) to stop a planned child marriage from taking place.",
            more_rights_2_p1: "Duty to Report:", more_rights_2_p2: "It is the legal duty of teachers, neighbors, and local authorities to report suspected child marriages immediately.",
            abuse_title: "Identify the Warning Signs",
            abuse_sub: "Child marriages are often planned in secret. Recognize the red flags.",
            abuse_1: "Sudden Dropout", abuse_1_d: "A young girl abruptly stopping her education for vague 'family reasons' or 'travel'.",
            abuse_2: "Falsified Documents", abuse_2_d: "Families creating fake Aadhaar cards or birth certificates to prove the girl is over 18.",
            abuse_3: "Secret Ceremonies", abuse_3_d: "Arranging weddings late at night, during long holidays, or moving the girl to a different state for the ceremony.",
            abuse_4: "Forced Engagement", abuse_4_d: "Engaging or 'promising' a minor girl to an older man in exchange for money, debt relief, or familial ties.",
            guide_title: "Emergency Intervention Protocol",
            guide_sub: "Follow these crucial steps if you suspect a child marriage is taking place.",
            step1_title: "Call Childline Immediately", step1_desc: "Dial 1098 immediately. This is a free, 24/7 emergency phone service for children in need of aid and assistance.",
            step2_title: "Inform School Authorities", step2_desc: "If the girl is a student, confidentially alert her teachers or the school principal so they can intervene.",
            step3_title: "Contact the CMPO / Police", step3_desc: "Report the issue to the local police (112) or the designated Child Marriage Prohibition Officer (CMPO) in your district.",
            step4_title: "Get a Court Injunction", step4_desc: "The police or CMPO can immediately approach the local court to get an injunction order to legally stop the wedding.",
            guide_note: "*Look at all the steps carefully. Reporting a child marriage can be done completely anonymously.*",
            support_title: "Immediate Intervention",
            support_sub: "Official rescue and protection helplines. Available 24/7.",
            btn_112: "Childline: 1098",
            btn_1091: "Police Emergency: 112",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Call Childline (1098)",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official protection and legal portals.",
            gov_btn1: "NCPCR (Child Rights)",
            gov_btn2: "Ministry of WCD",
            footer_copy: "Informational infrastructure, not a substitute for active law enforcement. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "स्वास्थ्य और सामाजिक अधिकार",
            hero_title: "बाल विवाह: उसका भविष्य सुरक्षित करें",
            hero_desc: "18 वर्ष से पहले विवाह एक अपराध है, परंपरा नहीं। प्रत्येक लड़की को अपनी शिक्षा पूरी करने, अपना रास्ता चुनने और अपना बचपन स्वतंत्र रूप से जीने का पूर्ण अधिकार है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "बचपन बचाना",
            chart_sub: "चाइल्डलाइन को सक्रिय रिपोर्टिंग और पुलिस हस्तक्षेप के माध्यम से, हर साल हजारों अवैध बाल विवाह रोके जा रहे हैं।",
            chart_label: "रोके गए बाल विवाह (illustrative)",
            chart_y: "रोके गए विवाह",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "कानून 18 वर्ष से कम उम्र की किसी भी लड़की और 21 वर्ष से कम उम्र के किसी भी लड़के की शादी पर सख्त रोक लगाता है।",
            rights_const_title: "बाल विवाह निषेध अधिनियम, 2006",
            art_14: "सख्त सजा:", art_14_d: "नाबालिगों से शादी करने वाले वयस्कों, और शादी का आयोजन करने या उसमें शामिल होने वालों को कठोर कारावास और भारी जुर्माना का सामना करना पड़ता है।",
            art_15: "रद्द करने का अधिकार:", art_15_d: "बाल वधू को 18 वर्ष की होने के दो साल के भीतर (यानी 20 वर्ष की होने से पहले) शादी को शून्य (अमान्य) घोषित करने का अधिकार है।",
            art_21: "भरण-पोषण के अधिकार:", art_21_d: "भले ही बाल विवाह रद्द कर दिया गया हो, लड़की को पुनर्विवाह तक पति या उसके माता-पिता से भरण-पोषण (maintenance) का दावा करने का कानूनी अधिकार है।",
            rights_bns_title: "POCSO और BNS के प्रभाव",
            bns_63: "POCSO अधिनियम:", bns_63_d: "18 वर्ष से कम उम्र की लड़की के साथ कोई भी यौन संबंध, शादी के भीतर भी, POCSO अधिनियम के तहत वैधानिक बलात्कार के रूप में वर्गीकृत किया गया है।",
            bns_74: "न्यायालय का निषेधाज्ञा (Injunction):", bns_74_d: "नियोजित बाल विवाह को होने से रोकने के लिए अदालतें तत्काल रोक आदेश (निषेधाज्ञा) जारी कर सकती हैं।",
            more_rights_2_p1: "रिपोर्ट करने का कर्तव्य:", more_rights_2_p2: "संदिग्ध बाल विवाह की तुरंत रिपोर्ट करना शिक्षकों, पड़ोसियों और स्थानीय अधिकारियों का कानूनी कर्तव्य है।",
            abuse_title: "चेतावनी के संकेतों को पहचानें",
            abuse_sub: "बाल विवाह अक्सर गुप्त रूप से तय किए जाते हैं। इन संकेतों को पहचानें।",
            abuse_1: "अचानक पढ़ाई छूटना", abuse_1_d: "एक युवा लड़की का अस्पष्ट 'पारिवारिक कारणों' या 'यात्रा' के लिए अचानक अपनी शिक्षा रोक देना।",
            abuse_2: "फर्जी दस्तावेज़", abuse_2_d: "यह साबित करने के लिए कि लड़की 18 वर्ष से अधिक की है, परिवारों द्वारा फर्जी आधार कार्ड या जन्म प्रमाण पत्र बनाना।",
            abuse_3: "गुप्त समारोह", abuse_3_d: "देर रात, लंबी छुट्टियों के दौरान शादियों की व्यवस्था करना, या समारोह के लिए लड़की को दूसरे राज्य में ले जाना।",
            abuse_4: "जबरन सगाई", abuse_4_d: "पैसे, कर्ज से राहत, या पारिवारिक संबंधों के बदले एक नाबालिग लड़की की किसी बड़े आदमी से सगाई या 'वादा' करना।",
            guide_title: "आपातकालीन हस्तक्षेप प्रोटोकॉल",
            guide_sub: "यदि आपको बाल विवाह होने का संदेह है, तो इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "तुरंत चाइल्डलाइन को कॉल करें", step1_desc: "तुरंत 1098 डायल करें। यह सहायता के जरूरतमंद बच्चों के लिए एक मुफ्त, 24/7 आपातकालीन फोन सेवा है।",
            step2_title: "स्कूल अधिकारियों को सूचित करें", step2_desc: "यदि लड़की एक छात्रा है, तो गोपनीय रूप से उसके शिक्षकों या स्कूल के प्रिंसिपल को सचेत करें ताकि वे हस्तक्षेप कर सकें।",
            step3_title: "CMPO / पुलिस से संपर्क करें", step3_desc: "मुद्दे की रिपोर्ट स्थानीय पुलिस (112) या अपने जिले के नामित बाल विवाह निषेध अधिकारी (CMPO) को करें।",
            step4_title: "अदालत से निषेधाज्ञा प्राप्त करें", step4_desc: "पुलिस या CMPO कानूनी रूप से शादी को रोकने के लिए निषेधाज्ञा आदेश (stay order) प्राप्त करने के लिए तुरंत स्थानीय अदालत से संपर्क कर सकते हैं।",
            guide_note: "*सभी कदमों को ध्यान से देखें। बाल विवाह की रिपोर्टिंग पूरी तरह से गुमनाम रूप से की जा सकती है।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "आधिकारिक बचाव और सुरक्षा हेल्पलाइन। 24/7 उपलब्ध।",
            btn_112: "चाइल्डलाइन: 1098",
            btn_1091: "पुलिस आपातकालीन: 112",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "चाइल्डलाइन को कॉल करें (1098)",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी सुरक्षा और कानूनी पोर्टल तक पहुँच।",
            gov_btn1: "NCPCR (बाल अधिकार)",
            gov_btn2: "WCD मंत्रालय",
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
                    data: [4200, 4800, 5600, 6800, 8100],
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
        en: "Welcome to SafeHer. Marriage before the age of 18 for girls, and 21 for boys, is a strict criminal offense under the Prohibition of Child Marriage Act, 2006. Any adult marrying a minor, or anyone organizing the wedding, faces rigorous imprisonment. Furthermore, under the POCSO Act, any sexual relationship with a girl under 18 is classified as statutory rape, regardless of marriage. A child bride has the legal right to completely void her marriage before she turns 20. She also has the right to claim maintenance. Child marriages are often hidden—watch out for signs like a young girl suddenly dropping out of school, or families arranging secret late-night ceremonies. If you suspect a child marriage is about to happen, you must intervene. You can report it completely anonymously. Call Childline immediately at 1098. You can also alert her school teachers or call the police at 112. Authorities can get a quick court injunction to legally stop the wedding. Protect her childhood and her future.",
        hi: "सेफ हर में आपका स्वागत है। लड़कियों के लिए 18 वर्ष और लड़कों के लिए 21 वर्ष से पहले विवाह बाल विवाह निषेध अधिनियम, 2006 के तहत एक सख्त आपराधिक कृत्य है। नाबालिग से शादी करने वाले किसी भी वयस्क, या शादी का आयोजन करने वाले किसी भी व्यक्ति को कठोर कारावास का सामना करना पड़ता है। इसके अलावा, POCSO अधिनियम के तहत, 18 वर्ष से कम उम्र की लड़की के साथ कोई भी यौन संबंध वैधानिक बलात्कार माना जाता है, चाहे शादी हुई हो या नहीं। एक बाल वधू को 20 वर्ष की होने से पहले अपनी शादी को पूरी तरह से रद्द करने का कानूनी अधिकार है। उसे भरण-पोषण का दावा करने का भी अधिकार है। बाल विवाह अक्सर छिपे होते हैं—संकेतों पर ध्यान दें जैसे कि कोई युवा लड़की अचानक स्कूल छोड़ दे, या परिवार गुप्त रूप से देर रात के समारोहों की व्यवस्था कर रहे हों। यदि आपको बाल विवाह होने का संदेह है, तो आपको हस्तक्षेप करना चाहिए। आप इसे पूरी तरह से गुमनाम रूप से रिपोर्ट कर सकते हैं। तुरंत चाइल्डलाइन को 1098 पर कॉल करें। आप उसके स्कूल के शिक्षकों को भी सचेत कर सकते हैं या 112 पर पुलिस को कॉल कर सकते हैं। अधिकारी शादी को कानूनी रूप से रोकने के लिए त्वरित न्यायालय निषेधाज्ञा प्राप्त कर सकते हैं। उसके बचपन और भविष्य की रक्षा करें।"
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
