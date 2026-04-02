<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maternity & Pregnancy Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(185, 181, 209, 0.95)), url('https://images.pexels.com/photos/2100341/pexels-photo-2100341.jpeg') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-baby me-2"></i>Professional Rights & Dignity</span>
                <h1 class="hero-title" data-i18n="hero_title">Motherhood Without Penalty</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Pregnancy is not a liability. Every woman has the legal right to balance her career and motherhood safely. Understand your rights to paid leave, job security, and workplace accommodations.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Protecting Working Mothers</h2>
            <p class="section-subtitle" data-i18n="chart_sub">With stronger legislation, more women are successfully claiming their rightful benefits and returning to the workforce after childbirth.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding resolved maternity leave disputes.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The Indian legal system mandates strict protections for expecting and new mothers.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-scale-balanced"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Maternity Benefit Act, 1961 (Amended 2017)</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">26 Weeks Paid Leave:</strong> <span class="text-muted" data-i18n="art_14_d">Women are entitled to 26 weeks of paid maternity leave for their first two children (12 weeks for subsequent children).</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Creche Facility:</strong> <span class="text-muted" data-i18n="art_15_d">Establishments with 50 or more employees must provide a creche facility and allow 4 visits a day.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Work From Home:</strong> <span class="text-muted" data-i18n="art_21_d">Employers may allow women to work from home after the maternity leave period if the nature of work permits.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-shield-heart"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Job Security & Health</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">Protection from Dismissal:</strong> <span class="text-muted" data-i18n="bns_63_d">It is strictly illegal for an employer to discharge or dismiss a woman during her maternity leave.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">No Deduction of Wages:</strong> <span class="text-muted" data-i18n="bns_74_d">Employers cannot deduct wages based on lighter duties assigned during pregnancy.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Right to Light Work:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">Pregnant women can request to avoid arduous work or tasks requiring long hours of standing without wage penalty.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Pregnancy discrimination often happens covertly. Recognize the signs of an illegal workplace practice.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-file-signature text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Forced Resignation</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Being pressured or manipulated by management into resigning when you announce your pregnancy.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ban text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Denial of Paid Leave</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Refusal by the employer to grant the mandated 26 weeks of paid leave or cutting salary during that period.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-level-down-alt text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Demotion & Role Change</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Returning from maternity leave to find your job title downgraded, pay reduced, or responsibilities stripped away.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-person-falling text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Unsafe Work Conditions</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Forcing a pregnant employee to continue hazardous work or denying requests for lighter duties/nursing breaks.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Corporate Action Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Follow these steps to claim your benefits and protect your career legally.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=600&q=80" alt="Written Notice">
                    <p class="flow-desc" data-i18n="step1_title">Submit Formal Notice</p>
                    <p class="text-muted small" data-i18n="step1_desc">Provide your employer with written notice of your pregnancy and expected delivery date along with a medical certificate.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?auto=format&fit=crop&w=600&q=80" alt="Document Responses">
                    <p class="flow-desc" data-i18n="step2_title">Document Denials</p>
                    <p class="text-muted small" data-i18n="step2_desc">If HR denies your leave or suggests resignation, get it in writing. Save all emails and internal communications.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=600&q=80" alt="Internal Grievance">
                    <p class="flow-desc" data-i18n="step3_title">File Internal Grievance</p>
                    <p class="text-muted small" data-i18n="step3_desc">Escalate the issue formally to higher management or the grievance redressal committee citing the Maternity Benefit Act.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1505664177941-10f1c1f4e1f7?auto=format&fit=crop&w=600&q=80" alt="Labor Court">
                    <p class="flow-desc" data-i18n="step4_title">Approach Labour Court</p>
                    <p class="text-muted small" data-i18n="step4_desc">If dismissed or denied benefits, lodge a complaint with the Labour Inspector or file a case in the Labour Court.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Creating a paper trail is vital in corporate disputes.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Official Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Government portals for labor disputes and women's rights.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="https://samadhan.labour.gov.in/" target="_blank" class="btn-emergency-pill">
                    <i class="fas fa-balance-scale me-2"></i> <span data-i18n="btn_112">SAMADHAN (Labour Portal)</span>
                </a>
                <a href="tel:7827170170" class="btn-emergency-pill" style="background-color: var(--text-main);">
                    <i class="fas fa-phone-alt me-2"></i> <span data-i18n="btn_1091">NCW Helpline: 7827170170</span>
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
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Labour Dispute Portal</a>
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
                    <a href="https://samadhan.labour.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">Ministry of Labour (Samadhan)</a>
                    <a href="http://ncwapps.nic.in/onlinecomplaintsv2/frmInstructions.aspx" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn2">NCW Online Complaint</a>
                </div>
            </div>
        </div>
        <hr class="mt-5 border-secondary">
        <div class="text-center small">
            &copy; 2026 SafeHer. <span data-i18n="footer_copy">Informational infrastructure, not a substitute for active legal counsel. Dial 112 for immediate emergencies.</span>
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
            hero_badge: "Professional Rights & Dignity",
            hero_title: "Motherhood Without Penalty",
            hero_desc: "Pregnancy is not a liability. Every woman has the legal right to balance her career and motherhood safely. Understand your rights to paid leave, job security, and workplace accommodations.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Protecting Working Mothers",
            chart_sub: "With stronger legislation, more women are successfully claiming their rightful benefits and returning to the workforce after childbirth.",
            chart_label: "Maternity Leave Claims Resolved (illustrative)",
            chart_y: "Cases Resolved",
            chart_note: "* Note: This graph displays illustrative data regarding resolved maternity leave disputes.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian legal system mandates strict protections for expecting and new mothers.",
            rights_const_title: "Maternity Benefit Act, 1961 (Amended 2017)",
            art_14: "26 Weeks Paid Leave:", art_14_d: "Women are entitled to 26 weeks of paid maternity leave for their first two children (12 weeks for subsequent children).",
            art_15: "Creche Facility:", art_15_d: "Establishments with 50 or more employees must provide a creche facility and allow 4 visits a day.",
            art_21: "Work From Home:", art_21_d: "Employers may allow women to work from home after the maternity leave period if the nature of work permits.",
            rights_bns_title: "Job Security & Health",
            bns_63: "Protection from Dismissal:", bns_63_d: "It is strictly illegal for an employer to discharge or dismiss a woman during her maternity leave.",
            bns_74: "No Deduction of Wages:", bns_74_d: "Employers cannot deduct wages based on lighter duties assigned during pregnancy.",
            more_rights_2_p1: "Right to Light Work:", more_rights_2_p2: "Pregnant women can request to avoid arduous work or tasks requiring long hours of standing without wage penalty.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Pregnancy discrimination often happens covertly. Recognize the signs of an illegal workplace practice.",
            abuse_1: "Forced Resignation", abuse_1_d: "Being pressured or manipulated by management into resigning when you announce your pregnancy.",
            abuse_2: "Denial of Paid Leave", abuse_2_d: "Refusal by the employer to grant the mandated 26 weeks of paid leave or cutting salary during that period.",
            abuse_3: "Demotion & Role Change", abuse_3_d: "Returning from maternity leave to find your job title downgraded, pay reduced, or responsibilities stripped away.",
            abuse_4: "Unsafe Work Conditions", abuse_4_d: "Forcing a pregnant employee to continue hazardous work or denying requests for lighter duties/nursing breaks.",
            guide_title: "Corporate Action Protocol",
            guide_sub: "Follow these steps to claim your benefits and protect your career legally.",
            step1_title: "Submit Formal Notice", step1_desc: "Provide your employer with written notice of your pregnancy and expected delivery date along with a medical certificate.",
            step2_title: "Document Denials", step2_desc: "If HR denies your leave or suggests resignation, get it in writing. Save all emails and internal communications.",
            step3_title: "File Internal Grievance", step3_desc: "Escalate the issue formally to higher management or the grievance redressal committee citing the Maternity Benefit Act.",
            step4_title: "Approach Labour Court", step4_desc: "If dismissed or denied benefits, lodge a complaint with the Labour Inspector or file a case in the Labour Court.",
            guide_note: "*Look at all the steps carefully. Creating a paper trail is vital in corporate disputes.*",
            support_title: "Official Intervention",
            support_sub: "Government portals for labor disputes and women's rights.",
            btn_112: "SAMADHAN (Labour Portal)",
            btn_1091: "NCW Helpline: 7827170170",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Labour Dispute Portal",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official complaint portals.",
            gov_btn1: "Ministry of Labour (Samadhan)",
            gov_btn2: "NCW Online Complaint",
            footer_copy: "Informational infrastructure, not a substitute for active legal counsel. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "व्यावसायिक अधिकार और गरिमा",
            hero_title: "मातृत्व बिना किसी दंड के",
            hero_desc: "गर्भावस्था कोई दायित्व नहीं है। हर महिला को अपने करियर और मातृत्व को सुरक्षित रूप से संतुलित करने का कानूनी अधिकार है। सवेतन अवकाश, नौकरी की सुरक्षा और कार्यस्थल की सुविधाओं के अपने अधिकारों को समझें।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "कामकाजी माताओं की सुरक्षा",
            chart_sub: "मजबूत कानून के साथ, अधिक महिलाएं सफलतापूर्वक अपने उचित लाभों का दावा कर रही हैं और बच्चे के जन्म के बाद कार्यबल में लौट रही हैं।",
            chart_label: "सुलझाए गए मातृत्व अवकाश दावे (illustrative)",
            chart_y: "सुलझाए गए मामले",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय कानूनी प्रणाली गर्भवती और नई माताओं के लिए सख्त सुरक्षा अनिवार्य करती है।",
            rights_const_title: "मातृत्व लाभ अधिनियम, 1961 (संशोधित 2017)",
            art_14: "26 सप्ताह का सवेतन अवकाश:", art_14_d: "महिलाएं अपने पहले दो बच्चों के लिए 26 सप्ताह के सवेतन मातृत्व अवकाश की हकदार हैं (बाद के बच्चों के लिए 12 सप्ताह)।",
            art_15: "क्रेच (Crèche) सुविधा:", art_15_d: "50 या अधिक कर्मचारियों वाले प्रतिष्ठानों को क्रेच सुविधा प्रदान करनी चाहिए और दिन में 4 बार जाने की अनुमति देनी चाहिए।",
            art_21: "वर्क फ्रॉम होम:", art_21_d: "नियोक्ता मातृत्व अवकाश अवधि के बाद महिलाओं को घर से काम करने की अनुमति दे सकते हैं यदि काम की प्रकृति अनुमति देती है।",
            rights_bns_title: "नौकरी की सुरक्षा और स्वास्थ्य",
            bns_63: "बर्खास्तगी से सुरक्षा:", bns_63_d: "नियोक्ता के लिए महिला को उसके मातृत्व अवकाश के दौरान नौकरी से निकालना सख्त वर्जित और गैरकानूनी है।",
            bns_74: "वेतन में कोई कटौती नहीं:", bns_74_d: "गर्भावस्था के दौरान सौंपे गए हल्के कर्तव्यों के आधार पर नियोक्ता वेतन में कटौती नहीं कर सकते।",
            more_rights_2_p1: "हल्के काम का अधिकार:", more_rights_2_p2: "गर्भवती महिलाएं वेतन दंड के बिना कठिन काम या लंबे समय तक खड़े रहने वाले कार्यों से बचने का अनुरोध कर सकती हैं।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "गर्भावस्था के प्रति भेदभाव अक्सर छुपकर होता है। अवैध कार्यस्थल प्रथाओं के संकेतों को पहचानें।",
            abuse_1: "जबरन इस्तीफा", abuse_1_d: "जब आप अपनी गर्भावस्था की घोषणा करती हैं तो प्रबंधन द्वारा आपको इस्तीफा देने के लिए दबाव डालना या हेरफेर करना।",
            abuse_2: "सवेतन अवकाश से इनकार", abuse_2_d: "नियोक्ता द्वारा अनिवार्य 26 सप्ताह के सवेतन अवकाश को देने से इनकार करना या उस अवधि के दौरान वेतन काटना।",
            abuse_3: "पदावनति और भूमिका में बदलाव", abuse_3_d: "मातृत्व अवकाश से लौटने पर अपनी नौकरी का पद कम पाना, वेतन कम होना, या जिम्मेदारियां छीन लिया जाना।",
            abuse_4: "असुरक्षित कार्य परिस्थितियाँ", abuse_4_d: "एक गर्भवती कर्मचारी को खतरनाक काम जारी रखने के लिए मजबूर करना या हल्के कर्तव्यों/नर्सिंग ब्रेक के अनुरोधों को अस्वीकार करना।",
            guide_title: "कॉर्पोरेट एक्शन प्रोटोकॉल",
            guide_sub: "अपने लाभों का दावा करने और अपने करियर को कानूनी रूप से सुरक्षित करने के लिए इन चरणों का पालन करें।",
            step1_title: "औपचारिक सूचना दें", step1_desc: "अपने नियोक्ता को मेडिकल प्रमाण पत्र के साथ अपनी गर्भावस्था और प्रसव की अपेक्षित तिथि की लिखित सूचना दें।",
            step2_title: "इनकार का दस्तावेजीकरण करें", step2_desc: "यदि HR आपके अवकाश से इनकार करता है या इस्तीफे का सुझाव देता है, तो इसे लिखित रूप में लें। सभी ईमेल सहेजें।",
            step3_title: "आंतरिक शिकायत दर्ज करें", step3_desc: "मातृत्व लाभ अधिनियम का हवाला देते हुए उच्च प्रबंधन या शिकायत निवारण समिति को औपचारिक रूप से मामले को बढ़ाएं।",
            step4_title: "श्रम न्यायालय में जाएं", step4_desc: "यदि लाभों से वंचित किया जाता है या निकाल दिया जाता है, तो श्रम निरीक्षक से शिकायत करें या श्रम न्यायालय में मामला दर्ज करें।",
            guide_note: "*सभी कदमों को ध्यान से देखें। कॉर्पोरेट विवादों में लिखित रिकॉर्ड बनाना महत्वपूर्ण है।*",
            support_title: "आधिकारिक हस्तक्षेप",
            support_sub: "श्रम विवादों और महिलाओं के अधिकारों के लिए सरकारी पोर्टल।",
            btn_112: "समाधान (श्रम पोर्टल)",
            btn_1091: "NCW हेल्पलाइन: 7827170170",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "श्रम विवाद पोर्टल",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी शिकायत पोर्टल तक पहुँच।",
            gov_btn1: "श्रम मंत्रालय (समाधान)",
            gov_btn2: "NCW ऑनलाइन शिकायत",
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
                    data: [120, 145, 190, 260, 310],
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
        en: "Welcome to SafeHer. Every woman has the legal right to balance her career and motherhood safely. Under the Maternity Benefit Act of 1961, amended in 2017, women are entitled to 26 weeks of paid maternity leave for their first two children. Companies with 50 or more employees must also provide a crèche facility. It is strictly illegal for your employer to fire you, demote you, or cut your salary during your pregnancy or maternity leave. You also have the right to request lighter work if your duties are physically strenuous. If your company tries to force you to resign or denies your paid leave, get their refusal in writing. Save all emails. First, file an internal grievance with management. If they refuse to comply with the law, you have the right to approach the Labour Inspector or file a case in the Labour Court via the SAMADHAN portal. Do not let anyone penalize you for motherhood.",
        hi: "सेफ हर में आपका स्वागत है। हर महिला को अपने करियर और मातृत्व को सुरक्षित रूप से संतुलित करने का कानूनी अधिकार है। 1961 के मातृत्व लाभ अधिनियम के तहत, महिलाओं को अपने पहले दो बच्चों के लिए 26 सप्ताह के सवेतन मातृत्व अवकाश का अधिकार है। 50 या अधिक कर्मचारियों वाली कंपनियों को क्रेच (crèche) सुविधा भी प्रदान करनी चाहिए। आपकी गर्भावस्था या मातृत्व अवकाश के दौरान आपके नियोक्ता के लिए आपको नौकरी से निकालना, आपका पद कम करना या आपका वेतन काटना सख्त वर्जित है। यदि आपके काम में शारीरिक मेहनत लगती है तो आपको हल्का काम मांगने का भी अधिकार है। यदि आपकी कंपनी आपको इस्तीफा देने के लिए मजबूर करती है या आपके सवेतन अवकाश से इनकार करती है, तो उनका इनकार लिखित में लें। सभी ईमेल सहेजें। सबसे पहले, प्रबंधन के साथ आंतरिक शिकायत दर्ज करें। यदि वे कानून का पालन करने से इनकार करते हैं, तो आपको श्रम निरीक्षक से संपर्क करने या श्रम न्यायालय में मामला दर्ज करने का अधिकार है। मातृत्व के लिए किसी को भी आपको दंडित न करने दें।"
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