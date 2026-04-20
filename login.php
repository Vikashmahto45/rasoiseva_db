<?php
/**
 * RasoiSeva v2.0 - Elite Unified Login Portal
 */
require_once 'includes/config.php';
require_once 'includes/session.php'; // I'll recreate this next

$error = (isset($_SESSION['login_error'])) ? $_SESSION['login_error'] : null;
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasoiSeva - Enterprise Login</title>
    <!-- Use versioning for fresh CSS load -->
    <link rel="stylesheet" href="assets/css/v2_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <section class="login-screen">
        <div class="login-card glass-effect emerald-glow">
            <div class="brand-identity">
                <div class="brand-icon">
                    <i class="fas fa-crown"></i>
                </div>
                <h1>Rasoi<span>Seva</span></h1>
                <p>Advanced Restaurant Management v2.0</p>
            </div>

            <?php if ($error): ?>
                <div style="background: rgba(239, 68, 68, 0.1); color: #ef4444; padding: 15px; border-radius: 12px; margin-bottom: 25px; font-size: 0.9rem;">
                    <i class="fas fa-circle-exclamation"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="auth_gateway.php" method="POST" class="form-v2">
                <div class="input-container">
                    <label>Identification</label>
                    <input type="text" name="username" class="input-field" placeholder="Username or Email" required autocomplete="off">
                </div>

                <div class="input-container">
                    <label>Master Security Key</label>
                    <input type="password" name="password" class="input-field" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn-v2">
                    <span>Access Workspace</span>
                    <i class="fas fa-chevron-right"></i>
                </button>
            </form>

            <div style="margin-top: 30px;">
                <p style="color: var(--text-muted); font-size: 0.8rem;">
                    &copy; <?php echo date('Y'); ?> GlobalWebify Systems.
                </p>
            </div>
        </div>
    </section>
</body>
</html>
