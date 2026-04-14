<?php
session_start();
include "db.php";

$city_filter = isset($_GET['city']) ? $conn->real_escape_string($_GET['city']) : '';
$where_clause = $city_filter ? "WHERE city='$city_filter'" : "";

$places_query = $conn->query("SELECT * FROM places $where_clause ORDER BY city ASC, place_name ASC");
?>
<!doctype html>
<html lang="en" id="html-tag">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Safety Reviews | SafeHer</title>

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
    background: var(--muted-bg); 
    font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; 
    color: var(--text-main);
    padding-top: 76px;
    overflow-x: hidden;
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

  .hero {
    background: linear-gradient(rgba(75, 60, 167, 0.85), rgba(106, 90, 205, 0.95)), url('https://images.unsplash.com/photo-1524492412937-b28074a5d7da?auto=format&fit=crop&w=1920&q=80') center/cover fixed;
    color: #fff;
    padding: 80px 20px 100px 20px;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
    box-shadow: 0 10px 40px rgba(106, 90, 205, 0.2);
    position: relative;
  }
  
  .card-review {
    background: #fff;
    border: 1px solid #edf2f7;
    border-radius: var(--card-radius);
    box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
    overflow: hidden;
    height: 100%;
    display: flex;
    flex-direction: column;
  }
  .card-review:hover {
    transform: translateY(-8px) scale(1.01);
    box-shadow: 0 20px 40px rgba(106, 90, 205, 0.15);
    border-color: #cbd5e1;
  }

  .place-img-container {
    position: relative;
    height: 220px;
    overflow: hidden;
    background: #e2e8f0;
  }

  .place-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: sepia(25%) contrast(1.1) brightness(0.95) saturate(1.2);
    transition: transform 0.6s ease;
  }
  .card-review:hover .place-img {
    transform: scale(1.08);
  }

  .img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,0,0,0.7) 100%);
    z-index: 1;
  }

  .status-badge-container {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 2;
  }

  .status-badge {
    padding: 6px 14px;
    border-radius: 50px;
    font-weight: 800;
    font-size: 0.85rem;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    backdrop-filter: blur(5px);
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    color: #ffffff;
  }
  .badge-safe { background: rgba(46, 204, 113, 0.9); }
  .badge-moderate { background: rgba(243, 156, 18, 0.9); }
  .badge-risky { background: rgba(231, 76, 60, 0.9); }
  .badge-none { background: rgba(113, 128, 150, 0.9); }

  .place-header-info {
    position: absolute;
    bottom: 15px;
    left: 20px;
    right: 20px;
    z-index: 2;
    color: white;
  }

  .card-body-custom {
    padding: 25px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
  }

  .review-item {
    background: #f8fafc;
    border-left: 3px solid var(--brand);
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 12px;
    position: relative;
    transition: background 0.3s;
  }
  .review-item:hover {
    background: #f1f5f9;
  }

  .btn-action-group {
    margin-top: auto;
    padding-top: 20px;
    display: flex;
    gap: 10px;
  }

  .btn-contribute {
    background: linear-gradient(135deg, var(--brand), var(--brand-dark));
    color: white;
    border: none;
    border-radius: 12px;
    padding: 10px 20px;
    font-weight: 700;
    flex: 1;
    transition: all 0.3s;
    text-align: center;
    text-decoration: none;
  }
  .btn-contribute:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(106, 90, 205, 0.3);
    color: white;
  }

  .btn-read-more {
    background: #f1f5f9;
    color: var(--text-main);
    border: 1px solid #e2e8f0;
    border-radius: 12px;
    padding: 10px 20px;
    font-weight: 700;
    transition: all 0.3s;
  }
  .btn-read-more:hover {
    background: #e2e8f0;
    color: var(--brand);
  }

  .modal-content {
    border-radius: var(--card-radius);
    border: none;
  }
  .modal-header {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    border-bottom: 1px solid #e2e8f0;
    padding: 20px;
  }
  .modal-body {
    background: #f8fafc;
    padding: 25px;
  }
  .review-bubble {
    background: #ffffff;
    border-radius: 16px;
    padding: 20px;
    margin-bottom: 15px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    border: 1px solid #e2e8f0;
  }

  .js-fadeIn { opacity: 0; transform: translateY(30px); transition: 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
  .js-fadeIn.visible { opacity: 1; transform: translateY(0); }

  .footer-modern {
    background: #1a202c;
    color: #a0aec0;
    padding: 40px 0 30px 0;
    margin-top: 60px;
  }

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

<section class="hero text-center">
  <div class="container js-fadeIn">
    <h2 class="fw-bold display-5 mb-3">
      <i class="fas fa-map-location-dot text-warning me-3"></i>
      <?php echo $city_filter ? htmlspecialchars($city_filter) : 'India Safety Network'; ?>
    </h2>
    <p class="fs-5 opacity-75 mb-4 max-w-2xl mx-auto">Verified community intelligence. Protect others by sharing your real experiences.</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="index.php" class="btn btn-light rounded-pill px-4 fw-bold shadow-sm text-dark"><i class="fas fa-arrow-left me-2"></i> Dashboard</a>
      <?php if(!$city_filter): ?>
      <a href="add_place.php" class="btn btn-warning rounded-pill px-4 fw-bold shadow-sm text-dark"><i class="fas fa-plus me-2"></i> Add New Location</a>
      <?php endif; ?>
    </div>
  </div>
</section>

<div class="container" style="margin-top: -40px; position: relative; z-index: 10;">
  <?php if($places_query && $places_query->num_rows == 0): ?>
  <div class="card card-modern p-5 text-center shadow-lg border-0 rounded-4 js-fadeIn">
    <div class="mb-4">
      <i class="fas fa-search-location text-muted" style="font-size: 4rem; opacity: 0.5;"></i>
    </div>
    <h4 class="fw-bold">No Data Available</h4>
    <p class="text-muted mb-4">Be the first to map the safety of this area.</p>
    <a href="add_place.php" class="btn btn-primary rounded-pill px-4 fw-bold" style="background: var(--brand); border: none;">Submit First Report</a>
  </div>
  <?php else: ?>
  
  <div class="row g-4">
  <?php
    while($row = $places_query->fetch_assoc()){
      $pid = $row['id'];
      $reviewQ = $conn->query("SELECT * FROM reviews WHERE place_id='$pid' ORDER BY created_at DESC");
      
      $total_score = 0;
      $review_count = 0;
      $all_reviews = [];

      if ($reviewQ) {
          while($r = $reviewQ->fetch_assoc()){
              $all_reviews[] = $r;
              $metrics = ['night_safety', 'lighting', 'crowd_behavior', 'security_presence', 'transport_safety', 'hygiene'];
              $sum = 0;
              $valid_metrics = 0;
              
              foreach($metrics as $m){
                  if(isset($r[$m]) && is_numeric($r[$m])){
                      $sum += $r[$m];
                      $valid_metrics++;
                  }
              }
              
              if($valid_metrics > 0){
                  $avg = $sum / $valid_metrics;
                  $total_score += $avg;
                  $review_count++;
              }
          }
      }

      $overall = ($review_count > 0) ? round($total_score / $review_count, 1) : null;
      
      $badgeClass = "badge-none";
      $statusText = "Unverified";
      $icon = "fa-circle-question";

      if($overall !== null){
          if($overall < 2.5){ 
            $badgeClass = "badge-risky"; 
            $statusText = "High Caution"; 
            $icon = "fa-triangle-exclamation";
          } elseif($overall < 4.0){ 
            $badgeClass = "badge-moderate"; 
            $statusText = "Moderate"; 
            $icon = "fa-eye";
          } else {
            $badgeClass = "badge-safe"; 
            $statusText = "Verified Safe"; 
            $icon = "fa-shield-check";
          }
      }
      
      $img_seed = urlencode($row['city'] . ' ' . $row['place_name'] . ' India architecture');
      $dynamic_image = "https://picsum.photos/seed/{$img_seed}/800/600";
  ?>

    <div class="col-md-6 col-lg-4 js-fadeIn">
      <div class="card-review">
        
        <div class="place-img-container">
          <img src="<?php echo $dynamic_image; ?>" class="place-img" alt="<?php echo htmlspecialchars($row['city']); ?>" loading="lazy">
          <div class="img-overlay"></div>
          
          <div class="status-badge-container">
            <div class="status-badge <?php echo $badgeClass; ?>">
              <i class="fas <?php echo $icon; ?>"></i>
              <?php echo $statusText; ?>
              <?php if($overall !== null) echo "<span class='ms-1 px-2 py-1 bg-white bg-opacity-25 rounded-pill'>{$overall}/5</span>"; ?>
            </div>
          </div>

          <div class="place-header-info">
            <h4 class="fw-bold mb-0 text-truncate" title="<?php echo htmlspecialchars($row['place_name']); ?>">
              <?php echo htmlspecialchars($row['place_name']); ?>
            </h4>
            <div class="small fw-medium mt-1">
              <i class="fas fa-location-dot text-danger me-1"></i> <?php echo htmlspecialchars($row['city']); ?>
              <?php if(!empty($row['area'])) echo " • " . htmlspecialchars($row['area']); ?>
            </div>
          </div>
        </div>

        <div class="card-body-custom">
          <h6 class="fw-bold mb-3 d-flex justify-content-between align-items-center">
            <span>Recent Experiences</span>
            <span class="badge bg-light text-dark border"><i class="fas fa-comment-alt text-muted me-1"></i> <?php echo count($all_reviews); ?></span>
          </h6>
          
          <div class="reviews-wrapper mb-3">
          <?php
          if(count($all_reviews) == 0){
              echo "<div class='text-center py-3 text-muted small'><i class='fas fa-info-circle fs-4 d-block mb-2 opacity-50'></i>No detailed reports yet.</div>";
          } else {
              $display_limit = 2;
              for($i = 0; $i < min($display_limit, count($all_reviews)); $i++) {
                  $rev = $all_reviews[$i];
          ?>
                <div class='review-item'>
                  <p class="mb-0 text-dark small" style="display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                    "<?php echo htmlspecialchars($rev['comment']); ?>"
                  </p>
                  <small class="text-muted mt-2 d-block fw-medium">
                    <i class="far fa-clock me-1"></i><?php echo date("d M Y", strtotime($rev['created_at'])); ?>
                  </small>
                </div>
          <?php
              }
          }
          ?>
          </div>

          <div class="btn-action-group">
            <a href="add_review.php?id=<?php echo $pid; ?>" class="btn-contribute">
              <i class="fas fa-pen me-1"></i> Rate
            </a>
            <?php if(count($all_reviews) > 0): ?>
            <button type="button" class="btn-read-more" data-bs-toggle="modal" data-bs-target="#modalPlace<?php echo $pid; ?>">
              <i class="fas fa-list"></i>
            </button>
            <?php endif; ?>
          </div>

        </div>
      </div>
    </div>

    <?php if(count($all_reviews) > 0): ?>
    <div class="modal fade" id="modalPlace<?php echo $pid; ?>" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content shadow-lg">
                <div class="modal-header d-flex flex-column align-items-start position-relative">
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"></button>
                    <div class="d-flex gap-2 mb-2">
                        <span class="badge bg-danger"><i class="fas fa-map-pin me-1"></i> <?php echo htmlspecialchars($row['city']); ?></span>
                        <span class="badge <?php echo $badgeClass; ?> text-white"><i class="fas <?php echo $icon; ?> me-1"></i> <?php echo $statusText; ?></span>
                    </div>
                    <h4 class="modal-title fw-bold text-dark mb-0"><?php echo htmlspecialchars($row['place_name']); ?></h4>
                </div>
                <div class="modal-body">
                    <?php foreach ($all_reviews as $rev): ?>
                    <div class="review-bubble">
                        <div class="text-dark small lh-base mb-2">
                            "<?php echo nl2br(htmlspecialchars($rev['comment'])); ?>"
                        </div>
                        <div class="small text-muted fw-medium border-top pt-2 mt-2">
                            <i class="fas fa-clock text-primary me-1"></i> <?php echo date("d M Y, h:i A", strtotime($rev['created_at'])); ?>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>

  <?php
    }
  ?>
  </div>
  <?php endif; ?>
</div>

<footer class="footer-modern text-center">
  <div class="container">
    <div class="text-center small fw-medium">
      © <?php echo date("Y"); ?> SafeHer. Mapping safety, together.
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
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