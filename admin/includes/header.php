<?php
/**
 * RasoiSeva v2.0 - Elite Super Admin Header
 */
require_once __DIR__ . '/../../includes/session.php';
protect_super_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Workspace'; ?> | RasoiSeva v2.0</title>
    <!-- Versioning ensures fresh CSS on Hostinger -->
    <link rel="stylesheet" href="../assets/css/v2_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">
</head>
<body>
    <div class="app-container">
        <!-- New Royal Emerald Sidebar -->
        <aside class="sidebar-v2">
            <div class="brand-identity" style="margin-bottom: 50px;">
                <h1 style="font-size: 1.5rem; font-weight: 800;">Rasoi<span>Seva</span></h1>
                <p style="font-size: 0.75rem; letter-spacing: 1px;">SUPER CONSOLE v2.0</p>
            </div>

            <nav class="nav-v2">
                <a href="dashboard.php" class="nav-link <?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">
                    <i class="fas fa-grid-2"></i> <span>Executive Overview</span>
                </a>
                <a href="tenants.php" class="nav-link <?php echo ($active_page == 'tenants') ? 'active' : ''; ?>">
                    <i class="fas fa-store"></i> <span>Partner Management</span>
                </a>
                <a href="modules.php" class="nav-link <?php echo ($active_page == 'modules') ? 'active' : ''; ?>">
                    <i class="fas fa-cubes"></i> <span>System Engines</span>
                </a>
                <a href="billing.php" class="nav-link <?php echo ($active_page == 'billing') ? 'active' : ''; ?>">
                    <i class="fas fa-wallet"></i> <span>Finance & Revenue</span>
                </a>
                
                <div style="margin-top: 50px; border-top: 1px solid var(--border-soft); padding-top: 20px;">
                    <a href="../logout.php" class="nav-link" style="color: var(--status-error);">
                        <i class="fas fa-power-off"></i> <span>Terminate Session</span>
                    </a>
                </div>
            </nav>
        </aside>

        <!-- Main Workspace -->
        <main class="main-workspace">
            <header class="topbar">
                <div class="header-info">
                    <h2 style="font-size: 1.5rem; font-weight: 800;"><?php echo $page_title ?? 'Workspace'; ?></h2>
                    <p style="color: var(--text-muted); font-size: 0.9rem;">Enterprise Governance Monitor</p>
                </div>
                
                <div class="header-actions" style="display: flex; align-items: center; gap: 20px;">
                    <div style="text-align: right;">
                        <p style="font-weight: 700; font-size: 0.9rem;"><?php echo $_SESSION['super_admin_user']; ?></p>
                        <p style="color: var(--brand-primary); font-size: 0.7rem; font-weight: 800; text-transform: uppercase;">Super Admin Access</p>
                    </div>
                </div>
            </header>
