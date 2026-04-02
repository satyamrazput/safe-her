<?php
session_start();
include "db.php";

$query = "
    SELECT r.comment, r.created_at, 
           p.id as place_id, p.place_name, p.city 
    FROM reviews r 
    JOIN places p ON r.place_id = p.id 
    ORDER BY p.place_name ASC, r.created_at DESC
";
$result = $conn->query($query);

$grouped_reviews = [];
$total_reviews = 0;

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pid = $row['place_id'];
        if (!isset($grouped_reviews[$pid])) {
            $grouped_reviews[$pid] = [
                'place_name' => $row['place_name'],
                'city' => $row['city'],
                'reviews' => [],
                'review_count' => 0
            ];
        }
        $grouped_reviews[$pid]['reviews'][] = [
            'comment' => $row['comment'],
            'date' => date("d M Y, h:i A", strtotime($row['created_at']))
        ];
        $grouped_reviews[$pid]['review_count']++;
        $total_reviews++;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Reviews | SafeHer</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <style>
        :root {
            --brand: #6a5acd;
            --brand-dark: #4b3ca7;
            --muted-bg: #f8f9fc;
            --card-radius: 20px;
            --text-main: #2d3748;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: var(--muted-bg);
            color: var(--text-main);
            overflow-x: hidden;
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
            text-decoration: none;
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

        .hero-section {
            background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(106, 90, 205, 0.95)), url('https://images.unsplash.com/photo-1517737282969-906063462132?auto=format&fit=crop&w=1920&q=80') no-repeat center center/cover;
            padding: 80px 0 100px 0;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 40px rgba(106, 90, 205, 0.2);
            color: white;
            position: relative;
        }

        .search-container {
            margin-top: -40px;
            position: relative;
            z-index: 10;
        }

        .search-box {
            background: #ffffff;
            border-radius: 50px;
            padding: 10px 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            border: 2px solid transparent;
            transition: 0.3s;
        }
        .search-box:focus-within {
            border-color: var(--brand);
        }

        .search-box input {
            border: none;
            outline: none;
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            color: var(--text-main);
        }
        .search-box i {
            color: #a0aec0;
            font-size: 1.2rem;
            padding: 0 10px;
        }

        .place-card {
            background: #ffffff;
            border-radius: var(--card-radius);
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            height: 100%;
            border: 1px solid #edf2f7;
            position: relative;
            display: flex;
            flex-direction: column;
        }
        .place-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(106, 90, 205, 0.15);
            border-color: #cbd5e1;
        }

        .place-img-wrapper {
            height: 200px;
            overflow: hidden;
            position: relative;
            background: #e2e8f0;
        }
        
        .place-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.7s ease;
        }
        
        .place-card:hover .place-img-wrapper img {
            transform: scale(1.1);
        }

        .place-img-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.6) 100%);
            z-index: 1;
        }

        .status-badge-container {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
        }

        .review-count-badge {
            background: rgba(106, 90, 205, 0.9);
            color: #ffffff;
            font-weight: 700;
            padding: 6px 14px;
            border-radius: 50px;
            backdrop-filter: blur(4px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            font-size: 0.85rem;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .place-city-overlay {
            position: absolute;
            bottom: 15px;
            left: 20px;
            color: white;
            z-index: 2;
            font-weight: 600;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.5);
        }

        .place-content {
            padding: 25px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .place-title {
            font-weight: 800;
            font-size: 1.3rem;
            color: var(--text-main);
            margin-bottom: 15px;
            line-height: 1.3;
        }

        .btn-view-reviews {
            background: rgba(106, 90, 205, 0.1);
            color: var(--brand);
            border: none;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-weight: 700;
            transition: all 0.3s ease;
        }
        .btn-view-reviews:hover {
            background: var(--brand);
            color: #ffffff;
        }

        .modal-content {
            border-radius: var(--card-radius);
            border: none;
            overflow: hidden;
        }
        .modal-header {
            background: linear-gradient(135deg, #f8fafc, #f1f5f9);
            border-bottom: 1px solid #e2e8f0;
            padding: 20px 25px;
        }
        .modal-body {
            background: #f8fafc;
            padding: 25px;
            max-height: 65vh;
            overflow-y: auto;
        }

        .modal-body::-webkit-scrollbar {
            width: 8px;
        }
        .modal-body::-webkit-scrollbar-track {
            background: #f1f5f9; 
        }
        .modal-body::-webkit-scrollbar-thumb {
            background: #cbd5e1; 
            border-radius: 10px;
        }
        .modal-body::-webkit-scrollbar-thumb:hover {
            background: #94a3b8; 
        }

        .review-bubble {
            background: #ffffff;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            border: 1px solid #e2e8f0;
            position: relative;
        }

        .review-text {
            color: #334155;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 12px;
        }

        .review-meta {
            display: flex;
            align-items: center;
            font-size: 0.8rem;
            color: #94a3b8;
            font-weight: 500;
            border-top: 1px solid #f1f5f9;
            padding-top: 10px;
        }
        .review-meta i {
            color: var(--brand);
            margin-right: 5px;
        }

        .js-fadeIn { opacity: 0; transform: translateY(30px); transition: 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .js-fadeIn.visible { opacity: 1; transform: translateY(0); }

        .footer-modern {
            background: #1a202c;
            color: #a0aec0;
            padding: 40px 0;
            margin-top: 60px;
        }

        #scrollTop {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--brand);
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            border: none;
            display: none;
            align-items: center;
            justify-content: center;
            z-index: 999;
            box-shadow: 0 5px 15px rgba(106, 90, 205, 0.3);
            transition: all 0.3s;
        }
        #scrollTop:hover { background-color: var(--brand-dark); transform: translateY(-3px); }
    </style>
</head>
<body>

<button id="scrollTop" onclick="scrollToTop()"><i class="fas fa-arrow-up"></i></button>

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
                    <a class="btn btn-danger px-4 rounded-pill fw-bold" href="logout.php">Logout</a>
                <?php else: ?>
                    <a class="btn btn-primary px-4 rounded-pill fw-bold" href="login.php" style="background: #ffffff; color: var(--brand);">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section">
    <div class="container text-center">
        <div class="js-fadeIn">
            <span class="badge-safety mb-3"><i class="fas fa-map-location-dot me-2"></i>Community Intelligence</span>
            <h1 class="hero-title">Real Experiences. Real Safety.</h1>
            <p class="lead mt-3 fw-medium fs-5 opacity-75 max-w-2xl mx-auto">Explore verified experiences shared by women. Together, we are mapping the safety of our cities, streets, and establishments.</p>
        </div>
    </div>
</div>

<div class="container search-container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 js-fadeIn">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="searchInput" placeholder="Search for a city or place name..." onkeyup="filterPlaces()">
            </div>
        </div>
    </div>
</div>

<div class="container mt-5 pt-3">
    <div class="d-flex justify-content-between align-items-center mb-4 js-fadeIn">
        <h4 class="fw-bold mb-0 text-dark">Reviewed Locations</h4>
        <span class="badge bg-primary rounded-pill px-3 py-2 bg-opacity-10 text-primary border border-primary-subtle">
            <?php echo $total_reviews; ?> Total Reviews
        </span>
    </div>

    <div class="row g-4" id="placesGrid">
        <?php if (empty($grouped_reviews)): ?>
            <div class="col-12 text-center py-5 js-fadeIn">
                <div class="p-5 bg-white rounded-4 shadow-sm border border-light">
                    <i class="fas fa-comment-slash fs-1 text-muted mb-3 opacity-50"></i>
                    <h4 class="fw-bold text-dark">No Reviews Yet</h4>
                    <p class="text-muted mb-4">Be the first to share an experience and help protect others.</p>
                    <a href="add_place.php" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: var(--brand); border: none;">Write a Review</a>
                </div>
            </div>
        <?php else: ?>
            <?php foreach ($grouped_reviews as $pid => $data): 
                $review_count = $data['review_count'];
                $city_encoded = urlencode(strtolower(trim($data['city'])));
                $dynamic_image = "https://picsum.photos/seed/{$city_encoded}/600/400";
            ?>
            <div class="col-md-6 col-lg-4 place-card-wrapper js-fadeIn">
                <div class="place-card" data-place="<?php echo strtolower(htmlspecialchars($data['place_name'])); ?>" data-city="<?php echo strtolower(htmlspecialchars($data['city'])); ?>">
                    
                    <div class="place-img-wrapper bg-dark">
                        <img src="<?php echo $dynamic_image; ?>" alt="<?php echo htmlspecialchars($data['city']); ?>" loading="lazy">
                        <div class="place-img-overlay"></div>
                        
                        <div class="status-badge-container">
                            <div class="review-count-badge">
                                <i class="fas fa-comment-alt"></i> <?php echo $review_count; ?>
                            </div>
                        </div>

                        <div class="place-city-overlay">
                            <i class="fas fa-location-dot text-danger"></i> <?php echo htmlspecialchars($data['city']); ?>
                        </div>
                    </div>

                    <div class="place-content">
                        <h3 class="place-title text-truncate" title="<?php echo htmlspecialchars($data['place_name']); ?>">
                            <?php echo htmlspecialchars($data['place_name']); ?>
                        </h3>
                        <button class="btn-view-reviews mt-auto" data-bs-toggle="modal" data-bs-target="#modalPlace<?php echo $pid; ?>">
                            <i class="fas fa-book-open me-2"></i>Read Experiences
                        </button>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php foreach ($grouped_reviews as $pid => $data): 
    $review_count = $data['review_count'];
?>
<div class="modal fade" id="modalPlace<?php echo $pid; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content shadow-lg border-0">
            <div class="modal-header d-flex flex-column align-items-start position-relative">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="badge bg-danger"><i class="fas fa-map-pin me-1"></i> <?php echo htmlspecialchars($data['city']); ?></span>
                </div>
                <h4 class="modal-title fw-bold text-dark mb-0"><?php echo htmlspecialchars($data['place_name']); ?></h4>
            </div>
            <div class="modal-body">
                <?php foreach ($data['reviews'] as $rev): ?>
                <div class="review-bubble">
                    <div class="review-text">
                        <?php echo nl2br(htmlspecialchars($rev['comment'])); ?>
                    </div>
                    <div class="review-meta">
                        <i class="fas fa-clock"></i> Reported on <?php echo $rev['date']; ?>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="modal-footer border-0 bg-white p-3 d-flex justify-content-center">
                <p class="small text-muted mb-0 fw-medium"><i class="fas fa-shield-alt text-success me-1"></i> Verified SafeHer Community Data</p>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<footer class="footer-modern text-center">
    <div class="container">
        <div class="text-center small fw-medium">
            © <?php echo date("Y"); ?> SafeHer. Empowering women through shared knowledge.
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function filterPlaces() {
        const input = document.getElementById('searchInput').value.toLowerCase();
        const cards = document.querySelectorAll('.place-card-wrapper');
        
        cards.forEach(card => {
            const innerCard = card.querySelector('.place-card');
            const place = innerCard.getAttribute('data-place');
            const city = innerCard.getAttribute('data-city');
            
            if (place.includes(input) || city.includes(input)) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
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

        window.onscroll = function() { scrollFunction(); };
        function scrollFunction() {
            const btn = document.getElementById("scrollTop");
            if (document.body.scrollTop > 400 || document.documentElement.scrollTop > 400) {
                btn.style.display = "flex";
            } else {
                btn.style.display = "none";
            }
        }
    });

    function scrollToTop() {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>

</body>
</html>