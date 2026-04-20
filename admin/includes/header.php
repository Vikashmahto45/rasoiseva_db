<?php
/**
 * RasoiSeva - Admin Header
 */
require_once __DIR__ . '/../../includes/session.php';
protect_super_admin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Dashboard'; ?> | RasoiSeva Admin</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        
        /* Main Sidebar Styles */
        .sidebar {
            width: 260px;
            background: var(--bg-card);
            border-right: 1px solid var(--border);
            padding: 30px 20px;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
        }
        
        .sidebar-brand {
            font-size: 1.5rem;
            font-weight: 800;
            margin-bottom: 40px;
            padding: 0 10px;
        }
        .sidebar-brand span { color: var(--primary-color); }
        
        .nav-menu {
            list-style: none;
            flex-grow: 1;
        }
        
        .nav-item {
            margin-bottom: 5px;
        }
        
        .nav-link {
            display: flex;
            align-items: center;
            padding: 12px 15px;
            text-decoration: none;
            color: var(--text-secondary);
            border-radius: 10px;
            transition: all 0.2s ease;
            font-size: 0.95rem;
        }
        
        .nav-link i {
            width: 20px;
            margin-right: 12px;
            font-size: 1.1rem;
        }
        
        .nav-link:hover, .nav-link.active {
            color: white;
            background: var(--glass);
        }
        
        .nav-link.active {
            background: rgba(255, 77, 77, 0.1);
            color: var(--primary-color);
        }
        
        /* Content Area */
        .main-content {
            flex-grow: 1;
            margin-left: 260px;
            padding: 30px;
            background: var(--bg-dark);
        }
        
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 1px solid var(--border);
        }
        
        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .avatar {
            width: 35px;
            height: 35px;
            background: var(--primary-color);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        .badge {
            padding: 4px 8px;
            border-radius: 5px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        .badge-active { background: rgba(0, 200, 83, 0.1); color: var(--success); }
    </style>
</head>
<body>
    <div class="admin-layout">
        <aside class="sidebar">
            <div class="sidebar-brand">
                Rasoi<span>Seva</span>
            </div>
            
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link <?php echo ($active_page == 'dashboard') ? 'active' : ''; ?>">
                        <i class="fa-solid fa-house"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="tenants.php" class="nav-link <?php echo ($active_page == 'tenants') ? 'active' : ''; ?>">
                        <i class="fa-solid fa-store"></i> Manage Tenants
                    </a>
                </li>
                <li class="nav-item">
                    <a href="modules.php" class="nav-link <?php echo ($active_page == 'modules') ? 'active' : ''; ?>">
                        <i class="fa-solid fa-cubes"></i> Module Control
                    </a>
                </li>
                <li class="nav-item">
                    <a href="billing.php" class="nav-link <?php echo ($active_page == 'billing') ? 'active' : ''; ?>">
                        <i class="fa-solid fa-file-invoice-dollar"></i> Subscriptions
                    </a>
                </li>
            </ul>
            
            <div class="sidebar-footer" style="padding-top: 20px; border-top: 1px solid var(--border);">
                <a href="?logout=true" class="nav-link" style="color: var(--error);">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </div>
        </aside>
        
        <main class="main-content">
            <header class="topbar">
                <div class="page-info">
                    <h2 style="font-size: 1.4rem; font-weight: 700;"><?php echo $page_title ?? 'Dashboard'; ?></h2>
                </div>
                <div class="user-profile">
                    <div class="text-right" style="text-align: right;">
                        <p style="font-size: 0.9rem; font-weight: 600;"><?php echo $_SESSION['super_admin_user']; ?></p>
                        <p style="font-size: 0.75rem; color: var(--text-secondary);">Super Administrator</p>
                    </div>
                    <div class="avatar"><?php echo strtoupper(substr($_SESSION['super_admin_user'], 0, 1)); ?></div>
                </div>
            </header>
