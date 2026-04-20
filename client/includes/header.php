<?php
/**
 * RasoiSeva v3.0 - Professional Client Header
 */
require_once __DIR__ . '/../../includes/session.php';
require_once __DIR__ . '/../../includes/config.php';
protect_user();

// Fetch Tenant & Outlet Branding
$tenant_id = $_SESSION['tenant_id'];
$business = $conn->query("SELECT business_name FROM tenants WHERE id = $tenant_id")->fetch_assoc();
$business_name = $business['business_name'] ?? 'Restaurant';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?> | <?php echo $business_name; ?></title>
    <!-- Use v3 corporate design -->
    <link rel="stylesheet" href="../assets/css/v3_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-layout">
        <!-- New Corporate Restaurant Sidebar -->
        <aside class="sidebar">
            <div style="margin-bottom: 40px; border-bottom: 1px solid var(--border); padding-bottom: 20px;">
                <h1 style="font-size: 1.25rem; font-weight: 800; color: var(--primary);"><?php echo $business_name; ?></h1>
                <p style="font-size: 0.7rem; color: var(--text-muted); text-transform: uppercase; font-weight: 700; margin-top: 4px;">Management Portal</p>
            </div>

            <nav>
                <a href="dashboard.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: <?php echo ($active_page == 'dashboard') ? 'var(--primary)' : 'var(--text-muted)'; ?>; text-decoration: none; font-weight: 600; font-size: 0.9rem; border-radius: 8px; background: <?php echo ($active_page == 'dashboard') ? '#eff6ff' : 'transparent'; ?>; margin-bottom: 4px;">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="pos.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--text-muted); text-decoration: none; font-weight: 600; font-size: 0.9rem; border-radius: 8px; margin-bottom: 4px;">
                    <i class="fas fa-cash-register"></i> POS Terminal
                </a>
                <a href="orders.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--text-muted); text-decoration: none; font-weight: 600; font-size: 0.9rem; border-radius: 8px; margin-bottom: 4px;">
                    <i class="fas fa-receipt"></i> Orders List
                </a>
                <a href="inventory.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--text-muted); text-decoration: none; font-weight: 600; font-size: 0.9rem; border-radius: 8px; margin-bottom: 4px;">
                    <i class="fas fa-boxes"></i> Inventory
                </a>
                <a href="reports.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--text-muted); text-decoration: none; font-weight: 600; font-size: 0.9rem; border-radius: 8px; margin-bottom: 4px;">
                    <i class="fas fa-chart-line"></i> Sales Reports
                </a>
                
                <div style="margin-top: 60px; border-top: 1px solid var(--border); padding-top: 20px;">
                    <a href="../logout.php" style="display: flex; align-items: center; gap: 12px; padding: 12px; color: var(--error); text-decoration: none; font-weight: 600; font-size: 0.9rem;">
                        <i class="fas fa-sign-out-alt"></i> Sign Out
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Workspace Area -->
        <main class="main-workspace">
            <header style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px;">
                <div>
                    <h2 style="font-size: 1.5rem;"><?php echo $page_title ?? 'Workspace'; ?></h2>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Operational Control Unit</p>
                </div>

                <div style="display: flex; align-items: center; gap: 15px;">
                    <div style="text-align: right;">
                        <p style="font-weight: 700; font-size: 0.9rem;"><?php echo $_SESSION['username']; ?></p>
                        <p style="font-size: 0.75rem; color: var(--primary); font-weight: 700; text-transform: uppercase;">Restaurant Admin</p>
                    </div>
                </div>
            </header>
