<?php
session_start();
include "db.php";

$alert_html = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['city'])) {
    $city = $conn->real_escape_string(trim($_POST['city']));
    $area = $conn->real_escape_string(trim($_POST['area']));
    $place = $conn->real_escape_string(trim($_POST['place_name']));

    if ($city == "" || $area == "" || $place == "") {
        $alert_html = "
        <div class='alert alert-danger border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center'>
            <i class='fas fa-exclamation-triangle fs-3 me-3 text-danger'></i>
            <div>
                <h6 class='fw-bold mb-0 text-dark'>Missing Details</h6>
                <small class='text-muted'>Please fill in all fields to add a location.</small>
            </div>
        </div>";
    } else {
        $check = $conn->query("SELECT * FROM places WHERE city='$city' AND area='$area' AND place_name='$place'");
        
        if ($check->num_rows > 0) {
            $alert_html = "
            <div class='alert alert-warning border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center' style='background-color: #fff3cd;'>
                <i class='fas fa-info-circle fs-3 me-3 text-warning'></i>
                <div>
                    <h6 class='fw-bold mb-0 text-dark'>Location Exists</h6>
                    <small class='text-muted'>This place is already registered in our database.</small>
                </div>
            </div>";
        } else {
            $conn->query("INSERT INTO places (city, area, place_name) VALUES ('$city', '$area', '$place')");
            $alert_html = "
            <div class='alert alert-success border-0 shadow-sm rounded-4 p-3 mb-4 d-flex align-items-center' style='background-color: #d1e7dd;'>
                <i class='fas fa-check-circle fs-3 me-3 text-success'></i>
                <div>
                    <h6 class='fw-bold mb-0 text-dark'>Location Added Successfully</h6>
                    <small class='text-muted'>Thank you for expanding our safety network!</small>
                </div>
            </div>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Add Location | SafeHer</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
    :root {
        --brand: #6a5acd;
        --muted-bg: #f8f9fc;
        --card-radius: 16px;
        --text-main: #2d3748;
    }

    body {
        background: var(--muted-bg);
        font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        color: var(--text-main);
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

    .card-modern {
        background: #fff;
        border: none;
        border-radius: var(--card-radius);
        box-shadow: 0 8px 30px rgba(0,0,0,0.05);
    }

    .form-control {
        background-color: #f8fafc;
        border: 1px solid #e2e8f0;
        padding: 12px 16px;
        border-radius: 10px;
        transition: all 0.3s ease;
    }
    .form-control:focus {
        background-color: #fff;
        border-color: var(--brand);
        box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.25);
    }

    .input-icon-wrapper {
        position: relative;
    }
    .input-icon-wrapper i {
        position: absolute;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        color: #a0aec0;
    }
    .input-icon-wrapper .form-control {
        padding-left: 45px;
    }

    .btn-submit {
        background: var(--brand);
        color: white;
        font-weight: 600;
        border-radius: 50px;
        padding: 12px 30px;
        transition: all 0.3s ease;
        border: none;
    }
    .btn-submit:hover {
        background: #5848ba;
        transform: translateY(-2px);
        box-shadow: 0 6px 15px rgba(106, 90, 205, 0.3);
        color: white;
    }

    .info-panel {
        background: linear-gradient(145deg, #ffffff, #f0f4f8);
        border: 1px solid #e2e8f0;
        border-radius: var(--card-radius);
    }

    .feature-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        background: rgba(106, 90, 205, 0.1);
        color: var(--brand);
        font-size: 1.2rem;
    }

    .footer-modern {
        background: #1a202c;
        color: #a0aec0;
        padding: 40px 0 20px 0;
        margin-top: 60px;
    }
    .footer-modern h5 { color: #fff; font-weight: 600; margin-bottom: 20px; }
    .footer-modern a { color: #a0aec0; text-decoration: none; transition: color 0.3s; }
    .footer-modern a:hover { color: var(--brand); }
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="index.php">
            Safe<span class="brand-accent">Her</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mobileMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mobileMenu">
            <div class="navbar-nav ms-auto d-flex flex-column flex-lg-row gap-2 align-items-lg-center mt-3 mt-lg-0 text-center">
                <a class="btn btn-glass" href="basic_info.php">Basic Information</a>
                <a class="btn btn-glass" href="add_place.php">Add Place</a>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <a class="btn btn-danger px-3" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-primary px-3" href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="container my-5 pt-3">
    <div class="row g-4 align-items-stretch">
        
        <div class="col-lg-7">
            <div class="card card-modern p-4 p-md-5 h-100">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h3 class="fw-bold mb-1">Register New Location</h3>
                        <p class="text-muted mb-0">Add a new area to the map to start tracking its safety.</p>
                    </div>
                </div>

                <?php echo $alert_html; ?>

                <form method="POST">
                    <div class="mb-4">
                        <label class="fw-bold mb-2 text-dark">City</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-city"></i>
                            <input type="text" name="city" class="form-control" placeholder="e.g. New Delhi" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold mb-2 text-dark">Area / Neighborhood</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-map"></i>
                            <input type="text" name="area" class="form-control" placeholder="e.g. Connaught Place" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="fw-bold mb-2 text-dark">Specific Place Name</label>
                        <div class="input-icon-wrapper">
                            <i class="fas fa-map-pin"></i>
                            <input type="text" name="place_name" class="form-control" placeholder="e.g. Central Metro Station" required>
                        </div>
                    </div>

                    <div class="d-flex gap-3 mt-5">
                        <button type="submit" class="btn btn-submit flex-grow-1"><i class="fas fa-plus me-2"></i>Add to Map</button>
                        <a href="index.php" class="btn btn-light rounded-pill px-4 border">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="info-panel p-4 p-md-5 h-100 d-flex flex-column justify-content-center">
                <h4 class="fw-bold mb-4">Community Impact</h4>
                <p class="text-muted mb-5">By registering a new location, you allow other women to share their experiences and read safety metrics before they travel.</p>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="feature-icon"><i class="fas fa-globe"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Expand the Network</h6>
                        <p class="small text-muted mb-0">Help us map uncharted areas so no street remains a blind spot.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start gap-3 mb-4">
                    <div class="feature-icon"><i class="fas fa-shield-alt"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Enable Protection</h6>
                        <p class="small text-muted mb-0">Once added, users can instantly rate lighting, transport, and overall safety.</p>
                    </div>
                </div>

                <div class="d-flex align-items-start gap-3">
                    <div class="feature-icon"><i class="fas fa-hands-helping"></i></div>
                    <div>
                        <h6 class="fw-bold mb-1">Empower Others</h6>
                        <p class="small text-muted mb-0">Your contribution directly helps another woman make a safer routing decision.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<footer class="footer-modern text-center mt-auto">
    <div class="container">
        <div class="text-center small">
            © <?php echo date("Y"); ?> SafeHer. Community-driven safety insights. Emergency: Dial 112.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>