<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update_status'])) {
    $case_id = (int)$_POST['case_id'];
    $new_status = $conn->real_escape_string($_POST['new_status']);
    $conn->query("UPDATE legal_applications SET status='$new_status' WHERE id=$case_id");
    header("Location: admin_dashboard.php");
    exit();
}

$total_cases = $conn->query("SELECT COUNT(*) as count FROM legal_applications")->fetch_assoc()['count'];
$pending_cases = $conn->query("SELECT COUNT(*) as count FROM legal_applications WHERE status='Pending'")->fetch_assoc()['count'];
$reviewed_cases = $conn->query("SELECT COUNT(*) as count FROM legal_applications WHERE status='Reviewed'")->fetch_assoc()['count'];

$applications = $conn->query("SELECT * FROM legal_applications ORDER BY submitted_at DESC");

$all_cases = [];
if($applications && $applications->num_rows > 0){
    while($row = $applications->fetch_assoc()){
        $all_cases[] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Aid Admin | SafeHer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
        .stat-icon.success { background: rgba(25, 135, 84, 0.1); color: #198754; }

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

        .badge-status {
            padding: 6px 12px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 0.8rem;
        }
        
        .badge-pending { background: #fff3cd; color: #856404; }
        .badge-reviewed { background: #cff4fc; color: #055160; }
        .badge-contacted { background: #d1e7dd; color: #0f5132; }
        .badge-closed { background: #e2e8f0; color: #475569; }

        .modal-content {
            border-radius: var(--card-radius);
            border: none;
        }
        .modal-header {
            background: #f8fafc;
            border-bottom: 1px solid #e2e8f0;
            border-radius: var(--card-radius) var(--card-radius) 0 0;
        }
        .detail-label {
            font-size: 0.85rem;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .detail-value {
            font-size: 1rem;
            color: var(--text-main);
            font-weight: 500;
            margin-bottom: 20px;
        }
        .desc-box {
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .asset-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: rgba(106, 90, 205, 0.1);
            color: var(--brand);
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .asset-btn:hover {
            background: var(--brand);
            color: white;
        }

        audio {
            width: 100%;
            height: 40px;
            outline: none;
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
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark custom-navbar shadow-sm fixed-top">
    <div class="container">
        <a class="navbar-brand brand-text" href="index.php">
            Safe<span class="brand-accent">Her</span>
        </a>
        <div class="ms-auto d-flex align-items-center gap-2">
            <a href="admin_dashboard.php" class="admin-nav-link active"><i class="fas fa-scale-balanced me-2"></i>Legal Aid</a>
            <a href="admin_reviews.php" class="admin-nav-link"><i class="fas fa-star me-2"></i>Reviews</a>
            <a class="btn btn-danger px-4 rounded-pill fw-bold btn-sm ms-3" href="logout.php">Logout</a>
        </div>
    </div>
</nav>

<div class="hero-mini">
    <div class="container">
        <h2 class="fw-bold mb-2">Legal Aid Applications</h2>
        <p class="opacity-75 mb-0">Review, manage, and process pro-bono requests.</p>
    </div>
</div>

<div class="container dashboard-container mb-5">
    <div class="row g-4 mb-4 js-fadeIn visible">
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon primary"><i class="fas fa-folder-open"></i></div>
                <div>
                    <h3 class="fw-bold mb-0"><?php echo $total_cases; ?></h3>
                    <span class="text-muted small fw-bold text-uppercase">Total Applications</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon warning"><i class="fas fa-clock"></i></div>
                <div>
                    <h3 class="fw-bold mb-0"><?php echo $pending_cases; ?></h3>
                    <span class="text-muted small fw-bold text-uppercase">Pending Review</span>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="stat-card">
                <div class="stat-icon success"><i class="fas fa-check-double"></i></div>
                <div>
                    <h3 class="fw-bold mb-0"><?php echo $reviewed_cases; ?></h3>
                    <span class="text-muted small fw-bold text-uppercase">Cases Reviewed</span>
                </div>
            </div>
        </div>
    </div>

    <div class="card-modern js-fadeIn visible">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Recent Submissions</h5>
            <button class="btn btn-outline-secondary btn-sm" onclick="location.reload();"><i class="fas fa-sync-alt me-2"></i>Refresh</button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date Submitted</th>
                        <th>Applicant Name</th>
                        <th>Issue Category</th>
                        <th>Support Model</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($all_cases)): ?>
                        <?php foreach($all_cases as $case): 
                            $status_class = 'badge-pending';
                            if($case['status'] == 'Reviewed') $status_class = 'badge-reviewed';
                            if($case['status'] == 'Contacted') $status_class = 'badge-contacted';
                            if($case['status'] == 'Closed') $status_class = 'badge-closed';
                        ?>
                        <tr>
                            <td class="fw-bold text-muted">#<?php echo str_pad($case['id'], 4, '0', STR_PAD_LEFT); ?></td>
                            <td><?php echo date('M d, Y h:i A', strtotime($case['submitted_at'])); ?></td>
                            <td class="fw-bold"><?php echo htmlspecialchars($case['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($case['issue_type']); ?></td>
                            <td><?php echo htmlspecialchars($case['support_type']); ?></td>
                            <td><span class="badge-status <?php echo $status_class; ?>"><?php echo $case['status']; ?></span></td>
                            <td>
                                <button class="btn btn-sm text-white fw-bold px-3 rounded-pill" style="background: var(--brand);" data-bs-toggle="modal" data-bs-target="#caseModal<?php echo $case['id']; ?>">
                                    View Case
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fs-2 mb-3 opacity-50"></i><br>
                                No legal aid applications found.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php foreach($all_cases as $case): ?>
<div class="modal fade" id="caseModal<?php echo $case['id']; ?>" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header p-4">
                <h5 class="modal-title fw-bold">Case #<?php echo str_pad($case['id'], 4, '0', STR_PAD_LEFT); ?> Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="detail-label">Applicant Name</div>
                        <div class="detail-value"><?php echo htmlspecialchars($case['full_name']); ?></div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Contact Number</div>
                        <div class="detail-value"><a href="tel:<?php echo htmlspecialchars($case['phone']); ?>" class="text-decoration-none" style="color: var(--brand);"><?php echo htmlspecialchars($case['phone']); ?></a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Email Address</div>
                        <div class="detail-value"><a href="mailto:<?php echo htmlspecialchars($case['email']); ?>" class="text-decoration-none" style="color: var(--brand);"><?php echo htmlspecialchars($case['email']); ?></a></div>
                    </div>
                    <div class="col-md-6">
                        <div class="detail-label">Issue Category</div>
                        <div class="detail-value"><span class="badge bg-secondary"><?php echo htmlspecialchars($case['issue_type']); ?></span></div>
                    </div>
                </div>

                <div class="detail-label mt-2">Incident Description</div>
                <div class="desc-box mb-4">
                    <?php echo nl2br(htmlspecialchars($case['description'])); ?>
                </div>

                <div class="row mb-4">
                    <?php if(!empty($case['evidence_path'])): ?>
                    <div class="col-md-6 mb-3">
                        <div class="detail-label">Uploaded Evidence</div>
                        <a href="<?php echo htmlspecialchars($case['evidence_path']); ?>" target="_blank" class="asset-btn w-100 justify-content-center">
                            <i class="fas fa-file-download"></i> View / Download Evidence
                        </a>
                    </div>
                    <?php endif; ?>

                    <?php if(!empty($case['audio_path'])): ?>
                    <div class="col-md-6 mb-3">
                        <div class="detail-label">Voice Statement</div>
                        <div class="p-2 border rounded bg-white shadow-sm">
                            <audio controls src="<?php echo htmlspecialchars($case['audio_path']); ?>"></audio>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>

                <hr class="border-light my-4">

                <form method="POST" action="">
                    <input type="hidden" name="case_id" value="<?php echo $case['id']; ?>">
                    <div class="row align-items-end">
                        <div class="col-md-8">
                            <label class="detail-label">Update Case Status</label>
                            <select name="new_status" class="form-select border-2">
                                <option value="Pending" <?php if($case['status']=='Pending') echo 'selected'; ?>>Pending</option>
                                <option value="Reviewed" <?php if($case['status']=='Reviewed') echo 'selected'; ?>>Reviewed</option>
                                <option value="Contacted" <?php if($case['status']=='Contacted') echo 'selected'; ?>>Contacted</option>
                                <option value="Closed" <?php if($case['status']=='Closed') echo 'selected'; ?>>Closed</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="update_status" class="btn btn-dark w-100 mt-3 mt-md-0 fw-bold py-2 rounded-3">Save Status</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>