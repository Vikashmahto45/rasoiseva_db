<?php
/**
 * RasoiSeva v3.0 - Unified Corporate Login
 */
require_once 'includes/config.php';
require_once 'includes/session.php'; // Will create after this

$error = (isset($_SESSION['auth_error'])) ? $_SESSION['auth_error'] : null;
unset($_SESSION['auth_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RasoiSeva - Enterprise Login</title>
    <link rel="stylesheet" href="assets/css/v3_style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="login-portal">
    <div class="login-box">
        <div class="login-header">
            <h1>RasoiSeva</h1>
            <p>Sign in to your enterprise account</p>
        </div>

        <?php if ($error): ?>
            <div style="background: #fef2f2; color: #b91c1c; padding: 12px; border-radius: 8px; font-size: 0.85rem; margin-bottom: 20px; border: 1px solid #fee2e2;">
                <i class="fas fa-exclamation-circle"></i> <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form action="auth_gateway.php" method="POST">
            <div class="form-field">
                <label class="form-label">Username / Email</label>
                <input type="text" name="username" class="form-input" placeholder="e.g. admin@enterprise.com" required>
            </div>

            <div class="form-field">
                <label class="form-label">Security Password</label>
                <input type="password" name="password" class="form-input" placeholder="••••••••" required>
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 0.85rem; color: var(--text-muted); cursor: pointer;">
                    <input type="checkbox" name="remember" style="accent-color: var(--primary);">
                    Keep me signed in
                </label>
            </div>

            <button type="submit" class="btn-primary">
                Continue to Workspace
            </button>
        </form>

        <div style="margin-top: 30px; text-align: center; border-top: 1px solid var(--border); padding-top: 20px;">
            <p style="font-size: 0.8rem; color: var(--text-muted);">
                &copy; <?php echo date('Y'); ?> RasoiSeva Integrated Cloud.
            </p>
        </div>
    </div>
</body>
</html>
