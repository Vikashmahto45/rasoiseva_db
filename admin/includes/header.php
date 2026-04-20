<?php
/**
 * RasoiSeva - Admin Header (Synchronized)
 */
require_once __DIR__ . '/../../includes/session.php';
protect_super_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?> | RasoiSeva</title>
    <!-- Use versioning to force CSS refresh -->
    <link rel="stylesheet" href="../assets/css/main.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="admin-layout">
        <!-- New Robust Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-brand">
                Rasoi<span>Seva</span>
            </div>
            
            <nav class="nav-menu">
                <a href="dashboard.php" class="nav-link <?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-house"></i> <span>Dashboard</span>
                </a>
                <a href="tenants.php" class="nav-link <?php echo ($active_page == 'tenants') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-store"></i> <span>Manage Tenants</span>
                </a>
                <a href="modules.php" class="nav-link <?php echo ($active_page == 'modules') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-cubes"></i> <span>Module Control</span>
                </a>
                <a href="billing.php" class="nav-link <?php echo ($active_page == 'billing') ? 'active' : ''; ?>">
                    <i class="fa-solid fa-file-invoice-dollar"></i> <span>Subscriptions</span>
                </a>
            </nav>
            
            <div style="margin-top: auto; padding-top: 20px; border-top: 1px solid var(--border);">
                <a href="../logout.php" class="nav-link text-danger">
                    <i class="fa-solid fa-right-from-bracket"></i> <span>Logout</span>
                </a>
            </div>
        </aside>
        
        <!-- Main Workspace -->
        <main class="main-content">
            <header class="topbar">
                <div class="page-info">
                    <h2 style="font-weight: 800;"><?php echo $page_title ?? 'Dashboard'; ?></h2>
                </div>
                <div class="flex aic gap-10">
                    <div style="text-align: right;">
                        <p style="font-weight: 600; font-size: 0.9rem;"><?php echo $_SESSION['super_admin_user']; ?></p>
                        <p style="color: var(--text-muted); font-size: 0.75rem;">Super Administrator</p>
                    </div>
                </div>
            </header>
