<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" id="html-tag">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inheritance & Property Rights | SafeHer</title>
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
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(173, 170, 194, 0.95)), url('https://images.unsplash.com/photo-1560520653-9e0e4c89eb11?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
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
                <span class="badge-safety mb-3" data-i18n="hero_badge"><i class="fas fa-home me-2"></i>Economic Rights & Equality</span>
                <h1 class="hero-title" data-i18n="hero_title">Inheritance & Property: Claim Your Share</h1>
                <p class="lead mt-3 fw-medium fs-5 opacity-75" data-i18n="hero_desc">Daughters and sons have equal rights to ancestral property. Denying a woman her rightful inheritance, whether as a daughter, wife, or widow, is illegal. The law secures your financial independence.</p>
                
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
            <h2 class="section-title" data-i18n="chart_title">Securing Financial Freedom</h2>
            <p class="section-subtitle" data-i18n="chart_sub">More women are challenging patriarchal norms and successfully claiming their legal rights to ancestral and marital properties through the courts.</p>
        </div>
        <div class="row">
            <div class="col-md-8 mx-auto card-modern">
                <div style="position: relative; height: 350px; width: 100%;">
                    <canvas id="dataChart"></canvas>
                </div>
                <p class="text-muted small text-center mt-4"><em data-i18n="chart_note">* Note: This graph displays illustrative data regarding property dispute resolutions in favor of women.</em></p>
            </div>
        </div>
    </div>
</section>

<section id="rights" class="js-fadeIn">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-i18n="rights_title">Know Your Legal Shield</h2>
            <p class="section-subtitle" data-i18n="rights_sub">The Indian legal system mandates absolute equality in property inheritance.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-gavel"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_const_title">Hindu Succession Act (Amended 2005)</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_14">Equal Coparcenary Rights:</strong> <span class="text-muted" data-i18n="art_14_d">Daughters have the exact same rights as sons in ancestral property, by birth.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_15">Right to Self-Acquired Property:</strong> <span class="text-muted" data-i18n="art_15_d">A daughter is a Class I heir and has an equal share in her father's self-acquired property if he dies without a will.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-check-circle text-success mt-1 me-3"></i><div><strong data-i18n="art_21">Absolute Ownership:</strong> <span class="text-muted" data-i18n="art_21_d">Any property possessed by a Hindu female is held by her as an absolute owner, not as a limited owner.</span></div></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-modern">
                    <div class="card-icon"><i class="fas fa-book"></i></div>
                    <h4 class="fw-bold mb-3" data-i18n="rights_bns_title">Other Personal Laws & Marital Rights</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_63">Muslim Personal Law:</strong> <span class="text-muted" data-i18n="bns_63_d">Women are entitled to a specific share of inherited property, and their 'Mehr' belongs solely to them.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="bns_74">Right to Residence (PWDVA):</strong> <span class="text-muted" data-i18n="bns_74_d">A wife has the right to reside in her matrimonial home, even if she does not own it.</span></div></li>
                        <li class="mb-3 d-flex"><i class="fas fa-gavel text-primary mt-1 me-3"></i><div><strong data-i18n="more_rights_2_p1">Stridhan Control:</strong> <span class="text-muted" data-i18n="more_rights_2_p2">Gifts, jewelry, or property given to a woman before, during, or after marriage are exclusively hers.</span></div></li>
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
            <p class="section-subtitle" data-i18n="abuse_sub">Property denial is often disguised as tradition. Recognize illegal practices.</p>
        </div>
        <div class="row">
            <div class="col-md-10 mx-auto card-modern">
                <div class="row g-4">
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-file-contract text-danger fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_1" class="d-block mb-1">Forced Relinquishment</strong>
                            <span class="text-muted small" data-i18n="abuse_1_d">Being emotionally blackmailed or physically forced into signing a 'NOC' or relinquishment deed giving up your share to your brothers.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-house-lock text-warning fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_2" class="d-block mb-1">Eviction from Matrimonial Home</strong>
                            <span class="text-muted small" data-i18n="abuse_2_d">In-laws or an estranged husband attempting to throw you out of the shared household without a court order.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ring text-success fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_3" class="d-block mb-1">Confiscating Stridhan</strong>
                            <span class="text-muted small" data-i18n="abuse_3_d">Husband or in-laws taking control of your jewelry, bank accounts, or gifts and refusing to return them.</span>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="p-3 bg-light rounded-3 w-100 border border-light">
                            <i class="fas fa-ban text-primary fs-4 mb-2 d-block"></i>
                            <strong data-i18n="abuse_4" class="d-block mb-1">Exclusion from Will</strong>
                            <span class="text-muted small" data-i18n="abuse_4_d">While a person can will self-acquired property, they cannot completely exclude daughters from their share of ancestral coparcenary property.</span>
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
            <h2 class="section-title" data-i18n="guide_title">Legal Action Protocol</h2>
            <p class="section-subtitle" data-i18n="guide_sub">Follow these crucial steps if you are being denied your rightful property.</p>
        </div>
        
        <div class="visual-flow-section">
            <div class="flow-grid">
                <div class="flow-item">
                    <span class="step-number">1</span>
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=600&q=80" alt="Do Not Sign">
                    <p class="flow-desc" data-i18n="step1_title">Do Not Sign Documents</p>
                    <p class="text-muted small" data-i18n="step1_desc">Refuse to sign any 'No Objection Certificates' (NOC), blank papers, or relinquishment deeds regarding family property.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">2</span>
                    <img src="https://images.unsplash.com/photo-1589829085413-56de8ae18c73?auto=format&fit=crop&w=600&q=80" alt="Gather Documents">
                    <p class="flow-desc" data-i18n="step2_title">Gather Paperwork</p>
                    <p class="text-muted small" data-i18n="step2_desc">Collect copies of property deeds, death certificates, family trees, and receipts for your Stridhan.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">3</span>
                    <img src="https://images.unsplash.com/photo-1588702547923-7093a6c3ba33?auto=format&fit=crop&w=600&q=80" alt="Send Notice">
                    <p class="flow-desc" data-i18n="step3_title">Send Legal Notice</p>
                    <p class="text-muted small" data-i18n="step3_desc">Consult a civil lawyer and send a formal legal notice to the family members claiming your rightful share or the return of Stridhan.</p>
                </div>

                <div class="flow-item">
                    <span class="step-number">4</span>
                    <img src="https://images.unsplash.com/photo-1450101499163-c8848c66ca85?auto=format&fit=crop&w=600&q=80" alt="File Suit">
                    <p class="flow-desc" data-i18n="step4_title">File a Partition Suit</p>
                    <p class="text-muted small" data-i18n="step4_desc">If the notice is ignored, file a 'Partition Suit' in the civil court to legally divide the ancestral property.</p>
                </div>
            </div>
            <p class="text-center text-slate-400 text-sm mt-10 font-medium" data-i18n="guide_note">*Look at all the steps carefully. Civil property disputes require precise legal documentation.*</p>
        </div>
    </div>
</section>

<section id="resources" class="js-fadeIn pb-0">
    <div class="container text-center">
        <div class="card-modern bg-light border border-light p-5">
            <h2 class="section-title mb-3" data-i18n="support_title">Legal Assistance</h2>
            <p class="section-subtitle lead mb-5" data-i18n="support_sub">Reach out to these authorities for free legal aid and guidance.</p>
            
            <div class="d-flex justify-content-center flex-wrap gap-4">
                <a href="https://nalsa.gov.in/" target="_blank" class="btn-emergency-pill">
                    <i class="fas fa-scale-balanced me-2"></i> <span data-i18n="btn_112">NALSA (Free Legal Aid)</span>
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
                <a href="#resources" class="btn btn-outline-light btn-sm rounded-pill px-4" data-i18n="footer_emg">Find Free Legal Aid</a>
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
                <p class="small text-muted" data-i18n="footer_gov_desc">Direct access to official legal and complaint portals.</p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <a href="https://nalsa.gov.in/" target="_blank" class="btn btn-dark btn-sm rounded-pill border-secondary text-light" data-i18n="gov_btn1">National Legal Services Authority</a>
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
            hero_badge: "Economic Rights & Equality",
            hero_title: "Inheritance & Property: Claim Your Share",
            hero_desc: "Daughters and sons have equal rights to ancestral property. Denying a woman her rightful inheritance, whether as a daughter, wife, or widow, is illegal. The law secures your financial independence.",
            btn_listen: "Listen Audio Guide",
            btn_listen_sub: "*(If you cannot read, click this button to listen)*",
            btn_listen_stop: "Stop Audio Guide",
            chart_title: "Securing Financial Freedom",
            chart_sub: "More women are challenging patriarchal norms and successfully claiming their legal rights to ancestral and marital properties through the courts.",
            chart_label: "Property Disputes Ruled in Favor of Women (illustrative)",
            chart_y: "Cases Resolved",
            chart_note: "* Note: This graph displays illustrative data regarding property dispute resolutions.",
            rights_title: "Know Your Legal Shield",
            rights_sub: "The Indian legal system mandates absolute equality in property inheritance.",
            rights_const_title: "Hindu Succession Act (Amended 2005)",
            art_14: "Equal Coparcenary Rights:", art_14_d: "Daughters have the exact same rights as sons in ancestral property, by birth.",
            art_15: "Right to Self-Acquired Property:", art_15_d: "A daughter is a Class I heir and has an equal share in her father's self-acquired property if he dies without a will.",
            art_21: "Absolute Ownership:", art_21_d: "Any property possessed by a Hindu female is held by her as an absolute owner, not as a limited owner.",
            rights_bns_title: "Other Personal Laws & Marital Rights",
            bns_63: "Muslim Personal Law:", bns_63_d: "Women are entitled to a specific share of inherited property, and their 'Mehr' belongs solely to them.",
            bns_74: "Right to Residence (PWDVA):", bns_74_d: "A wife has the right to reside in her matrimonial home, even if she does not own it.",
            more_rights_2_p1: "Stridhan Control:", more_rights_2_p2: "Gifts, jewelry, or property given to a woman before, during, or after marriage are exclusively hers.",
            abuse_title: "Identify the Violations",
            abuse_sub: "Property denial is often disguised as tradition. Recognize illegal practices.",
            abuse_1: "Forced Relinquishment", abuse_1_d: "Being emotionally blackmailed or physically forced into signing a 'NOC' or relinquishment deed giving up your share to your brothers.",
            abuse_2: "Eviction from Matrimonial Home", abuse_2_d: "In-laws or an estranged husband attempting to throw you out of the shared household without a court order.",
            abuse_3: "Confiscating Stridhan", abuse_3_d: "Husband or in-laws taking control of your jewelry, bank accounts, or gifts and refusing to return them.",
            abuse_4: "Exclusion from Will", abuse_4_d: "While a person can will self-acquired property, they cannot completely exclude daughters from their share of ancestral coparcenary property.",
            guide_title: "Legal Action Protocol",
            guide_sub: "Follow these crucial steps if you are being denied your rightful property.",
            step1_title: "Do Not Sign Documents", step1_desc: "Refuse to sign any 'No Objection Certificates' (NOC), blank papers, or relinquishment deeds regarding family property.",
            step2_title: "Gather Paperwork", step2_desc: "Collect copies of property deeds, death certificates, family trees, and receipts for your Stridhan.",
            step3_title: "Send Legal Notice", step3_desc: "Consult a civil lawyer and send a formal legal notice to the family members claiming your rightful share or the return of Stridhan.",
            step4_title: "File a Partition Suit", step4_desc: "If the notice is ignored, file a 'Partition Suit' in the civil court to legally divide the ancestral property.",
            guide_note: "*Look at all the steps carefully. Civil property disputes require precise legal documentation.*",
            support_title: "Legal Assistance",
            support_sub: "Reach out to these authorities for free legal aid and guidance.",
            btn_112: "NALSA (Free Legal Aid)",
            btn_1091: "NCW Helpline: 7827170170",
            footer_desc: "Engineering a safer society through technology, legal literacy, and immediate response infrastructure.",
            footer_emg: "Find Free Legal Aid",
            footer_links_title: "Quick Links",
            f_link1: "My Profile", f_link2: "Q & A", f_link3: "Know the Laws",
            footer_gov_title: "Official Govt Portals",
            footer_gov_desc: "Direct access to official legal and complaint portals.",
            gov_btn1: "National Legal Services Authority",
            gov_btn2: "NCW Online Complaint",
            footer_copy: "Informational infrastructure, not a substitute for active legal counsel. Dial 112 for immediate emergencies."
        },
        hi: {
            nav_profile: "मेरा प्रोफाइल",
            nav_logout: "लॉग आउट",
            nav_login: "लॉग इन",
            hero_badge: "आर्थिक अधिकार और समानता",
            hero_title: "विरासत और संपत्ति: अपना हिस्सा मांगें",
            hero_desc: "पैतृक संपत्ति में बेटियों और बेटों का समान अधिकार है। किसी महिला को बेटी, पत्नी या विधवा के रूप में उसकी वैध विरासत से वंचित करना गैरकानूनी है। कानून आपकी वित्तीय स्वतंत्रता को सुरक्षित करता है।",
            btn_listen: "ऑडियो गाइड सुनें",
            btn_listen_sub: "*(अगर आप पढ़ नहीं सकती हैं, तो यह बटन दबाकर सुनें)*",
            btn_listen_stop: "ऑडियो रोकें",
            chart_title: "वित्तीय स्वतंत्रता सुरक्षित करना",
            chart_sub: "अधिक महिलाएं पितृसत्तात्मक मानदंडों को चुनौती दे रही हैं और अदालतों के माध्यम से पैतृक और वैवाहिक संपत्तियों पर सफलतापूर्वक अपने कानूनी अधिकारों का दावा कर रही हैं।",
            chart_label: "महिलाओं के पक्ष में संपत्ति विवाद (illustrative)",
            chart_y: "सुलझाए गए मामले",
            chart_note: "* नोट: यह ग्राफ केवल Functional Demo के लिए काल्पनिक डेटा दिखाता है।",
            rights_title: "अपना कानूनी ढाल जानें",
            rights_sub: "भारतीय कानूनी व्यवस्था संपत्ति विरासत में पूर्ण समानता अनिवार्य करती है।",
            rights_const_title: "हिंदू उत्तराधिकार अधिनियम (संशोधित 2005)",
            art_14: "समान सहदायिक (Coparcenary) अधिकार:", art_14_d: "जन्म से ही पैतृक संपत्ति में बेटियों के भी बेटों के समान अधिकार हैं।",
            art_15: "स्व-अर्जित संपत्ति का अधिकार:", art_15_d: "एक बेटी प्रथम श्रेणी की उत्तराधिकारी है और यदि उसके पिता की बिना वसीयत के मृत्यु हो जाती है, तो उसकी स्व-अर्जित संपत्ति में उसका समान हिस्सा है।",
            art_21: "पूर्ण स्वामित्व:", art_21_d: "एक हिंदू महिला के पास जो भी संपत्ति है, वह एक सीमित मालिक के रूप में नहीं, बल्कि एक पूर्ण मालिक के रूप में उसकी है।",
            rights_bns_title: "अन्य व्यक्तिगत कानून और वैवाहिक अधिकार",
            bns_63: "मुस्लिम पर्सनल लॉ:", bns_63_d: "महिलाएं विरासत में मिली संपत्ति के एक विशिष्ट हिस्से की हकदार हैं, और उनका 'मेहर' पूरी तरह से उनका है।",
            bns_74: "रहने का अधिकार (PWDVA):", bns_74_d: "पत्नी को अपने वैवाहिक घर में रहने का अधिकार है, भले ही वह उसकी मालिक न हो।",
            more_rights_2_p1: "स्त्रीधन नियंत्रण:", more_rights_2_p2: "शादी से पहले, शादी के दौरान या बाद में महिला को दिए गए उपहार, गहने या संपत्ति विशेष रूप से उसकी हैं।",
            abuse_title: "उल्लंघनों को पहचानें",
            abuse_sub: "संपत्ति से इनकार अक्सर परंपरा के रूप में छिपा होता है। अवैध प्रथाओं को पहचानें।",
            abuse_1: "जबरन त्याग", abuse_1_d: "भावनात्मक रूप से ब्लैकमेल किया जाना या शारीरिक रूप से 'NOC' (अनापत्ति प्रमाण पत्र) या त्याग पत्र पर हस्ताक्षर करने के लिए मजबूर करना, जिससे आपका हिस्सा भाइयों को मिल जाए।",
            abuse_2: "वैवाहिक घर से बेदखली", abuse_2_d: "ससुराल वालों या अलग हुए पति द्वारा आपको बिना कोर्ट ऑर्डर के घर से बाहर निकालने का प्रयास करना।",
            abuse_3: "स्त्रीधन जब्त करना", abuse_3_d: "पति या ससुराल वालों द्वारा आपके गहनों, बैंक खातों या उपहारों पर नियंत्रण कर लेना और उन्हें वापस करने से इनकार करना।",
            abuse_4: "वसीयत से बाहर करना", abuse_4_d: "जबकि कोई व्यक्ति स्व-अर्जित संपत्ति की वसीयत कर सकता है, वे बेटियों को पैतृक सहदायिक संपत्ति के उनके हिस्से से पूरी तरह से बाहर नहीं कर सकते हैं।",
            guide_title: "कानूनी कार्रवाई प्रोटोकॉल",
            guide_sub: "यदि आपको आपकी वैध संपत्ति से वंचित किया जा रहा है तो इन महत्वपूर्ण कदमों का पालन करें।",
            step1_title: "दस्तावेजों पर हस्ताक्षर न करें", step1_desc: "पारिवारिक संपत्ति के संबंध में किसी भी 'NOC', कोरे कागज, या त्याग विलेख पर हस्ताक्षर करने से इनकार करें।",
            step2_title: "कागजी कार्रवाई इकट्ठा करें", step2_desc: "संपत्ति के कागजात, मृत्यु प्रमाण पत्र, वंशावली, और अपने स्त्रीधन की रसीदों की प्रतियां एकत्र करें।",
            step3_title: "कानूनी नोटिस भेजें", step3_desc: "एक सिविल वकील से सलाह लें और परिवार के सदस्यों को एक औपचारिक कानूनी नोटिस भेजकर अपने सही हिस्से या स्त्रीधन की वापसी की मांग करें।",
            step4_title: "विभाजन का मुकदमा दायर करें", step4_desc: "यदि नोटिस को नजरअंदाज किया जाता है, तो पैतृक संपत्ति को कानूनी रूप से विभाजित करने के लिए सिविल कोर्ट में 'विभाजन का मुकदमा' (Partition Suit) दायर करें।",
            guide_note: "*सभी कदमों को ध्यान से देखें। सिविल संपत्ति विवादों के लिए सटीक कानूनी दस्तावेज़ीकरण की आवश्यकता होती है।*",
            support_title: "कानूनी सहायता",
            support_sub: "मुफ्त कानूनी सहायता और मार्गदर्शन के लिए इन अधिकारियों से संपर्क करें।",
            btn_112: "NALSA (मुफ्त कानूनी सहायता)",
            btn_1091: "NCW हेल्पलाइन: 7827170170",
            footer_desc: "प्रौद्योगिकी, कानूनी साक्षरता और त्वरित प्रतिक्रिया ढांचे के माध्यम से एक सुरक्षित समाज का निर्माण।",
            footer_emg: "मुफ्त कानूनी सहायता खोजें",
            footer_links_title: "त्वरित लिंक",
            f_link1: "मेरा प्रोफाइल", f_link2: "सवाल-जवाब", f_link3: "कानून जानें",
            footer_gov_title: "आधिकारिक सरकारी पोर्टल",
            footer_gov_desc: "सीधे सरकारी कानूनी और शिकायत पोर्टल तक पहुँच।",
            gov_btn1: "राष्ट्रीय विधिक सेवा प्राधिकरण (NALSA)",
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
                    data: [180, 210, 290, 380, 450],
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
        en: "Welcome to SafeHer. Under the Indian legal system, specifically the Hindu Succession Act amended in 2005, daughters and sons have equal coparcenary rights to ancestral property by birth. It is entirely illegal for your family to force you to sign a No Objection Certificate or a relinquishment deed to give up your share to your brothers. Furthermore, you have absolute ownership over your Stridhan—any gifts or jewelry given to you before or during marriage. If your husband or in-laws confiscate your Stridhan, or if they try to evict you from your matrimonial home, they are committing a crime. If you are denied your property rights, do not sign any blank papers. Gather property deeds, death certificates, and receipts. Consult a civil lawyer through NALSA for free legal aid, and send a formal legal notice. If ignored, you have the right to file a Partition Suit in a civil court to divide the ancestral property legally. You have the right to financial independence.",
        hi: "सेफ हर में आपका स्वागत है। भारतीय कानूनी प्रणाली, विशेष रूप से 2005 में संशोधित हिंदू उत्तराधिकार अधिनियम के तहत, बेटियों और बेटों को जन्म से ही पैतृक संपत्ति में समान अधिकार प्राप्त हैं। आपके परिवार के लिए आपको अपने भाइयों को अपना हिस्सा देने के लिए एनओसी (NOC) या त्याग पत्र पर हस्ताक्षर करने के लिए मजबूर करना पूरी तरह से गैरकानूनी है। इसके अलावा, आपका अपने स्त्रीधन—शादी से पहले या उस दौरान आपको दिए गए किसी भी उपहार या गहने—पर पूर्ण स्वामित्व है। यदि आपका पति या ससुराल वाले आपका स्त्रीधन जब्त करते हैं, या वे आपको आपके वैवाहिक घर से बेदखल करने का प्रयास करते हैं, तो वे एक अपराध कर रहे हैं। यदि आपको आपके संपत्ति अधिकारों से वंचित किया जाता है, तो किसी भी कोरे कागज पर हस्ताक्षर न करें। संपत्ति के कागजात, मृत्यु प्रमाण पत्र और रसीदें इकट्ठा करें। मुफ्त कानूनी सहायता के लिए NALSA के माध्यम से एक सिविल वकील से सलाह लें, और एक औपचारिक कानूनी नोटिस भेजें। यदि इसे नज़रअंदाज़ किया जाता है, तो आपको पैतृक संपत्ति को कानूनी रूप से विभाजित करने के लिए सिविल कोर्ट में 'विभाजन का मुकदमा' (Partition Suit) दायर करने का अधिकार है। आपको वित्तीय स्वतंत्रता का अधिकार है।"
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