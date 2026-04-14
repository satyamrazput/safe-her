<?php
session_start();
include "db.php";

$alert_html = '';

if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['name'])){
    $name = $conn->real_escape_string(trim($_POST['name']));
    $email = $conn->real_escape_string(trim($_POST['email']));
    $password = $_POST['password'];

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    
    if($check->num_rows > 0){
        $alert_html = "
        <div class='alert alert-warning border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
            <i class='fas fa-exclamation-triangle fs-4 me-3 text-warning'></i>
            <div>
                <strong class='d-block text-dark'>Email Already Registered</strong>
                <small class='text-muted'>An account with this email already exists.</small>
            </div>
        </div>";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        $insert = $conn->query("INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')");
        
        if($insert){
            $alert_html = "
            <div class='alert alert-success border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
                <i class='fas fa-check-circle fs-4 me-3 text-success'></i>
                <div>
                    <strong class='d-block text-dark'>Account Created!</strong>
                    <small class='text-muted'>Redirecting you to login...</small>
                </div>
                <script>setTimeout(() => { window.location.href = 'login.php'; }, 2000);</script>
            </div>";
        } else {
            $alert_html = "
            <div class='alert alert-danger border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
                <i class='fas fa-shield-xmark fs-4 me-3 text-danger'></i>
                <div>
                    <strong class='d-block text-dark'>Registration Failed</strong>
                    <small class='text-muted'>Something went wrong. Please try again.</small>
                </div>
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account | SafeHer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --brand: #6a5acd;
            --brand-dark: #4b3ca7;
            --muted-bg: #f8f9fc;
            --card-radius: 24px;
            --text-main: #2d3748;
        }

        body {
            background-color: var(--muted-bg);
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            margin: 0;
            padding: 20px;
        }

        .bg-blob-1 {
            position: absolute;
            top: -10%;
            left: -10%;
            width: 500px;
            height: 500px;
            background: rgba(106, 90, 205, 0.15);
            filter: blur(100px);
            border-radius: 50%;
            z-index: 0;
            animation: float 10s ease-in-out infinite;
        }

        .bg-blob-2 {
            position: absolute;
            bottom: -10%;
            right: -10%;
            width: 400px;
            height: 400px;
            background: rgba(255, 77, 79, 0.1);
            filter: blur(80px);
            border-radius: 50%;
            z-index: 0;
            animation: float 8s ease-in-out infinite reverse;
        }

        .doodle {
            position: absolute;
            z-index: 0;
            pointer-events: none;
            opacity: 0.6;
        }

        .doodle-1 {
            top: 5%;
            right: 10%;
            animation: floatSpin 18s linear infinite;
        }

        .doodle-2 {
            bottom: 10%;
            left: 5%;
            animation: floatReverse 14s ease-in-out infinite;
        }

        .doodle-3 {
            top: 15%;
            left: 8%;
            animation: pulseFloat 10s ease-in-out infinite;
        }

        .doodle-4 {
            bottom: 8%;
            right: 15%;
            animation: floatSpinReverse 22s linear infinite;
        }
        
        .doodle-5 {
            top: 45%;
            right: 5%;
            animation: sway 12s ease-in-out infinite;
            opacity: 0.4;
        }

        .doodle-6 {
            top: 40%;
            left: 2%;
            animation: float 16s ease-in-out infinite;
            opacity: 0.5;
        }

        @keyframes float {
            0% { transform: translateY(0) scale(1); }
            50% { transform: translateY(-25px) scale(1.05); }
            100% { transform: translateY(0) scale(1); }
        }

        @keyframes floatReverse {
            0% { transform: translateY(0) translateX(0); }
            50% { transform: translateY(30px) translateX(20px); }
            100% { transform: translateY(0) translateX(0); }
        }

        @keyframes floatSpin {
            0% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-40px) rotate(180deg); }
            100% { transform: translateY(0) rotate(360deg); }
        }

        @keyframes floatSpinReverse {
            0% { transform: translateY(0) rotate(360deg); }
            50% { transform: translateY(-30px) rotate(180deg); }
            100% { transform: translateY(0) rotate(0deg); }
        }

        @keyframes pulseFloat {
            0% { transform: scale(1) translateY(0); opacity: 0.4; }
            50% { transform: scale(1.15) translateY(-20px); opacity: 0.8; }
            100% { transform: scale(1) translateY(0); opacity: 0.4; }
        }

        @keyframes sway {
            0% { transform: translateX(0) rotate(0deg); }
            50% { transform: translateX(-30px) rotate(15deg); }
            100% { transform: translateX(0) rotate(0deg); }
        }

        .login-container {
            background: #ffffff;
            width: 100%;
            max-width: 1000px;
            border-radius: var(--card-radius);
            box-shadow: 0 25px 60px rgba(0,0,0,0.08);
            z-index: 1;
            overflow: hidden;
            display: flex;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }

        @keyframes fadeInUp {
            to { opacity: 1; transform: translateY(0); }
        }

        .login-left {
            background: linear-gradient(135deg, rgba(106, 90, 205, 0.85), rgba(75, 60, 167, 0.95)), url('https://images.unsplash.com/photo-1573164574572-cb89e39749b4?auto=format&fit=crop&w=800&q=80') no-repeat center center/cover;
            padding: 3rem;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .brand-logo {
            font-size: 2.2rem;
            font-weight: 800;
            letter-spacing: 1px;
            color: #ffffff;
            text-decoration: none;
            display: inline-block;
        }
        .brand-logo span {
            color: #ffd700;
        }

        .left-content h2 {
            font-size: 2.2rem;
            font-weight: 800;
            line-height: 1.3;
            margin-bottom: 1.5rem;
        }

        .left-content p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
        }

        .quote-box {
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border-left: 4px solid #ffd700;
            padding: 1.5rem;
            border-radius: 0 12px 12px 0;
            margin-top: 2rem;
            font-style: italic;
            font-weight: 600;
        }

        .login-right {
            padding: 4rem 3rem;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-right h3 {
            font-weight: 800;
            color: var(--text-main);
            margin-bottom: 0.5rem;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 1.2rem;
        }

        .input-group-custom i {
            position: absolute;
            top: 50%;
            left: 18px;
            transform: translateY(-50%);
            color: #a0aec0;
            z-index: 10;
            transition: 0.3s;
        }

        .form-control-custom {
            width: 100%;
            padding: 14px 20px 14px 50px;
            background-color: #f8fafc;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
            color: var(--text-main);
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            outline: none;
            background-color: #ffffff;
            border-color: var(--brand);
            box-shadow: 0 0 0 4px rgba(106, 90, 205, 0.1);
        }

        .form-control-custom:focus + i,
        .input-group-custom:focus-within i {
            color: var(--brand);
        }

        .btn-primary-custom {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, var(--brand), var(--brand-dark));
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 700;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(106, 90, 205, 0.3);
            margin-top: 1rem;
        }

        .btn-primary-custom:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(106, 90, 205, 0.4);
        }

        .btn-outline-custom {
            width: 100%;
            padding: 14px;
            background: transparent;
            color: var(--text-main);
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-weight: 600;
            font-size: 1.05rem;
            transition: all 0.3s ease;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .btn-outline-custom:hover {
            background: #f8fafc;
            border-color: #cbd5e1;
            color: var(--brand);
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            color: #a0aec0;
            margin: 1.5rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        .divider span {
            padding: 0 10px;
            font-size: 0.9rem;
            font-weight: 500;
        }

        @media (max-width: 992px) {
            .login-container { flex-direction: column; }
            .login-left { padding: 3rem 2rem; }
            .login-right { padding: 3rem 2rem; }
            .left-content h2 { font-size: 1.8rem; }
            .doodle { display: none; }
        }
    </style>
</head>
<body>

    <div class="bg-blob-1"></div>
    <div class="bg-blob-2"></div>

    <svg class="doodle doodle-1" width="120" height="120" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <polygon points="50,5 95,28 95,72 50,95 5,72 5,28" stroke="#6a5acd" stroke-width="2" stroke-dasharray="6 6" fill="none"/>
        <circle cx="50" cy="50" r="15" fill="#ff4b8b" opacity="0.4"/>
    </svg>

    <svg class="doodle doodle-2" width="150" height="150" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M50 10 L10 30 L10 60 Q 50 90 50 90 Q 90 60 90 30 Z" stroke="#6a5acd" stroke-width="2.5" fill="none" stroke-opacity="0.7"/>
        <path d="M50 30 L50 70 M30 50 L70 50" stroke="#ffd700" stroke-width="2" stroke-linecap="round"/>
    </svg>

    <svg class="doodle doodle-3" width="90" height="90" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M50 10 Q 60 40 90 50 Q 60 60 50 90 Q 40 60 10 50 Q 40 40 50 10 Z" fill="#ff4b8b" opacity="0.5"/>
    </svg>

    <svg class="doodle doodle-4" width="110" height="110" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M10 50 Q 30 10 50 50 T 90 50" stroke="#ffd700" stroke-width="3" fill="none" stroke-linecap="round"/>
        <path d="M10 70 Q 30 30 50 70 T 90 70" stroke="#6a5acd" stroke-width="2" fill="none" stroke-linecap="round" stroke-opacity="0.6"/>
    </svg>

    <svg class="doodle doodle-5" width="70" height="70" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <circle cx="30" cy="30" r="8" fill="#6a5acd"/>
        <circle cx="70" cy="50" r="12" fill="#ff4b8b"/>
        <circle cx="40" cy="80" r="6" fill="#ffd700"/>
    </svg>

    <svg class="doodle doodle-6" width="140" height="140" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M20 20 L80 80 M80 20 L20 80" stroke="#6a5acd" stroke-width="1.5" stroke-dasharray="4 4"/>
        <circle cx="50" cy="50" r="30" stroke="#ffd700" stroke-width="2" fill="none"/>
    </svg>

    <div class="login-container row g-0">
        
        <div class="col-lg-5 login-left d-none d-lg-flex">
            <div>
                <a href="index.php" class="brand-logo">Safe<span>Her</span></a>
            </div>
            
            <div class="left-content">
                <h2>Join the movement.</h2>
                <p>Become part of a network of women actively protecting each other. Rate your local spaces, share safety insights, and help build a database of secure routes for everyone.</p>
                
                <div class="quote-box">
                    "Your voice has the power to guide another woman to safety."
                </div>
            </div>
            
            <div class="text-white-50 small mt-4">
                &copy; <?php echo date("Y"); ?> SafeHer. All Rights Reserved.
            </div>
        </div>

        <div class="col-lg-7 login-right">
            
            <div class="d-lg-none mb-4 text-center">
                <a href="index.php" class="brand-logo" style="color: var(--brand);">Safe<span>Her</span></a>
            </div>

            <div class="mb-4">
                <h3>Create an Account</h3>
                <p class="text-muted">Fill in your details to join the SafeHer network.</p>
            </div>

            <?php echo $alert_html; ?>

            <form method="POST" action="">
                <div class="input-group-custom">
                    <input type="text" name="name" class="form-control-custom" placeholder="Full Name" required autocomplete="name">
                    <i class="fas fa-user"></i>
                </div>

                <div class="input-group-custom">
                    <input type="email" name="email" class="form-control-custom" placeholder="Email Address" required autocomplete="email">
                    <i class="fas fa-envelope"></i>
                </div>

                <div class="input-group-custom">
                    <input type="password" name="password" class="form-control-custom" placeholder="Secure Password" required autocomplete="new-password">
                    <i class="fas fa-lock"></i>
                </div>

                <button type="submit" class="btn-primary-custom mb-3">
                    <i class="fas fa-user-plus me-2"></i> Register
                </button>
            </form>

            <div class="divider">
                <span>ALREADY HAVE AN ACCOUNT?</span>
            </div>

            <a href="login.php" class="btn-outline-custom">
                <i class="fas fa-arrow-right-to-bracket me-2"></i> Sign In to SafeHer
            </a>
            
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>