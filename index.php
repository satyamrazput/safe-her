<?php
session_start();
include "db.php"; 
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>SafeHer — Women Safety Control Center</title>

  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI:wght@400;600;700;800&display=swap" rel="stylesheet">

  <style>
    :root {
      --brand: #6a5acd;
      --brand-dark: #4b3ca7;
      --muted-bg: #f8f9fc;
      --card-radius: 16px;
      --text-main: #2d3748;
    }

    body {
      background: var(--muted-bg);
      font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      color: var(--text-main);
      overflow-x: hidden;
    }

    /* ── NAVBAR (original preserved exactly) ── */
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

    /* ── HERO (original preserved exactly) ── */
    .hero {
      background: linear-gradient(rgba(75,60,167,0.85), rgba(139,134,176,0.85)), url('img/33.jpeg') center/cover;
      color: #fff;
      padding: 180px 50px 150px 18px;
      border-bottom-left-radius: 40px;
      border-bottom-right-radius: 40px;
      box-shadow: 0 10px 40px rgba(106,90,205,0.2);
    }
    .hero-title {
      font-size: 3.5rem;
      font-weight: 800;
      line-height: 1.2;
    }
    .hero-subtitle {
      font-size: 1.2rem;
      opacity: 0.9;
      margin-bottom: 30px;
    }

    /* ── SEARCH BOX (original preserved, enhanced) ── */
    .search-box-container {
      background: rgba(255,255,255,0.98);
      backdrop-filter: blur(10px);
      border-radius: var(--card-radius);
      padding: 28px 32px;
      box-shadow: 0 20px 50px rgba(106,90,205,0.18);
      transform: translateY(-50px);
      z-index: 10;
      position: relative;
      border: 1px solid rgba(106,90,205,0.08);
    }
    .search-box-container h5 {
      font-size: 1.25rem;
      font-weight: 800;
      letter-spacing: 0.3px;
    }
    .search-box-container .input-group-lg .form-control {
      border-radius: 0;
      font-size: 1rem;
    }
    .search-box-container .input-group-text {
      border-radius: 12px 0 0 12px !important;
    }
    .search-box-container .btn {
      border-radius: 0 12px 12px 0 !important;
      font-weight: 700;
      letter-spacing: 0.3px;
    }
    #globalSearch {
      border-left: 0 !important;
    }
    #globalSearch:focus {
      box-shadow: none;
      border-color: #ced4da;
    }
    .search-tags {
      display: flex;
      gap: 8px;
      flex-wrap: wrap;
      margin-top: 14px;
    }
    .search-tag {
      font-size: 0.78rem;
      padding: 4px 12px;
      border-radius: 50px;
      background: rgba(106,90,205,0.08);
      color: var(--brand);
      font-weight: 600;
      cursor: pointer;
      border: 1px solid rgba(106,90,205,0.15);
      transition: all 0.2s;
      white-space: nowrap;
    }
    .search-tag:hover {
      background: var(--brand);
      color: #fff;
    }

    /* ── CARDS (original) ── */
    .card-modern {
      background: #fff;
      border: none;
      border-radius: var(--card-radius);
      box-shadow: 0 8px 20px rgba(0,0,0,0.04);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 100%;
    }
    .card-modern h5 { font-size: 1.7rem; font-weight: 700; }
    .card-modern ul { font-size: 1.15rem; line-height: 1.8; }
    .card-modern li strong { font-size: 1.1rem; }
    .card-modern:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 25px rgba(106,90,205,0.1);
    }

    /* ── BUTTONS (original) ── */
    .btn-emergency {
      background: #ff3b30;
      border: none;
      color: #fff;
      font-weight: 700;
      border-radius: 50px;
      padding: 12px 30px;
      box-shadow: 0 4px 15px rgba(255,59,48,0.3);
      transition: all 0.3s;
    }
    .btn-emergency:hover { background: #e6352b; transform: scale(1.05); color: #fff; }
    .btn-outline-light { border-radius: 50px; font-weight: 600; }
    .btn-warning { border-radius: 50px; font-weight: 600; }

    /* ── MAP (original) ── */
    #map {
      width: 100%;
      height: 400px;
      border-radius: var(--card-radius);
      z-index: 1;
    }

    /* ── REVIEWS SECTION (original structure, enhanced) ── */
    .review-card {
      background: #fff;
      border-left: 4px solid var(--brand);
      padding: 22px;
      border-radius: 12px;
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      height: 100%;
      transition: transform 0.25s, box-shadow 0.25s;
      position: relative;
      overflow: hidden;
    }
    .review-card::after {
      content: '\f10e';
      font-family: 'Font Awesome 6 Free';
      font-weight: 900;
      position: absolute;
      bottom: 12px;
      right: 16px;
      font-size: 2.5rem;
      color: var(--brand);
      opacity: 0.06;
    }
    .review-card:hover {
      transform: translateY(-4px);
      box-shadow: 0 12px 30px rgba(106,90,205,0.1);
    }

    /* ── PREP CARDS (original) ── */
    .prep-img {
      height: 200px;
      width: 100%;
      object-fit: cover;
      border-top-left-radius: var(--card-radius);
      border-top-right-radius: var(--card-radius);
    }

    /* ── AI CHATBOT ── */
    .ai-chat-section {
      background: linear-gradient(135deg, #f0edff 0%, #fff8ff 100%);
      border-radius: 24px;
      padding: 40px;
      margin-bottom: 3rem;
    }
    .chatbot-wrap {
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(106,90,205,0.12);
      overflow: hidden;
      border: 1px solid rgba(106,90,205,0.1);
    }
    .chat-header {
      background: linear-gradient(135deg, var(--brand-dark), var(--brand));
      padding: 16px 20px;
      display: flex;
      align-items: center;
      gap: 12px;
    }
    .chat-avatar {
      width: 40px; height: 40px;
      background: rgba(255,255,255,0.2);
      border-radius: 50%;
      display: flex; align-items: center; justify-content: center;
      font-size: 1.2rem;
    }
    .chat-header-text .name { font-weight: 700; color: #fff; font-size: 0.95rem; }
    .chat-header-text .status {
      font-size: 0.75rem; color: rgba(255,255,255,0.8);
      display: flex; align-items: center; gap: 5px;
    }
    .status-dot {
      width: 7px; height: 7px; background: #4ade80; border-radius: 50%;
      animation: blink 1.8s ease infinite;
    }
    @keyframes blink { 0%,100%{opacity:1;} 50%{opacity:0.3;} }

    .chat-messages {
      height: 320px;
      overflow-y: auto;
      padding: 18px;
      background: #fafafa;
      display: flex;
      flex-direction: column;
      gap: 12px;
    }
    .chat-messages::-webkit-scrollbar { width: 4px; }
    .chat-messages::-webkit-scrollbar-thumb { background: #e2e8f0; border-radius: 10px; }

    .chat-msg { display: flex; gap: 8px; align-items: flex-start; max-width: 90%; }
    .chat-msg.bot { align-self: flex-start; }
    .chat-msg.user { align-self: flex-end; flex-direction: row-reverse; }
    .chat-msg-avatar {
      width: 30px; height: 30px; border-radius: 50%;
      background: #ede9ff; flex-shrink: 0;
      display: flex; align-items: center; justify-content: center;
      font-size: 0.85rem; color: var(--brand);
    }
    .chat-msg.user .chat-msg-avatar { background: #e2e8f0; color: #666; }
    .chat-bubble {
      padding: 10px 14px;
      font-size: 0.88rem; line-height: 1.6;
      border-radius: 16px;
    }
    .chat-msg.bot .chat-bubble {
      background: #fff;
      color: var(--text-main);
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      border-radius: 4px 16px 16px 16px;
    }
    .chat-msg.user .chat-bubble {
      background: linear-gradient(135deg, var(--brand), var(--brand-dark));
      color: #fff;
      border-radius: 16px 4px 16px 16px;
    }
    .chat-bubble strong { display: block; margin-bottom: 3px; }
    .chat-bubble ul { margin: 6px 0 0 14px; font-size: 0.84rem; }
    .chat-bubble li { margin-bottom: 3px; }

    .chat-chips {
      padding: 10px 16px;
      display: flex; gap: 6px; flex-wrap: wrap;
      background: #fff; border-top: 1px solid #f1f5f9;
    }
    .chat-chip {
      padding: 5px 12px;
      background: rgba(106,90,205,0.08);
      color: var(--brand); border-radius: 50px;
      border: 1px solid rgba(106,90,205,0.15);
      font-size: 0.78rem; font-weight: 600;
      cursor: pointer; transition: all 0.2s; white-space: nowrap;
    }
    .chat-chip:hover { background: var(--brand); color: #fff; border-color: var(--brand); }

    .chat-input-row {
      display: flex; gap: 8px; padding: 12px 16px;
      background: #fff; border-top: 1px solid #f1f5f9;
      align-items: flex-end;
    }
    #aiChatInput {
      flex: 1; padding: 10px 14px;
      border: 2px solid #e2e8f0; border-radius: 12px;
      font-family: inherit; font-size: 0.88rem;
      resize: none; outline: none; min-height: 42px; max-height: 100px;
      transition: border-color 0.2s; line-height: 1.5;
    }
    #aiChatInput:focus { border-color: var(--brand); }
    #aiSendBtn {
      width: 42px; height: 42px; border-radius: 10px;
      background: var(--brand); border: none; color: #fff;
      cursor: pointer; font-size: 0.95rem; transition: all 0.2s;
      display: flex; align-items: center; justify-content: center;
      flex-shrink: 0;
    }
    #aiSendBtn:hover { background: var(--brand-dark); }
    #aiSendBtn:disabled { background: #e2e8f0; cursor: not-allowed; }

    .typing-dots {
      display: flex; gap: 4px; padding: 10px 14px;
      background: #fff; border-radius: 4px 16px 16px 16px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
      align-items: center;
    }
    .typing-dot {
      width: 7px; height: 7px;
      background: var(--text-main); border-radius: 50%;
      opacity: 0.4;
      animation: typingPulse 1.2s ease infinite;
    }
    .typing-dot:nth-child(2) { animation-delay: 0.2s; }
    .typing-dot:nth-child(3) { animation-delay: 0.4s; }
    @keyframes typingPulse { 0%,100%{transform:translateY(0);opacity:0.4;} 50%{transform:translateY(-5px);opacity:1;} }

    .ai-info-col h4 { font-weight: 800; font-size: 1.6rem; color: var(--text-main); }
    .ai-info-col p { color: #64748b; font-size: 0.95rem; line-height: 1.8; }
    .ai-capability { display: flex; align-items: flex-start; gap: 10px; margin-bottom: 10px; }
    .ai-capability i { color: var(--brand); margin-top: 2px; flex-shrink: 0; }
    .ai-capability span { font-size: 0.9rem; color: #64748b; line-height: 1.5; }
    .law-tag {
      display: inline-block; padding: 4px 10px;
      background: rgba(106,90,205,0.1); color: var(--brand);
      border-radius: 50px; font-size: 0.75rem; font-weight: 700;
      margin: 3px; border: 1px solid rgba(106,90,205,0.15);
    }

    /* ── RIGHTS CARDS ── */
    .rights-card {
      background: #fff;
      border-radius: 16px;
      padding: 22px;
      border-top: 4px solid var(--brand);
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      height: 100%;
      transition: transform 0.25s, box-shadow 0.25s;
    }
    .rights-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(106,90,205,0.1); }
    .rights-article {
      display: inline-block; padding: 3px 10px;
      background: linear-gradient(135deg, var(--brand), var(--brand-dark));
      color: #fff; border-radius: 6px;
      font-size: 0.72rem; font-weight: 800; letter-spacing: 0.5px;
      margin-bottom: 10px;
    }
    .rights-card h6 { font-weight: 700; font-size: 0.95rem; margin-bottom: 6px; }
    .rights-card p { font-size: 0.84rem; color: #64748b; line-height: 1.6; margin: 0; }

    /* ── LAWS CARDS ── */
    .law-card {
      background: #fff;
      border-radius: 16px;
      padding: 20px;
      border-left: 4px solid #e74c3c;
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      height: 100%;
      transition: transform 0.25s, box-shadow 0.25s;
    }
    .law-card:hover { transform: translateY(-4px); box-shadow: 0 12px 30px rgba(231,76,60,0.1); }
    .law-bns-badge {
      display: inline-block; padding: 3px 10px;
      background: #fde8e8; color: #c0392b;
      border-radius: 6px; font-size: 0.72rem; font-weight: 800;
      margin-bottom: 8px;
    }
    .law-card h6 { font-weight: 700; font-size: 0.92rem; margin-bottom: 5px; }
    .law-card p { font-size: 0.82rem; color: #64748b; line-height: 1.6; margin-bottom: 8px; }
    .punishment-badge {
      display: inline-block; padding: 3px 10px;
      background: #fde8e8; color: #c0392b;
      border-radius: 50px; font-size: 0.72rem; font-weight: 700;
    }

    /* ── FIR STEPS ── */
    .fir-step-card {
      background: #fff;
      border-radius: 16px;
      padding: 22px;
      text-align: center;
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      height: 100%;
      transition: transform 0.25s;
      position: relative;
    }
    .fir-step-card:hover { transform: translateY(-4px); }
    .fir-step-num {
      width: 56px; height: 56px; border-radius: 50%;
      background: linear-gradient(135deg, var(--brand), var(--brand-dark));
      color: #fff; display: flex; align-items: center; justify-content: center;
      font-size: 1.4rem; font-weight: 800; margin: 0 auto 14px;
      box-shadow: 0 6px 20px rgba(106,90,205,0.35);
    }
    .fir-step-card h6 { font-weight: 700; font-size: 0.95rem; margin-bottom: 6px; }
    .fir-step-card p { font-size: 0.83rem; color: #64748b; line-height: 1.6; margin: 0; }

    /* ── TIPS SCROLL ── */
    .tips-scroll {
      display: flex; gap: 16px; overflow-x: auto;
      padding-bottom: 8px; scroll-snap-type: x mandatory;
    }
    .tips-scroll::-webkit-scrollbar { height: 4px; }
    .tips-scroll::-webkit-scrollbar-thumb { background: var(--brand); border-radius: 10px; }
    .tip-item {
      min-width: 240px; background: #fff;
      border-radius: 16px; padding: 20px;
      scroll-snap-align: start;
      box-shadow: 0 4px 15px rgba(0,0,0,0.04);
      border: 1px solid rgba(106,90,205,0.08);
      transition: transform 0.2s;
    }
    .tip-item:hover { transform: translateY(-3px); }
    .tip-num {
      font-size: 2rem; font-weight: 900;
      color: rgba(106,90,205,0.15); line-height: 1; margin-bottom: 8px;
    }
    .tip-item h6 { font-weight: 700; font-size: 0.9rem; margin-bottom: 5px; }
    .tip-item p { font-size: 0.82rem; color: #64748b; line-height: 1.6; margin: 0; }

    /* ── HELPLINE STRIP ── */
    .helpline-strip {
      background: linear-gradient(135deg, var(--brand-dark), var(--brand));
      border-radius: 20px;
      padding: 28px 32px;
      margin-bottom: 3rem;
    }
    .helpline-item {
      display: flex; align-items: center; gap: 12px;
      background: rgba(255,255,255,0.12);
      border-radius: 14px; padding: 14px 18px;
      border: 1px solid rgba(255,255,255,0.15);
      transition: background 0.2s;
    }
    .helpline-item:hover { background: rgba(255,255,255,0.22); }
    .helpline-icon {
      width: 40px; height: 40px; background: rgba(255,255,255,0.2);
      border-radius: 10px; display: flex; align-items: center;
      justify-content: center; font-size: 1.1rem; flex-shrink: 0;
    }
    .helpline-num { font-size: 1.3rem; font-weight: 900; color: #fff; line-height: 1; }
    .helpline-label { font-size: 0.75rem; color: rgba(255,255,255,0.8); font-weight: 500; }

    /* ── FOOTER (original) ── */
    .footer-modern {
      background: #1a202c;
      color: #a0aec0;
      padding: 40px 0 20px 0;
    }
    .footer-modern h5 { color: #fff; font-weight: 600; margin-bottom: 20px; }
    .footer-modern a { color: #a0aec0; text-decoration: none; transition: color 0.3s; }
    .footer-modern a:hover { color: var(--brand); }

    /* ── SECTION DIVIDER ── */
    .section-label {
      font-size: 0.75rem; font-weight: 700; text-transform: uppercase;
      letter-spacing: 2px; color: var(--brand); margin-bottom: 6px;
    }
    .section-heading {
      font-size: 1.75rem; font-weight: 800; color: var(--text-main);
      margin-bottom: 6px;
    }

    /* ── FLOATING SOS ── */
    .sos-float {
      position: fixed; bottom: 28px; right: 28px; z-index: 9999;
      width: 60px; height: 60px; border-radius: 50%;
      background: linear-gradient(135deg, #e74c3c, #c0392b);
      color: #fff; border: none; cursor: pointer;
      font-weight: 800; font-size: 0.7rem; letter-spacing: 0.5px;
      box-shadow: 0 6px 25px rgba(231,76,60,0.45);
      animation: sosPulse 2s ease infinite;
      display: flex; align-items: center; justify-content: center;
      flex-direction: column; gap: 2px;
    }
    @keyframes sosPulse {
      0%,100% { box-shadow: 0 6px 25px rgba(231,76,60,0.45), 0 0 0 0 rgba(231,76,60,0.3); }
      50% { box-shadow: 0 6px 25px rgba(231,76,60,0.45), 0 0 0 14px rgba(231,76,60,0); }
    }
    .sos-float i { font-size: 1.2rem; }
  </style>
</head>
<body>

<!-- ═══════════════════════════════════════════════════════════
     NAVBAR — original preserved exactly
═══════════════════════════════════════════════════════════ -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
  <div class="container">
    <a class="navbar-brand brand-text" href="index.php">
      Safe<span class="brand-accent">Her</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu"
      aria-controls="mobileMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="mobileMenu">
      <div class="navbar-nav ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0 text-center">
        <a class="btn btn-glass" href="basic_info.php">Basic Information</a>
        <a class="btn btn-glass" href="add_place.php">Add Place</a>
        <div class="dropdown">
          <button class="btn btn-glass dropdown-toggle w-100" type="button" id="womenProblemsDropdown"
            data-bs-toggle="dropdown" aria-expanded="false">
            Select an Issue
          </button>
          <ul class="dropdown-menu dropdown-menu-end shadow" style="min-width:250px;" aria-labelledby="womenProblemsDropdown">
            <li><h6 class="dropdown-header">Safety & Legal Crimes</h6></li>
            <li><a class="dropdown-item" href="domestic_violence.php">Domestic Violence & Cruelty</a></li>
            <li><a class="dropdown-item" href="sexual_assault.php">Sexual Assault & Rape</a></li>
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
            <li><a class="dropdown-item fw-bold text-danger" href="emergency_contacts.php">Emergency Helpline Numbers</a></li>
            <li><a class="dropdown-item fw-bold text-primary" href="legal_aid.php">Find Free Legal Aid</a></li>
          </ul>
        </div>
        <?php if(isset($_SESSION['user_id'])): ?>
          <a class="btn btn-danger px-3" href="logout.php">Logout</a>
        <?php else: ?>
          <a class="btn btn-primary px-3" href="login.php">Login</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<!-- ═══════════════════════════════════════════════════════════
     HERO — original preserved exactly
═══════════════════════════════════════════════════════════ -->
<section class="hero">
  <div class="container text-center">
    <h1 class="hero-title">Navigate Your World with Confidence</h1>
    <p class="hero-subtitle">Real-time safety ratings, emergency tools, and community-driven insights.</p>
    <div class="d-flex gap-3 justify-content-center flex-wrap">
      <a class="btn btn-emergency" href="tel:112"><i class="fas fa-phone-alt me-2"></i> SOS 112</a>
      <button id="shareLocationBtn" class="btn btn-outline-light btn-lg">
        <i class="fas fa-map-marker-alt me-2"></i> Share Location
      </button>
      <button id="markUnsafeBtn" class="btn btn-warning btn-lg">
        <i class="fas fa-exclamation-triangle me-2"></i> Report Unsafe
      </button>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════════════════
     SEARCH BOX — original preserved, quick tags added
═══════════════════════════════════════════════════════════ -->
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="search-box-container">
        <h5 class="fw-bold mb-1 text-center" style="color:var(--brand);">
          <i class="fas fa-shield-halved me-2"></i>Check Area Safety Reviews
        </h5>
        <p class="text-center text-muted small mb-3" style="font-size:0.85rem;">
          Search any city or area to see community safety ratings before you visit
        </p>
        <div class="input-group input-group-lg">
          <span class="input-group-text bg-white border-end-0" style="border-radius:12px 0 0 12px;">
            <i class="fas fa-search text-muted"></i>
          </span>
          <input id="globalSearch" class="form-control border-start-0"
            placeholder="Search city or area reviews..." style="font-size:1rem;">
          <button id="btnSearch" class="btn text-white px-4"
            style="background:var(--brand);border-radius:0 12px 12px 0;font-weight:700;">
            Search Reviews
          </button>
        </div>
        <div class="search-tags">
          <span class="search-tag" onclick="quickSearch('Delhi')">📍 Delhi</span>
          <span class="search-tag" onclick="quickSearch('Mumbai')">📍 Mumbai</span>
          <span class="search-tag" onclick="quickSearch('Jalandhar')">📍 Jalandhar</span>
          <span class="search-tag" onclick="quickSearch('Bengaluru')">📍 Bengaluru</span>
          <span class="search-tag" onclick="quickSearch('Lucknow')">📍 Lucknow</span>
          <span class="search-tag" onclick="quickSearch('Chandigarh')">📍 Chandigarh</span>
          <span class="search-tag" onclick="quickSearch('Hyderabad')">📍 Hyderabad</span>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     MAP + HELPLINES SIDEBAR — original structure preserved
═══════════════════════════════════════════════════════════ -->
<div class="container mb-4">
  <div class="row g-4 align-items-stretch">

    <!-- Map (original) -->
    <div class="col-xl-8">
      <div class="card card-modern p-4 d-flex flex-column h-100">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h4 class="fw-bold mb-0"><i class="fas fa-map text-primary me-2"></i> Live Safety Map</h4>
          <div class="map-controls d-flex gap-2">
            <button id="btnHospitals" class="btn btn-outline-danger btn-sm">
              <i class="fas fa-hospital me-1"></i> Hospitals
            </button>
            <button id="btnPolice" class="btn btn-outline-primary btn-sm">
              <i class="fas fa-shield-alt me-1"></i> Police Stations
            </button>
          </div>
        </div>
        <div id="map" class="flex-grow-1"></div>
        <div id="poiResults" class="mt-2 small text-muted"></div>
      </div>
    </div>

    <!-- Sidebar (original) -->
    <div class="col-xl-4 d-flex flex-column gap-4">
      <div class="card card-modern p-4">
        <h5 class="fw-bold mb-3">Quick Helplines</h5>
        <div class="d-flex flex-column gap-3">
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-danger">112</strong><small class="text-muted">All Emergencies</small></div>
            <a class="btn btn-sm btn-danger rounded-circle" href="tel:112"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-primary">1091</strong><small class="text-muted">Women Helpline</small></div>
            <a class="btn btn-sm btn-primary rounded-circle" href="tel:1091"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-primary">181</strong><small class="text-muted">Domestic Abuse</small></div>
            <a class="btn btn-sm btn-primary rounded-circle" href="tel:181"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block text-success">1930</strong><small class="text-muted">Cyber Crime</small></div>
            <a class="btn btn-sm btn-success rounded-circle" href="tel:1930"><i class="fas fa-phone"></i></a>
          </div>
          <div class="d-flex justify-content-between align-items-center p-2 rounded bg-light">
            <div><strong class="d-block" style="color:var(--brand)">15100</strong><small class="text-muted">NCW Helpline</small></div>
            <a class="btn btn-sm rounded-circle text-white" style="background:var(--brand)" href="tel:15100"><i class="fas fa-phone"></i></a>
          </div>
        </div>
      </div>

      <div class="card card-modern p-4 flex-grow-1">
        <h5 class="fw-bold mb-3">Safety Trends</h5>
        <div style="height:180px;">
          <canvas id="chartSafety"></canvas>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     LATEST COMMUNITY REVIEWS — original structure enhanced
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5 mt-2">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <div class="section-label">Community Intelligence</div>
      <h4 class="fw-bold mb-0">
        <i class="fas fa-comments text-primary me-2"></i>Latest Community Reviews
      </h4>
    </div>
    <a href="all_reviews.php" class="btn btn-outline-primary btn-sm rounded-pill px-4 py-2 fw-semibold">
      <i class="fas fa-list-ul me-1"></i> View All Reviews
    </a>
  </div>
  <div class="row g-4">
    <?php
    $latest = $conn->query("
      SELECT reviews.comment, reviews.created_at, places.place_name, places.city,
             reviews.night_safety, reviews.lighting, reviews.crowd_behavior,
             reviews.security_presence, reviews.transport_safety, reviews.hygiene
      FROM reviews JOIN places ON reviews.place_id = places.id
      ORDER BY reviews.id DESC LIMIT 3
    ");
    if($latest && $latest->num_rows > 0):
      while($row = $latest->fetch_assoc()):
        $avg = round(($row['night_safety']+$row['lighting']+$row['crowd_behavior']+
                      $row['security_presence']+$row['transport_safety']+$row['hygiene'])/6, 1);
        $scoreColor = $avg >= 4 ? '#2ecc71' : ($avg >= 3 ? '#f39c12' : '#e74c3c');
        $scoreLabel = $avg >= 4 ? 'Safe' : ($avg >= 3 ? 'Moderate' : 'Unsafe');
        $stars = str_repeat('★', round($avg)) . str_repeat('☆', 5 - round($avg));
    ?>
      <div class="col-md-4">
        <div class="review-card">
          <div class="d-flex justify-content-between align-items-start mb-2">
            <h6 class="fw-bold mb-0"><?= htmlspecialchars($row['place_name']) ?></h6>
            <small class="text-muted"><?= date("d M Y", strtotime($row['created_at'])) ?></small>
          </div>
          <div class="d-flex align-items-center gap-2 mb-3">
            <span class="text-muted small"><i class="fas fa-map-pin me-1"></i><?= htmlspecialchars($row['city']) ?></span>
            <span style="background:<?= $scoreColor ?>22;color:<?= $scoreColor ?>;padding:2px 10px;border-radius:50px;font-size:0.73rem;font-weight:700;">
              <?= $scoreLabel ?> · <?= $avg ?>/5
            </span>
          </div>
          <div style="color:#f5c842;font-size:0.85rem;margin-bottom:10px;"><?= $stars ?></div>
          <p class="mb-0 text-dark small">
            "<?= htmlspecialchars(substr($row['comment'], 0, 120)) ?>..."
          </p>
        </div>
      </div>
    <?php endwhile; else: ?>
      <div class="col-12">
        <div class="review-card text-center py-4">
          <i class="fas fa-comments fa-2x text-muted mb-3"></i>
          <p class="text-muted mb-2">No reviews yet. Be the first to review a location!</p>
          <a href="add_place.php" class="btn btn-sm btn-primary rounded-pill px-4">Add First Review</a>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     FULL EMERGENCY HELPLINE STRIP
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="helpline-strip">
    <div class="text-center mb-3">
      <span style="color:#ffd700;font-weight:800;font-size:1.1rem;">
        <i class="fas fa-phone-volume me-2"></i>Emergency Helplines — Save These Numbers
      </span>
    </div>
    <div class="row g-3">
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:112" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">🚨</div>
          <div><div class="helpline-num">112</div><div class="helpline-label">Police Emergency</div></div>
        </a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:181" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">👩</div>
          <div><div class="helpline-num">181</div><div class="helpline-label">Women Helpline</div></div>
        </a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:1091" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">🆘</div>
          <div><div class="helpline-num">1091</div><div class="helpline-label">Women in Distress</div></div>
        </a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:108" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">🏥</div>
          <div><div class="helpline-num">108</div><div class="helpline-label">Ambulance</div></div>
        </a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:15100" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">⚖️</div>
          <div><div class="helpline-num">15100</div><div class="helpline-label">NCW Helpline</div></div>
        </a>
      </div>
      <div class="col-6 col-md-4 col-lg-2">
        <a href="tel:1930" class="helpline-item text-decoration-none d-flex">
          <div class="helpline-icon">💻</div>
          <div><div class="helpline-num">1930</div><div class="helpline-label">Cyber Crime</div></div>
        </a>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     AI LEGAL CHATBOT
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="ai-chat-section">
    <div class="row g-5 align-items-start">

      <div class="col-lg-5 ai-info-col">
        <div class="section-label">AI Legal Assistant</div>
        <h4 class="mb-3">Describe what happened — get instant legal guidance</h4>
        <p class="mb-4">Powered by advanced AI trained on Indian law. Describe your situation in English or Hindi. The AI identifies which rights were violated, applicable BNS laws, FIR process, and exactly what to do next.</p>
        <div class="ai-capability mb-1">
          <i class="fas fa-check-circle"></i>
          <span>Identifies Constitutional rights violated (Articles 14, 15, 19, 21)</span>
        </div>
        <div class="ai-capability mb-1">
          <i class="fas fa-check-circle"></i>
          <span>Lists BNS 2023 / IPC sections with exact punishments</span>
        </div>
        <div class="ai-capability mb-1">
          <i class="fas fa-check-circle"></i>
          <span>Step-by-step FIR filing guide (including Zero FIR right)</span>
        </div>
        <div class="ai-capability mb-1">
          <i class="fas fa-check-circle"></i>
          <span>POCSO, Domestic Violence Act, POSH Act guidance</span>
        </div>
        <div class="ai-capability mb-1">
          <i class="fas fa-check-circle"></i>
          <span>NCW, legal aid contacts & NGO support</span>
        </div>
        <div class="ai-capability mb-3">
          <i class="fas fa-check-circle"></i>
          <span>Works in Hindi and English — confidential and private</span>
        </div>
        <div>
          <span class="law-tag">BNS 2023</span>
          <span class="law-tag">Article 21</span>
          <span class="law-tag">POCSO</span>
          <span class="law-tag">DV Act</span>
          <span class="law-tag">POSH Act</span>
          <span class="law-tag">Zero FIR</span>
          <span class="law-tag">Article 14 &amp; 15</span>
        </div>
      </div>

      <div class="col-lg-7">
        <div class="chatbot-wrap">
          <div class="chat-header">
            <div class="chat-avatar">🤖</div>
            <div class="chat-header-text">
              <div class="name">SafeHer Legal AI</div>
              <div class="status"><div class="status-dot"></div> Online — Ready to help you</div>
            </div>
          </div>
          <div class="chat-messages" id="chatMessages">
            <div class="chat-msg bot">
              <div class="chat-msg-avatar">🛡️</div>
              <div class="chat-bubble">
                <strong>Namaste 🙏 I'm here to help you.</strong>
                Tell me what happened — in English or Hindi. I will identify which laws apply, your rights, and exactly what you should do right now. Everything you share is private.
              </div>
            </div>
          </div>
          <div class="chat-chips" id="chatChips">
            <button class="chat-chip" onclick="useSuggestion(this)">I was harassed at work</button>
            <button class="chat-chip" onclick="useSuggestion(this)">Police refused my FIR</button>
            <button class="chat-chip" onclick="useSuggestion(this)">Domestic violence at home</button>
            <button class="chat-chip" onclick="useSuggestion(this)">Eve teasing in public</button>
            <button class="chat-chip" onclick="useSuggestion(this)">Cyberstalking / online harassment</button>
          </div>
          <div class="chat-input-row">
            <textarea id="aiChatInput" rows="1"
              placeholder="Describe your situation... (English or Hindi)"></textarea>
            <button id="aiSendBtn" onclick="sendAiMsg()">
              <i class="fas fa-paper-plane"></i>
            </button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     CONSTITUTIONAL RIGHTS
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <div class="section-label">Know Your Rights</div>
      <h4 class="fw-bold mb-0"><i class="fas fa-scale-balanced text-primary me-2"></i>Your Constitutional Shield</h4>
    </div>
  </div>
  <div class="row g-3">
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">Article 14</span>
        <h6>Right to Equality</h6>
        <p>Equal protection before the law. Gender discrimination by any authority is unconstitutional.</p>
      </div>
    </div>
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">Article 15</span>
        <h6>No Discrimination</h6>
        <p>No citizen shall be discriminated against on grounds of sex. Special provisions for women are protected.</p>
      </div>
    </div>
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">Article 19</span>
        <h6>Freedom of Movement</h6>
        <p>You have the right to move freely across India. Harassment restricting your movement is illegal.</p>
      </div>
    </div>
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">Article 21</span>
        <h6>Right to Dignity</h6>
        <p>Right to life, liberty, and dignity. Courts have held sexual harassment violates this right.</p>
      </div>
    </div>
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">At Police Station</span>
        <h6>FIR Rights</h6>
        <p>Police cannot refuse your FIR. You have the right to a female officer for statements.</p>
      </div>
    </div>
    <div class="col-md-4 col-lg-2">
      <div class="rights-card">
        <span class="rights-article">Zero FIR</span>
        <h6>File Anywhere</h6>
        <p>File an FIR at ANY police station regardless of where the crime occurred. This cannot be refused.</p>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     BNS LAWS
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <div class="section-label">Legal Protection</div>
      <h4 class="fw-bold mb-0"><i class="fas fa-gavel text-danger me-2"></i>Laws That Protect You (BNS 2023)</h4>
    </div>
    <a href="basic_info.php" class="btn btn-outline-danger btn-sm rounded-pill px-3 fw-semibold">View All Laws</a>
  </div>
  <div class="row g-3">
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">BNS Section 64</span>
        <h6>Rape</h6>
        <p>Sexual act without consent. Includes marital rape below 18. Expanded definition under BNS 2023.</p>
        <span class="punishment-badge">10 years — Life Imprisonment</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">BNS Section 74</span>
        <h6>Assault on Modesty</h6>
        <p>Physical contact or gesture to outrage modesty. Covers eve teasing, groping, unwanted contact.</p>
        <span class="punishment-badge">Up to 5 years + Fine</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">BNS Section 75</span>
        <h6>Sexual Harassment</h6>
        <p>Sexually coloured remarks, demands for favours. Applies in workplaces and public spaces.</p>
        <span class="punishment-badge">Up to 3 years + Fine</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">BNS Section 78</span>
        <h6>Stalking</h6>
        <p>Following a woman, contacting against her will, monitoring online activity. Repeat offence: 5 years.</p>
        <span class="punishment-badge">Up to 5 years (repeat)</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">DV Act 2005</span>
        <h6>Domestic Violence</h6>
        <p>Physical, sexual, emotional, economic abuse by household member. Protection Order within 3 days.</p>
        <span class="punishment-badge">Up to 3 years + Fine</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">POCSO Act 2012</span>
        <h6>Child Protection</h6>
        <p>Any sexual act involving a person under 18 — regardless of consent. Mandatory reporting applies.</p>
        <span class="punishment-badge">Min. 10 years — Life</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">BNS Section 77</span>
        <h6>Voyeurism</h6>
        <p>Capturing or sharing intimate images without consent. Includes washrooms, changing rooms, revenge porn.</p>
        <span class="punishment-badge">1–7 years + Fine</span>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="law-card">
        <span class="law-bns-badge">IT Act + BNS</span>
        <h6>Cybercrime</h6>
        <p>Online harassment, morphed images, sharing intimate content without consent, cyberstalking.</p>
        <span class="punishment-badge">2–7 years + Fine</span>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     FIR FILING GUIDE
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="text-center mb-4">
    <div class="section-label">Step-by-Step Guide</div>
    <h4 class="fw-bold"><i class="fas fa-file-alt text-primary me-2"></i>How to File an FIR</h4>
    <p class="text-muted" style="max-width:540px;margin:0 auto;">You have the legal right to file an FIR. Police cannot refuse. Here's exactly what to do.</p>
  </div>
  <div class="row g-3">
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">1</div>
        <h6>Go to Any Station</h6>
        <p>Zero FIR — file at ANY police station. Bring a trusted person if possible.</p>
      </div>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">2</div>
        <h6>State Facts Clearly</h6>
        <p>Describe what happened, when, where, who was involved. Request female officer for sexual offences.</p>
      </div>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">3</div>
        <h6>FIR Must Be Registered</h6>
        <p>Police are legally bound. If refused, approach SP or Magistrate under Section 173 BNSS.</p>
      </div>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">4</div>
        <h6>Get Free Copy</h6>
        <p>You are entitled to a FREE FIR copy. Note the FIR number — keep it safe.</p>
      </div>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">5</div>
        <h6>Follow Up</h6>
        <p>No action in 90 days? Approach Magistrate or call NCW at 15100 for intervention.</p>
      </div>
    </div>
    <div class="col-6 col-md-4 col-lg-2">
      <div class="fir-step-card">
        <div class="fir-step-num">e</div>
        <h6>File Online (e-FIR)</h6>
        <p>Many states allow online FIR. Search "[your state] e-FIR" or visit your state police portal.</p>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     SAFETY TIPS SCROLL
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <div class="section-label">Stay Safe</div>
      <h4 class="fw-bold mb-0"><i class="fas fa-lightbulb text-warning me-2"></i>Essential Safety Tips</h4>
    </div>
  </div>
  <div class="tips-scroll">
    <div class="tip-item">
      <div class="tip-num">01</div>
      <h6>Trust Your Instincts</h6>
      <p>If something feels wrong, leave immediately. Your gut is your first security system.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">02</div>
      <h6>Share Live Location</h6>
      <p>Use Google Maps or WhatsApp live location with a trusted contact when traveling alone at night.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">03</div>
      <h6>Know Zero FIR</h6>
      <p>File FIR at ANY police station. They cannot redirect you first to another station.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">04</div>
      <h6>Document Everything</h6>
      <p>Screenshot, photograph, note time, place, witnesses. Evidence is crucial for legal action.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">05</div>
      <h6>Save Emergency Numbers</h6>
      <p>112, 181, 1091 saved on your home screen. One tap can save your life.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">06</div>
      <h6>Travel Smart at Night</h6>
      <p>Prefer lit, populated routes. Inform someone of your route. Avoid headphones in both ears.</p>
    </div>
    <div class="tip-item">
      <div class="tip-num">07</div>
      <h6>Online Safety</h6>
      <p>Cyberstalking is a crime under BNS. Screenshot and report immediately. Helpline: 1930.</p>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     PREPAREDNESS — original preserved exactly
═══════════════════════════════════════════════════════════ -->
<div class="container mb-5">
  <div class="text-center mb-4">
    <h2 class="fw-bold">Preparedness & Well-being</h2>
    <p class="text-muted">Essential physical and mental tools for high-stress situations.</p>
  </div>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.pexels.com/photos/6608038/pexels-photo-6608038.jpeg" class="prep-img" alt="EDC Kit">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Everyday Carry (EDC)</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left:20px;">
            <li class="mb-1"><strong>Defense:</strong> Pepper spray (keep accessible, not buried in bag).</li>
            <li class="mb-1"><strong>Alert:</strong> 130dB personal alarm keychain.</li>
            <li class="mb-1"><strong>Utility:</strong> Heavy-duty tactical pen (can break glass).</li>
            <li><strong>Power:</strong> Fully charged 10,000mAh power bank and cable.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" class="prep-img" alt="Travel Safe">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Transit Security</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left:20px;">
            <li class="mb-1"><strong>Data:</strong> Always download offline Google Maps of your destination.</li>
            <li class="mb-1"><strong>Tracking:</strong> Share live ride status via WhatsApp/Maps with a trusted contact.</li>
            <li class="mb-1"><strong>Cash:</strong> Keep emergency cash (₹500–₹1000) inside your phone case or a hidden pocket.</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-modern p-0">
        <img src="https://images.pexels.com/photos/7699487/pexels-photo-7699487.jpeg" class="prep-img" alt="Mental Wellness">
        <div class="p-4">
          <h5 class="fw-bold text-primary">Crisis Psychology</h5>
          <ul class="text-muted small pl-3 mb-0" style="padding-left:20px;">
            <li class="mb-1"><strong>De-escalation:</strong> Maintain distance, do not engage verbally if avoidable.</li>
            <li class="mb-1"><strong>Adrenaline Control:</strong> Use 4-7-8 breathing (inhale 4s, hold 7s, exhale 8s) to prevent panic freezing.</li>
            <li class="mb-1"><strong>Observation:</strong> Focus on identifying marks (tattoos, shoes, license plates) rather than faces alone.</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ═══════════════════════════════════════════════════════════
     FOOTER — original preserved exactly
═══════════════════════════════════════════════════════════ -->
<footer class="footer-modern">
  <div class="container">
    <div class="row g-4">
      <div class="col-md-4">
        <h3 class="fw-bold text-white mb-2">Safe<span class="brand-accent">Her</span></h3>
        <p class="small">Empowering women through technology, awareness, and community. We build tools that make navigating the world safer and more predictable.</p>
      </div>
      <div class="col-md-4">
        <h5>Quick Links</h5>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="about.php">About Us</a></li>
          <li><a href="mailto:support@safeher.in">support@safeher.in</a></li>
          <li><a href="terms.php">Privacy Policy</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Important Gov Portals</h5>
        <ul class="list-unstyled small d-flex flex-column gap-2">
          <li><a href="https://ncw.nic.in/" target="_blank">National Commission for Women</a></li>
          <li><a href="https://cybercrime.gov.in/" target="_blank">National Cyber Crime Reporting</a></li>
          <li><a href="https://wcd.nic.in/" target="_blank">Ministry of Women & Child Development</a></li>
        </ul>
      </div>
    </div>
    <div class="text-center small mt-4">
      © <?php echo date("Y"); ?> SafeHer. All Rights Reserved. Emergency: Dial 112.
    </div>
  </div>
</footer>

<!-- Floating SOS -->
<button class="sos-float" onclick="window.location.href='tel:112'" title="Emergency SOS — Call 112">
  <i class="fas fa-phone-alt"></i>
  <span>SOS</span>
</button>

<!-- ═══════════════════════════════════════════════════════════
     SCRIPTS
═══════════════════════════════════════════════════════════ -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
/* ── PLACES FROM PHP (original) ── */
const PLACES = [
<?php
$res = $conn->query("SELECT * FROM places WHERE latitude IS NOT NULL AND longitude IS NOT NULL");
$first = true;
while($p = $res->fetch_assoc()){
  $pid = $p['id'];
  $revQ = $conn->query("SELECT * FROM reviews WHERE place_id='$pid'");
  $total = 0; $count = 0;
  while($rr = $revQ->fetch_assoc()){
    $avg = ($rr['night_safety']+$rr['lighting']+$rr['crowd_behavior']+
            $rr['security_presence']+$rr['transport_safety']+$rr['hygiene'])/6;
    $total += $avg; $count++;
  }
  $overall = ($count>0) ? round($total/$count,2) : 0;
  if(!$first) echo ",";
  $first = false;
  echo json_encode([
    'id'=>$pid, 'name'=>$p['place_name'], 'city'=>$p['city'],
    'area'=>$p['area'], 'lat'=>floatval($p['latitude']), 'lng'=>floatval($p['longitude']),
    'score'=>$overall
  ]);
}
?>
];

/* ── MAP (original logic preserved exactly) ── */
let map = L.map('map').setView([22.9734, 78.6569], 5);
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
  attribution: '© OpenStreetMap contributors'
}).addTo(map);

let markersLayer = L.layerGroup().addTo(map);
let currentLat = 22.9734;
let currentLng = 78.6569;

function renderPlaces() {
  PLACES.forEach(place => {
    let color = "#2ecc71";
    if(place.score < 3 && place.score > 0) color = "#e74c3c";
    else if(place.score >= 3 && place.score < 4) color = "#f39c12";
    L.circleMarker([place.lat, place.lng], {
      radius: 8, color: color, fillColor: color, fillOpacity: 0.8
    }).addTo(markersLayer).bindPopup(
      "<div class='text-center'><b>"+place.name+"</b><br>"+
      place.city+"<br>Safety Score: <b>"+(place.score||"N/A")+"</b>/5<br>"+
      "<a href='add_review.php?id="+place.id+"' class='btn btn-sm btn-primary mt-2'>Review Area</a></div>"
    );
  });
}
renderPlaces();

if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(pos){
    currentLat = pos.coords.latitude;
    currentLng = pos.coords.longitude;
    map.setView([currentLat, currentLng], 14);
    L.circleMarker([currentLat, currentLng], {
      radius: 10, color: '#3498db', fillColor: '#3498db', fillOpacity: 1
    }).addTo(map).bindPopup("You are here").openPopup();
  });
}

/* ── SEARCH (original logic preserved) ── */
function doSearch(city){
  if(!city) return alert("Enter city name");
  fetch("https://nominatim.openstreetmap.org/search?format=json&q="+encodeURIComponent(city+", India"))
    .then(res=>res.json())
    .then(data=>{
      if(data.length===0) return alert("City not found");
      let lat = parseFloat(data[0].lat);
      let lon = parseFloat(data[0].lon);
      map.setView([lat, lon], 12);
      window.location.href = "city_reviews.php?city="+encodeURIComponent(city);
    });
}

document.getElementById("btnSearch").addEventListener("click", function(){
  doSearch(document.getElementById("globalSearch").value.trim());
});

document.getElementById("globalSearch").addEventListener("keydown", function(e){
  if(e.key === "Enter") doSearch(this.value.trim());
});

function quickSearch(city){
  document.getElementById("globalSearch").value = city;
  doSearch(city);
}

/* ── POI (original logic preserved) ── */
function fetchPOI(query, iconType, color){
  let overpassQuery = `[out:json];(node["amenity"="${query}"](around:5000,${currentLat},${currentLng});way["amenity"="${query}"](around:5000,${currentLat},${currentLng}););out center;`;
  document.getElementById('poiResults').innerText = "Scanning area...";
  fetch("https://overpass-api.de/api/interpreter", {
    method: "POST", body: overpassQuery
  })
  .then(res=>res.json())
  .then(data=>{
    markersLayer.clearLayers();
    renderPlaces();
    let count = 0;
    data.elements.forEach(el=>{
      let lat = el.lat || el.center.lat;
      let lon = el.lon || el.center.lon;
      let name = el.tags.name || "Unknown "+query;
      let customIcon = L.divIcon({
        html:`<div style="background-color:${color};color:white;border-radius:50%;width:24px;height:24px;display:flex;align-items:center;justify-content:center;border:2px solid white;box-shadow:0 2px 5px rgba(0,0,0,0.3);"><i class="${iconType}" style="font-size:12px;"></i></div>`,
        className:'', iconSize:[24,24]
      });
      L.marker([lat,lon],{icon:customIcon}).addTo(markersLayer).bindPopup(`<b>${name}</b>`);
      count++;
    });
    document.getElementById('poiResults').innerText = `Found ${count} ${query}(s) within 5km radius.`;
  })
  .catch(()=>{
    document.getElementById('poiResults').innerText = "Could not fetch nearby locations at this time.";
  });
}

document.getElementById("btnHospitals").addEventListener("click", ()=>fetchPOI("hospital","fas fa-hospital","#e74c3c"));
document.getElementById("btnPolice").addEventListener("click", ()=>fetchPOI("police","fas fa-shield-alt","#3498db"));

/* ── SHARE LOCATION (original) ── */
document.getElementById('shareLocationBtn').addEventListener('click', ()=>{
  if(!navigator.geolocation) return alert("Geolocation not supported.");
  navigator.geolocation.getCurrentPosition((pos)=>{
    let link = "http://maps.google.com/?q="+pos.coords.latitude+","+pos.coords.longitude;
    let message = "⚠ I am sharing my live location for safety.\n\n"+link;
    window.open("https://wa.me/?text="+encodeURIComponent(message),"_blank");
  });
});

/* ── MARK UNSAFE (original) ── */
document.getElementById('markUnsafeBtn').addEventListener('click', ()=>{
  if(!navigator.geolocation) return alert("Geolocation not supported.");
  navigator.geolocation.getCurrentPosition((pos)=>{
    let review = prompt("Describe why this location is unsafe:");
    if(!review) return;
    fetch("api_mark_unsafe.php",{
      method:"POST",
      headers:{"Content-Type":"application/json"},
      body:JSON.stringify({
        latitude: pos.coords.latitude,
        longitude: pos.coords.longitude,
        review: review
      })
    }).then(res=>res.json()).then(data=>alert(data.message));
  });
});

/* ── CHART (original) ── */
const safetyCtx = document.getElementById('chartSafety').getContext('2d');
new Chart(safetyCtx, {
  type: 'line',
  data: {
    labels: ['W1','W2','W3','W4'],
    datasets: [{
      label: 'Safe', data: [12,19,15,25],
      borderColor: '#2ecc71', backgroundColor: 'rgba(46,204,113,0.2)',
      tension: 0.4, fill: true
    },{
      label: 'Unsafe', data: [8,5,10,4],
      borderColor: '#e74c3c', backgroundColor: 'rgba(231,76,60,0.2)',
      tension: 0.4, fill: true
    }]
  },
  options: {
    responsive: true, maintainAspectRatio: false,
    plugins: { legend: { position: 'top' } },
    scales: { y: { beginAtZero: true } }
  }
});

/* ═══════════════════════════════════════════════
   AI LEGAL CHATBOT
═══════════════════════════════════════════════ */
const AI_SYSTEM = `You are SafeHer Legal AI, a compassionate and expert legal assistant for women's safety in India. You are empathetic, clear, and action-oriented. Respond ONLY in the same language the user uses (Hindi or English).

When a woman describes her situation, always follow this structure:

1. IMMEDIATE SAFETY: If she is in danger right now, give emergency numbers FIRST (112, 181, 1091).
2. ACKNOWLEDGE: Validate her experience with empathy.
3. INCIDENT TYPE: Identify what happened (harassment, assault, domestic violence, stalking, cybercrime, etc.)
4. RIGHTS VIOLATED: State which Constitutional rights were violated (Article 14, 15, 19, 21, etc.)
5. APPLICABLE LAWS: List exact BNS 2023 sections / POCSO / DV Act / POSH Act that apply, with punishments.
6. WHAT TO DO NOW: Prioritized step-by-step immediate actions.
7. FIR PROCESS: How to file FIR, Zero FIR right, right to female officer, what to say.
8. SUPPORT CONTACTS: NCW (15100), NALSA (15100 legal aid), cybercrime.gov.in, relevant NGOs.
9. EMPOWERMENT: End with a clear, strong message about her rights.

Format with clear bold headers. Be warm but firm. Never victim-blame. Keep response under 400 words but comprehensive.`;

let chatHistory = [];

async function sendAiMsg(){
  const input = document.getElementById('aiChatInput');
  const msg = input.value.trim();
  if(!msg) return;

  appendMsg(msg, 'user');
  input.value = '';
  input.style.height = 'auto';
  document.getElementById('aiSendBtn').disabled = true;
  document.getElementById('chatChips').style.display = 'none';

  const typingId = showTyping();
  chatHistory.push({ role: 'user', content: msg });

  try {
    const res = await fetch('chat-proxy.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        model: 'claude-sonnet-4-20250514',
        max_tokens: 1000,
        system: AI_SYSTEM,
        messages: chatHistory
      })
    });
    const data = await res.json();
    removeTyping(typingId);
    const reply = data.content?.[0]?.text ||
      'I\'m having trouble right now. Please call:\n\n• **112** — Police Emergency\n• **181** — Women Helpline\n• **1091** — Women in Distress';
    chatHistory.push({ role: 'assistant', content: reply });
    appendMsg(reply, 'bot');
  } catch(err) {
    removeTyping(typingId);
    appendMsg('Connection issue. For immediate help please call:\n\n• **112** — Police Emergency\n• **181** — Women Helpline\n• **15100** — NCW', 'bot');
  }

  document.getElementById('aiSendBtn').disabled = false;
}

function appendMsg(text, role){
  const container = document.getElementById('chatMessages');
  const isBot = role === 'bot';
  const formatted = text
    .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
    .replace(/^[•\-] (.+)$/gm, '<li>$1</li>')
    .replace(/(<li>.*?<\/li>(\n)?)+/gs, m => '<ul>'+m+'</ul>')
    .replace(/\n/g, '<br>');

  const div = document.createElement('div');
  div.className = `chat-msg ${isBot?'bot':'user'}`;
  div.innerHTML = `
    <div class="chat-msg-avatar">${isBot?'🛡️':'👤'}</div>
    <div class="chat-bubble">${formatted}</div>
  `;
  container.appendChild(div);
  container.scrollTop = container.scrollHeight;
}

function showTyping(){
  const container = document.getElementById('chatMessages');
  const id = 'typing-'+Date.now();
  const div = document.createElement('div');
  div.id = id;
  div.className = 'chat-msg bot';
  div.innerHTML = `
    <div class="chat-msg-avatar">🛡️</div>
    <div class="typing-dots">
      <div class="typing-dot"></div>
      <div class="typing-dot"></div>
      <div class="typing-dot"></div>
    </div>
  `;
  container.appendChild(div);
  container.scrollTop = container.scrollHeight;
  return id;
}

function removeTyping(id){
  const el = document.getElementById(id);
  if(el) el.remove();
}

function useSuggestion(btn){
  document.getElementById('aiChatInput').value = btn.textContent;
  sendAiMsg();
}

document.getElementById('aiChatInput').addEventListener('input', function(){
  this.style.height = 'auto';
  this.style.height = Math.min(this.scrollHeight, 100)+'px';
});

document.getElementById('aiChatInput').addEventListener('keydown', function(e){
  if(e.key === 'Enter' && !e.shiftKey){ e.preventDefault(); sendAiMsg(); }
});
</script>
</body>
</html>