<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Workplace Harassment (POSH) | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(173, 168, 203, 0.95)), url('https://images.unsplash.com/photo-1573164713714-d95e436ab8d6?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-briefcase me-2"></i>Professional Rights & Dignity</span>
                <h1 class="hero-title" data-i18n="hero_title">Workplace Harassment: Demand Respect</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Every woman has the fundamental right to a safe, secure, and dignified working environment. The POSH Act ensures zero tolerance for sexual harassment, intimidation, or hostile behavior at the workplace.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Fostering Safe Workspaces</h2>
            <p class="section-subtitle" data-i18n="chart_sub">Corporate accountability is rising. Internal Complaints Committees (ICC) are taking strict actions as more women step forward.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding resolved POSH complaints.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The POSH Act mandates strict compliance from all employers in India.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-building-shield"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">The POSH Act, 2013</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Mandatory ICC:</strong> <span class="text-muted" data-i18n="art_14_d">Every workplace with 10 or more employees MUST have an Internal Complaints Committee headed by a woman.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Protection from Retaliation:</strong> <span class="text-muted" data-i18n="art_15_d">The law protects you from being fired, demoted, or penalized for filing a harassment complaint.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Time Limit:</strong> <span class="text-muted" data-i18n="art_21_d">You can file a written complaint within 3 months from the date of the last incident.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-scale-balanced"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Broader Legal Rights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">Article 19(1)(g):</strong> <span class="text-muted" data-i18n="bns_63_d">Your fundamental constitutional right to practice any profession in a safe environment.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">Local Complaints Committee (LCC):</strong> <span class="text-muted" data-i18n="bns_74_d">If your company has less than 10 employees, or the complaint is against the employer, you can approach the district LCC.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Criminal Action:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">You can simultaneously file an FIR with the police under BNS for outraging modesty while the ICC investigates.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Harassment isn't always physical. It can be subtle, verbal, or environmental.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-hand-paper text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Physical Contact</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Unwelcome touching, leaning over, cornering, or any physical advances without consent.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-comments-dollar text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Quid Pro Quo</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">Directly or indirectly demanding sexual favors in exchange for a job, promotion, or raise.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-users-slash text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Hostile Environment</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Sexually colored remarks, inappropriate jokes, commenting on your body, or showing pornography.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-mobile-screen text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Digital Harassment</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">Sending inappropriate emails, late-night unprofessional texts, or requesting inappropriate photos.</span>
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
            <p class="section-subtitle" data-i18n="guide_sub">Follow these crucial steps to report harassment effectively and secure your career.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=600&q=80" alt="Document Evidence">
                    <p class="flow-desc" data-i18n="step1_title">Document Everything</p>
                    <p class="text-muted small" data-i18n="step1_desc">Save emails, take screenshots of chats, and note down the exact time, date, and any witnesses to the incident.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1573164574572-cb89e39749b4?auto=format&fit=crop&w=600&q=80" alt="Firm Rejection">
                    <p class="flow-desc" data-i18n="step2_title">Firm Rejection</p>
                    <p class="text-muted small" data-i18n="step2_desc">If you feel safe doing so, tell the person clearly that their behavior is unwelcome. Send an email to establish a paper trail.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1600880292203-757bb62b4baf?auto=format&fit=crop&w=600&q=80" alt="File Complaint">
                    <p class="flow-desc" data-i18n="step3_title">Report to the ICC</p>
                    <p class="text-muted small" data-i18n="step3_desc">Submit a formal written complaint to your company's Internal Complaints Committee (ICC) within 90 days.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="Legal Action">
                    <p class="flow-desc" data-i18n="step4_title">Escalate to Authorities</p>
                    <p class="text-muted small" data-i18n="step4_desc">If the company ignores your complaint or lacks an ICC, file a report via the SHe-Box portal or go to the police.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Creating a paper trail is vital in corporate disputes.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Immediate Intervention</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Official government dispatch lines and portals.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="https://shebox.nic.in/" target="_blank" class="btn-emergency-pill">
                    <i class="fas fa-laptop me-2"></i> <span data-i18n="btn_112">SHe-Box Complaint Portal</span>
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
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Get SHe-Box Access</a>
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
                    <a href="https://shebox.nic.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">Ministry of WCD SHe-Box</a>
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
            hero_title: "Workplace Harassment: Demand Respect",
            hero_desc: "Every woman has the fundamental right to a safe, secure, and dignified working environment. The POSH Act ensures zero tolerance for sexual harassment, intimidation, or hostile behavior at the workplace.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Fostering Safe Workspaces",
            chart_sub: "Corporate accountability is rising. Internal Complaints Committees (ICC) are taking strict actions as more women step forward.",
            chart_label: "Resolved Corporate POSH Complaints (illustrative)",
            chart_y: "Cases Resolved",
            chart_note: "* Note: This graph displays illustrative data regarding resolved POSH complaints.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The POSH Act mandates strict compliance from all employers in India.",
            rights_const_title: "The POSH Act, 2013",
            art_14: "Mandatory ICC:", art_14_d: "Every workplace with 10 or more employees MUST have an Internal Complaints Committee headed by a woman.",
            art_15: "Protection from Retaliation:", art_15_d: "The law protects you from being fired, demoted, or penalized for filing a harassment complaint.",
            art_21: "Time Limit:", art_21_d: "You can file a written complaint within 3 months from the date of the last incident.",
            rights_bns_title: "Broader Legal Rights",
            bns_63: "Article 19(1)(g):", bns_63_d: "Your fundamental constitutional right to practice any profession in a safe environment.",
            bns_74: "Local Complaints Committee (LCC):", bns_74_d: "If your company has less than 10 employees, or the complaint is against the employer, you can approach the district LCC.",
            more_rights_2_p1: "Criminal Action:", more_rights_2_p2: "You can simultaneously file an FIR with the police under BNS for outraging modesty while the ICC investigates.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Harassment isn't always physical. It can be subtle, verbal, or environmental.",
            abuse_1: "Physical Contact", abuse_1_d: "Unwelcome touching, leaning over, cornering, or any physical advances without consent.",
            abuse_2: "Quid Pro Quo", abuse_2_d: "Directly or indirectly demanding sexual favors in exchange for a job, promotion, or raise.",
            abuse_3: "Hostile Environment", abuse_3_d: "Sexually colored remarks, inappropriate jokes, commenting on your body, or showing pornography.",
            abuse_4: "Digital Harassment", abuse_4_d: "Sending inappropriate emails, late-night unprofessional texts, or requesting inappropriate photos.",
            guide_title: "Corporate Action Protocol",
            guide_sub: "Follow these crucial steps to report harassment effectively and secure your career.",
            step1_title: "Document Everything", step1_desc: "Save emails, take screenshots of chats, and note down the exact time, date, and any witnesses to the incident.",
            step2_title: "Firm Rejection", step2_desc: "If you feel safe doing so, tell the person clearly that their behavior is unwelcome. Send an email to establish a paper trail.",
            step3_title: "Report to the ICC", step3_desc: "Submit a formal written complaint to your company's Internal Complaints Committee (ICC) within 90 days.",
            step4_title: "Escalate to Authorities", step4_desc: "If the company ignores your complaint or lacks an ICC, file a report via the SHe-Box portal or go to the police.",
            guide_note: "*Look at all the steps carefully. Creating a paper trail is vital in corporate disputes.*",
            support_title: "Immediate Intervention",
            support_sub: "Official government dispatch lines and portals.",
            btn_112: "SHe-Box Complaint Portal",
            btn_1091: "NCW Helpline: 7827170170",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Get SHe-Box Access",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official complaint portals.",
            gov_btn1: "Ministry of WCD SHe-Box",
            gov_btn2: "NCW Online Complaint",
            footer_copy: "Informational infrastructure, not a substitute for active legal counsel. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "व्यावसायिक अधिकार और गरिमा",
            hero_title: "कार्यस्थल पर उत्पीड़न: सम्मान की मांग करें",
            hero_desc: "हर महिला को सुरक्षित और सम्मानजनक काम के माहौल का मौलिक अधिकार है। POSH अधिनियम कार्यस्थल पर यौन उत्पीड़न, धमकी या शत्रुतापूर्ण व्यवहार के लिए शून्य सहनशीलता (zero tolerance) सुनिश्चित करता है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "सुरक्षित कार्यस्थल को बढ़ावा देना",
            chart_sub: "कॉर्पोरेट जवाबदेही बढ़ रही है। जैसे-जैसे अधिक महिलाएं आगे आ रही हैं, आंतरिक शिकायत समितियां (ICC) सख्त कार्रवाई कर रही हैं।",
            chart_label: "सुलझाए गए POSH शिकायतें (illustrative)",
            chart_y: "सुलझाए गए मामले",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "POSH अधिनियम भारत में सभी नियोक्ताओं (employers) के लिए सख्त अनुपालन अनिवार्य करता है।",
            rights_const_title: "POSH अधिनियम, 2013",
            art_14: "अनिवार्य ICC:", art_14_d: "10 या अधिक कर्मचारियों वाले प्रत्येक कार्यस्थल पर एक महिला की अध्यक्षता में आंतरिक शिकायत समिति (ICC) का होना अनिवार्य है।",
            art_15: "प्रतिशोध से सुरक्षा:", art_15_d: "यह कानून उत्पीड़न की शिकायत दर्ज करने पर आपको नौकरी से निकाले जाने या दंडित होने से बचाता है।",
            art_21: "समय सीमा:", art_21_d: "आप अंतिम घटना की तारीख से 3 महीने के भीतर लिखित शिकायत दर्ज कर सकती हैं।",
            rights_bns_title: "व्यापक कानूनी अधिकार",
            bns_63: "अनुच्छेद 19(1)(g):", bns_63_d: "सुरक्षित वातावरण में किसी भी पेशे का अभ्यास करने का आपका मौलिक संवैधानिक अधिकार।",
            bns_74: "स्थानीय शिकायत समिति (LCC):", bns_74_d: "यदि आपकी कंपनी में 10 से कम कर्मचारी हैं, या शिकायत नियोक्ता के खिलाफ है, तो आप जिला LCC से संपर्क कर सकती हैं।",
            more_rights_2_p1: "आपराधिक कार्रवाई:", more_rights_2_p2: "आप ICC की जांच के दौरान शील भंग करने के लिए BNS के तहत पुलिस में एक साथ FIR दर्ज कर सकती हैं।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "उत्पीड़न हमेशा शारीरिक नहीं होता है। यह सूक्ष्म, मौखिक या पर्यावरणीय हो सकता है।",
            abuse_1: "शारीरिक संपर्क", abuse_1_d: "बिना सहमति के छूना, झुकना, कोने में ले जाना, या कोई भी शारीरिक हरकत।",
            abuse_2: "काम के बदले यौन मांग (Quid Pro Quo)", abuse_2_d: "नौकरी, पदोन्नति या वेतन वृद्धि के बदले में प्रत्यक्ष या अप्रत्यक्ष रूप से यौन अनुग्रह की मांग करना।",
            abuse_3: "शत्रुतापूर्ण माहौल", abuse_3_d: "यौन टिप्पणी, अनुचित चुटकुले, आपके शरीर पर टिप्पणी करना, या अश्लील साहित्य दिखाना।",
            abuse_4: "डिजिटल उत्पीड़न", abuse_4_d: "अनुचित ईमेल भेजना, देर रात के संदेश भेजना, या अनुचित तस्वीरों का अनुरोध करना।",
            guide_title: "कॉर्पोरेट एक्शन प्रोटोकॉल",
            guide_sub: "उत्पीड़न की प्रभावी ढंग से रिपोर्ट करने और अपने करियर को सुरक्षित करने के लिए इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "सबूत इकट्ठा करें", step1_desc: "ईमेल सहेजें, चैट के स्क्रीनशॉट लें, और घटना के सटीक समय, तारीख और किसी भी गवाह को नोट करें।",
            step2_title: "दृढ़ता से मना करें", step2_desc: "यदि आप सुरक्षित महसूस करती हैं, तो व्यक्ति को स्पष्ट रूप से बताएं कि उनका व्यवहार अस्वीकार्य है। रिकॉर्ड के लिए एक ईमेल भेजें।",
            step3_title: "ICC को रिपोर्ट करें", step3_desc: "90 दिनों के भीतर अपनी कंपनी की आंतरिक शिकायत समिति (ICC) में औपचारिक लिखित शिकायत दर्ज करें।",
            step4_title: "अधिकारियों तक ले जाएं", step4_desc: "यदि कंपनी आपकी शिकायत को नज़रअंदाज़ करती है या ICC नहीं है, तो SHe-Box पोर्टल के माध्यम से रिपोर्ट करें या पुलिस के पास जाएं।",
            guide_note: "*सभी कदमों को ध्यान से देखें। कॉर्पोरेट विवादों में लिखित रिकॉर्ड बनाना महत्वपूर्ण है।*",
            support_title: "तत्काल हस्तक्षेप",
            support_sub: "आधिकारिक सरकारी शिकायत पोर्टल और लाइनें।",
            btn_112: "SHe-Box शिकायत पोर्टल",
            btn_1091: "NCW हेल्पलाइन: 7827170170",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "SHe-Box तक पहुँचें",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी शिकायत पोर्टल तक पहुँच।",
            gov_btn1: "WCD मंत्रालय SHe-Box",
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
            type: 'bar',
            data: {
                labels: ['2021', '2022', '2023', '2024', '2025 (Est.)'],
                datasets: [{
                    label: translations['en'].chart_label,
                    data: [350, 480, 620, 850, 1100],
                    backgroundColor: 'rgba(106, 90, 205, 0.7)',
                    borderRadius: 6,
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
        en: "Welcome to SafeHer. Every woman has the fundamental right to a safe and dignified working environment. The POSH Act of 2013 ensures zero tolerance for sexual harassment at the workplace. Any company with 10 or more employees must have an Internal Complaints Committee, headed by a woman, to address these issues. Harassment is not just physical touching. It includes demanding sexual favors for a promotion, making sexually colored remarks, or sending inappropriate digital messages. If you face harassment, first document everything—save emails and take screenshots. If you feel safe, firmly reject the behavior in writing to create a paper trail. You must submit a written complaint to your company's ICC within 90 days. The law protects you from being fired or penalized for reporting. If your company ignores you, or lacks an ICC, file a complaint on the government SHe-Box portal or go to the police. Demand the respect you deserve.",
        hi: "सेफ हर में आपका स्वागत है। हर महिला को सुरक्षित और सम्मानजनक काम के माहौल का मौलिक अधिकार है। 2013 का POSH अधिनियम कार्यस्थल पर यौन उत्पीड़न को बिल्कुल बर्दाश्त नहीं करता है। 10 या अधिक कर्मचारियों वाली किसी भी कंपनी में एक आंतरिक शिकायत समिति (ICC) होनी चाहिए, जिसकी प्रमुख एक महिला हो। उत्पीड़न केवल शारीरिक नहीं है। इसमें पदोन्नति के लिए यौन अनुग्रह मांगना, अनुचित टिप्पणी करना, या अनुचित डिजिटल संदेश भेजना शामिल है। यदि आप उत्पीड़न का सामना करती हैं, तो सबसे पहले सब कुछ दस्तावेज़ करें—ईमेल सहेजें और स्क्रीनशॉट लें। यदि आप सुरक्षित महसूस करती हैं, तो रिकॉर्ड के लिए लिखित रूप में व्यवहार को दृढ़ता से अस्वीकार करें। आपको 90 दिनों के भीतर अपनी कंपनी की ICC को लिखित शिकायत प्रस्तुत करनी होगी। कानून आपको शिकायत करने के लिए निकाले जाने या दंडित होने से बचाता है। यदि आपकी कंपनी आपको अनदेखा करती है, तो सरकारी SHe-Box पोर्टल पर शिकायत दर्ज करें या पुलिस के पास जाएं। अपना सम्मान मांगें।"
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