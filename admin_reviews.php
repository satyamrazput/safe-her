<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$alert_html = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_review_id'])) {
    $review_id = (int)$_POST['delete_review_id'];
    $delete_query = $conn->query("DELETE FROM reviews WHERE id=$review_id");
    
    if($delete_query){
        $alert_html = "
        <div class='alert alert-success border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
            <i class='fas fa-trash-alt fs-4 me-3 text-success'></i>
            <div>
                <strong class='d-block text-dark'>Review Deleted</strong>
                <small class='text-muted'>The community review has been permanently removed from the platform.</small>
            </div>
        </div>";
    } else {
        $alert_html = "
        <div class='alert alert-danger border-0 shadow-sm rounded-3 p-3 mb-4 d-flex align-items-center animate__animated animate__fadeIn'>
            <i class='fas fa-exclamation-triangle fs-4 me-3 text-danger'></i>
            <div>
                <strong class='d-block text-dark'>Deletion Failed</strong>
                <small class='text-muted'>There was an error connecting to the database.</small>
            </div>
        </div>";
    }
}

$total_reviews_query = $conn->query("SELECT COUNT(*) as count FROM reviews");
$total_reviews = $total_reviews_query ? $total_reviews_query->fetch_assoc()['count'] : 0;

$total_places_query = $conn->query("SELECT COUNT(DISTINCT place_id) as count FROM reviews");
$total_places = $total_places_query ? $total_places_query->fetch_assoc()['count'] : 0;

$reviews_query = "
    SELECT r.id, r.comment, r.created_at, 
           p.place_name, p.city, 
           u.name as user_name, u.email 
    FROM reviews r 
    LEFT JOIN places p ON r.place_id = p.id 
    LEFT JOIN users u ON r.user_id = u.id 
    ORDER BY r.created_at DESC
";
$reviews_result = $conn->query($reviews_query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Reviews Admin | SafeHer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        :root {
            --brand: #6a5acd;
            --brand-dark: #4b3ca7;
            --muted-bg: #f8f9fc;
            --card-radius: 16px;
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

        .hero-mini {
            background: linear-gradient(135deg, #4b3ca7, #6a5acd);
            padding: 60px 0 100px 0;
            color: white;
        }

        .stat-card {
            background: #fff;
            border-radius: var(--card-radius);
            padding: 25px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            gap: 20px;
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .stat-icon.primary { background: rgba(106, 90, 205, 0.1); color: var(--brand); }
        .stat-icon.warning { background: rgba(255, 193, 7, 0.1); color: #ffc107; }

        .dashboard-container {
            margin-top: -60px;
            position: relative;
            z-index: 10;
        }

        .card-modern {
            background: #fff;
            border-radius: var(--card-radius);
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
            padding: 30px;
        }

        .table-custom th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
            padding: 15px;
        }

        .table-custom td {
            padding: 15px;
            vertical-align: middle;
            color: var(--text-main);
            border-bottom: 1px solid #f1f5f9;
        }

        .table-custom tr:hover td {
            background-color: #f8fafc;
        }

        .js-fadeIn { opacity: 0; transform: translateY(20px); transition: 0.6s ease-out; }
        .js-fadeIn.visible { opacity: 1; transform: translateY(0); }

        .admin-nav-link {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            font-weight: 600;
            padding: 8px 16px;
            border-radius: 50px;
            transition: 0.3s;
        }
        .admin-nav-link:hover, .admin-nav-link.active {
            color: #fff;
            background: rgba(255,255,255,0.2);
        }
        
        .delete-btn {
            background: rgba(220, 53, 69, 0.1);
            color: #dc3545;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }
        .delete-btn:hover {
            background: #dc3545;
            color: white;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="index.php">
            Safe<span class="brand-accent">Her</span>
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="admin_dashboard.php" class="admin-nav-link"><i class="fas fa-scale-balanced me-2"></i>Legal Aid</a>
            <a href="admin_reviews.php" class="admin-nav-link active"><i class="fas fa-star me-2"></i>Reviews</a>
            <a class="btn btn-danger px-4 rounded-pill fw-bold btn-sm ms-3" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="hero-mini">
    <div class="container">
        <h2 class="fw-bold mb-2">Community Reviews Database</h2>
        <p class="opacity-75 mb-0">Monitor user ratings, moderate content, and remove fake reviews.</p>
    </div>
</div>

<div class="container dashboard-container mb-5">
    <div class="row g-4 mb-4 js-fadeIn visible">
        <div class="col-md-6">
            <div class="stat-card">
                <div class="stat-icon primary"><i class="fas fa-comments"></i></div>
                <div>
                    <h3 class="fw-bold mb-0"><?php echo $total_reviews; ?></h3>
                    <span class="text-muted small fw-bold text-uppercase">Total Community Reviews</span>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="stat-card">
                <div class="stat-icon warning"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <h3 class="fw-bold mb-0"><?php echo $total_places; ?></h3>
                    <span class="text-muted small fw-bold text-uppercase">Places Reviewed</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card-modern js-fadeIn visible">
        <?php echo $alert_html; ?>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Review Moderation</h5>
            <button class="btn btn-outline-secondary btn-sm" onclick="location.reload();"><i class="fas fa-sync-alt me-2"></i>Refresh</button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th style="width: 25%;">Location Details</th>
                        <th style="width: 20%;">Reviewer</th>
                        <th style="width: 40%;">Comment</th>
                        <th style="width: 10%;">Date</th>
                        <th style="width: 5%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if($reviews_result && $reviews_result->num_rows > 0): ?>
                        <?php while($review = $reviews_result->fetch_assoc()): ?>
                        <tr>
                            <td>
                                <div class="fw-bold text-dark">
                                    <i class="fas fa-map-pin text-danger me-2"></i>
                                    <?php echo htmlspecialchars($review['place_name'] ? $review['place_name'] : 'Unknown Place/Deleted'); ?>
                                </div>
                                <?php if(!empty($review['city'])): ?>
                                    <div class="small text-muted ms-4"><?php echo htmlspecialchars($review['city']); ?></div>
                                <?php endif; ?>
                            </td>
                            <td>
                                <div class="fw-bold"><?php echo htmlspecialchars($review['user_name'] ? $review['user_name'] : 'Anonymous'); ?></div>
                                <div class="small text-muted"><?php echo htmlspecialchars($review['email'] ? $review['email'] : 'No Email Provided'); ?></div>
                            </td>
                            <td>
                                <div style="max-height: 80px; overflow-y: auto; padding-right: 10px;" class="text-muted small">
                                    "<?php echo nl2br(htmlspecialchars($review['comment'] ? $review['comment'] : 'No comment provided.')); ?>"
                                </div>
                            </td>
                            <td class="small text-muted fw-medium">
                                <?php echo date('M d, Y', strtotime($review['created_at'])); ?>
                            </td>
                            <td>
                                <form method="POST" action="" onsubmit="return confirm('Are you sure you want to permanently delete this review? This action cannot be undone.');">
                                    <input type="hidden" name="delete_review_id" value="<?php echo $review['id']; ?>">
                                    <button type="submit" class="delete-btn" title="Delete Fake Review">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <i class="fas fa-comment-slash fs-2 mb-3 opacity-50"></i><br>
                                No community reviews found in the database.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>