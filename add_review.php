<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    die("Login first.");
}

$place_id = isset($_GET['id']) ? $_GET['id'] : 0;
$success_msg = "";

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['night'])){
    $user_id = $_SESSION['user_id'];
    $night = $_POST['night'] ?: 0;
    $lighting = $_POST['lighting'] ?: 0;
    $crowd = $_POST['crowd'] ?: 0;
    $security = $_POST['security'] ?: 0;
    $transport = $_POST['transport'] ?: 0;
    $hygiene = $_POST['hygiene'] ?: 0;
    $comment = $conn->real_escape_string($_POST['comment']);

    $conn->query("INSERT INTO reviews 
    (user_id, place_id, night_safety, lighting, crowd_behavior, security_presence, transport_safety, hygiene, comment)
    VALUES
    ('$user_id', '$place_id', '$night', '$lighting', '$crowd', '$security', '$transport', '$hygiene', '$comment')");

    $success_msg = "Your review has been securely added. Thank you for protecting the community.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Contribute Safety Review | SafeHer</title>

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

    .card-modern {
        background: #fff;
        border: none;
        border-radius: var(--card-radius);
        box-shadow: 0 8px 30px rgba(0,0,0,0.05);
    }

    .guidelines-panel {
        background: linear-gradient(145deg, #ffffff, #f0f4f8);
        border: 1px solid #e2e8f0;
        border-radius: var(--card-radius);
    }

    .quote-box {
        border-left: 4px solid var(--brand);
        background: rgba(106, 90, 205, 0.05);
        padding: 20px;
        border-radius: 0 12px 12px 0;
        font-style: italic;
    }

    .rating-group {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .star {
        font-size: 1.8rem;
        color: #cbd5e1;
        cursor: pointer;
        transition: color 0.2s ease, transform 0.1s ease;
    }
    
    .star:hover {
        transform: scale(1.15);
    }

    .category-label {
        font-weight: 600;
        font-size: 1rem;
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 5px;
    }

    .category-icon {
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        background: rgba(106, 90, 205, 0.1);
        color: var(--brand);
    }

    .form-control:focus {
        border-color: var(--brand);
        box-shadow: 0 0 0 0.25rem rgba(106, 90, 205, 0.25);
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
</style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="index.php">
            Safe<span class="brand-accent">Her</span>
        </a>
    </div>
</nav>

<div class="container my-5">
    
    <?php if($success_msg): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-4 p-4 mb-4 d-flex align-items-center animate__animated animate__fadeIn">
            <i class="fas fa-check-circle fs-2 text-success me-3"></i>
            <div>
                <h5 class="alert-heading fw-bold mb-1">Impact Made</h5>
                <p class="mb-0"><?php echo $success_msg; ?></p>
            </div>
            <a href="index.php" class="btn btn-success ms-auto rounded-pill px-4">Return Home</a>
        </div>
    <?php endif; ?>

    <div class="row g-4">
        
        <div class="col-lg-7">
            <div class="card card-modern p-4 p-md-5">
                <h3 class="fw-bold mb-1">Evaluate Location Safety</h3>
                <p class="text-muted mb-4">Your detailed assessment builds a safer environment for everyone.</p>

                <form method="POST" id="reviewForm">
                    
                    <?php
                    $categories = [
                        ['name' => 'night', 'label' => 'Night Safety', 'icon' => 'fa-moon'],
                        ['name' => 'lighting', 'label' => 'Street Lighting', 'icon' => 'fa-lightbulb'],
                        ['name' => 'crowd', 'label' => 'Crowd Behavior', 'icon' => 'fa-users'],
                        ['name' => 'security', 'label' => 'Security Presence', 'icon' => 'fa-shield-halved'],
                        ['name' => 'transport', 'label' => 'Transport Safety', 'icon' => 'fa-bus'],
                        ['name' => 'hygiene', 'label' => 'Hygiene & Cleanliness', 'icon' => 'fa-broom']
                    ];

                    foreach($categories as $cat):
                    ?>
                    <div class="mb-4">
                        <div class="category-label">
                            <div class="category-icon"><i class="fas <?php echo $cat['icon']; ?>"></i></div>
                            <?php echo $cat['label']; ?>
                        </div>
                        <div class="rating-group" id="group-<?php echo $cat['name']; ?>">
                            <input type="hidden" name="<?php echo $cat['name']; ?>" id="input-<?php echo $cat['name']; ?>" value="0" required>
                            <i class="far fa-star star" data-value="1" data-target="input-<?php echo $cat['name']; ?>"></i>
                            <i class="far fa-star star" data-value="2" data-target="input-<?php echo $cat['name']; ?>"></i>
                            <i class="far fa-star star" data-value="3" data-target="input-<?php echo $cat['name']; ?>"></i>
                            <i class="far fa-star star" data-value="4" data-target="input-<?php echo $cat['name']; ?>"></i>
                            <i class="far fa-star star" data-value="5" data-target="input-<?php echo $cat['name']; ?>"></i>
                        </div>
                    </div>
                    <?php endforeach; ?>

                    <div class="mb-4 mt-5">
                        <label class="fw-bold mb-2"><i class="fas fa-pen text-primary me-2"></i>Detailed Observation</label>
                        <textarea name="comment" class="form-control bg-light border-0" rows="4" placeholder="Describe specific incidents, safe zones, or areas to avoid..." required></textarea>
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="submit" class="btn btn-submit flex-grow-1"><i class="fas fa-paper-plane me-2"></i>Publish Review</button>
                        <a href="index.php" class="btn btn-light rounded-pill px-4 border">Cancel</a>
                    </div>
                </form>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="guidelines-panel p-4 p-md-5 h-100">
                <div class="quote-box mb-5">
                    <h5 class="text-dark fw-bold mb-2">"Your voice is a compass."</h5>
                    <p class="text-muted mb-0">The review you leave today might be the exact guidance another woman needs to navigate safely tonight. Please be objective, specific, and truthful.</p>
                </div>

                <h5 class="fw-bold mb-4"><i class="fas fa-clipboard-check text-primary me-2"></i>Rating Criteria</h5>
                
                <div class="d-flex flex-column gap-4">
                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="badge bg-danger">1 Star</span>
                            <span class="fw-bold small">Severe Risk</span>
                        </div>
                        <p class="small text-muted mb-0">Area is entirely deserted, completely unlit, lacks any police presence, or has a history of harassment.</p>
                    </div>

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="badge bg-warning text-dark">3 Stars</span>
                            <span class="fw-bold small">Moderate Caution</span>
                        </div>
                        <p class="small text-muted mb-0">Average area. Partially lit, some crowd presence, but requires situational awareness, especially after dark.</p>
                    </div>

                    <div>
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <span class="badge bg-success">5 Stars</span>
                            <span class="fw-bold small">Highly Secure</span>
                        </div>
                        <p class="small text-muted mb-0">Vibrant, well-lit at all hours, active police/guard patrols, easy access to safe transport, and respectful crowds.</p>
                    </div>
                </div>

                <div class="mt-5 p-3 bg-white rounded-3 shadow-sm border border-light">
                    <p class="small text-muted mb-0"><i class="fas fa-lock text-success me-2"></i>Your review data is processed securely to generate aggregate safety scores for this area.</p>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ratingGroups = document.querySelectorAll('.rating-group');

        ratingGroups.forEach(group => {
            const stars = group.querySelectorAll('.star');
            const hiddenInput = group.querySelector('input');

            stars.forEach(star => {
                star.addEventListener('mouseover', function() {
                    let val = parseInt(this.getAttribute('data-value'));
                    updateStars(stars, val);
                });

                star.addEventListener('mouseout', function() {
                    let val = parseInt(hiddenInput.value);
                    updateStars(stars, val);
                });

                star.addEventListener('click', function() {
                    let val = parseInt(this.getAttribute('data-value'));
                    hiddenInput.value = val;
                    updateStars(stars, val);
                });
            });
        });

        function updateStars(stars, value) {
            stars.forEach(s => {
                let starVal = parseInt(s.getAttribute('data-value'));
                if(starVal <= value) {
                    s.classList.remove('far');
                    s.classList.add('fas');
                    s.style.color = '#f39c12';
                } else {
                    s.classList.remove('fas');
                    s.classList.add('far');
                    s.style.color = '#cbd5e1';
                }
            });
        }

        document.getElementById('reviewForm').addEventListener('submit', function(e) {
            let isValid = true;
            document.querySelectorAll('input[type="hidden"]').forEach(input => {
                if(input.value === "0") {
                    isValid = false;
                }
            });
            
            if(!isValid) {
                e.preventDefault();
                alert("Please select a star rating for all categories before submitting.");
            }
        });
    });
</script>

</body>
</html>