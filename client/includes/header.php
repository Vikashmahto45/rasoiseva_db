<?php
/**
 * RasoiSeva - Client Portal Header
 */
require_once __DIR__ . '/../../includes/config.php';
require_once __DIR__ . '/../../includes/session.php';
protect_user(); // Ensure only logged-in restaurant users can access

$tenant_id = $_SESSION['tenant_id'];
$username = $_SESSION['username'];
$role = $_SESSION['role'];

// Fetch Tenant Details
$stmt = $conn->prepare("SELECT business_name FROM tenants WHERE id = ?");
$stmt->bind_param("i", $tenant_id);
$stmt->execute();
$tenant = $stmt->get_result()->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tenant['business_name']; ?> - Dashboard</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<body class="admin-body">
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar glass">
            <div class="sidebar-header">
                <div class="logo">
                    <i class="fas fa-utensils"></i>
                    <span>Rasoi<span>Seva</span></span>
                </div>
                <div class="tenant-name"><?php echo $tenant['business_name']; ?></div>
            </div>
            
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item active">
                    <i class="fas fa-chart-line"></i> <span>Dashboard</span>
                </a>
                
                <div class="nav-group">MANAGEMENT</div>
                <a href="pos.php" class="nav-item">
                    <i class="fas fa-cash-register"></i> <span>POS Terminal</span>
                </a>
                <a href="orders.php" class="nav-item">
                    <i class="fas fa-shopping-basket"></i> <span>Live Orders</span>
                </a>
                <a href="menu.php" class="nav-item">
                    <i class="fas fa-book-open"></i> <span>Menu Engine</span>
                </a>
                
                <div class="nav-group">OPERATIONS</div>
                <a href="inventory.php" class="nav-item">
                    <i class="fas fa-boxes-stacked"></i> <span>Inventory</span>
                </a>
                <a href="staff.php" class="nav-item">
                    <i class="fas fa-users"></i> <span>Staff Management</span>
                </a>
                
                <div class="nav-group">REPORTS</div>
                <a href="reports.php" class="nav-item">
                    <i class="fas fa-file-invoice-dollar"></i> <span>Sales Reports</span>
                </a>
            </nav>

            <div class="sidebar-footer">
                <a href="../logout.php" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> <span>Logout</span>
                </a>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="topbar glass">
                <div class="page-title">
                    <h1>Dashboard Overview</h1>
                    <p>Welcome back, <?php echo $username; ?> (<?php echo $role; ?>)</p>
                </div>
                
                <div class="topbar-actions">
                    <div class="action-btn">
                        <i class="fas fa-bell"></i>
                        <span class="badge">3</span>
                    </div>
                    <div class="profile-chip">
                        <div class="avatar"><?php echo substr($username, 0, 1); ?></div>
                        <span><?php echo $username; ?></span>
                    </div>
                </div>
            </header>

            <div class="content-wrapper">
