<?php require_once '../includes/session.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Super Admin Login | RasoiSeva</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="icon" href="../assets/images/logo.png" type="image/x-icon">
    <style>
        .login-wrapper {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 10% 20%, rgba(255, 77, 77, 0.05) 0%, rgba(0, 0, 0, 0) 40%),
                        radial-gradient(circle at 90% 80%, rgba(77, 148, 255, 0.05) 0%, rgba(0, 0, 0, 0) 40%);
        }
        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 40px;
        }
        .brand {
            text-align: center;
            margin-bottom: 30px;
        }
        .brand h1 {
            font-size: 2rem;
            letter-spacing: -1px;
            margin-bottom: 5px;
        }
        .brand span {
            color: var(--primary-color);
        }
        .brand p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }
        .alert {
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 0.85rem;
            text-align: center;
        }
        .alert-error {
            background: rgba(255, 82, 82, 0.1);
            color: var(--error);
            border: 1px solid rgba(255, 82, 82, 0.2);
        }
        .login-footer {
            margin-top: 30px;
            text-align: center;
            color: var(--text-secondary);
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-container glass-card animate-fade">
            <div class="brand">
                <h1>Rasoi<span>Seva</span></h1>
                <p>Enterprise Management Suite</p>
            </div>

            <?php display_flash_message(); ?>

            <form action="auth_process.php" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Enter admin username" required autofocus>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn-primary">Sign In</button>
            </form>

            <div class="login-footer">
                &copy; <?php echo date('Y'); ?> RasoiSeva Architecture. Secure Access Only.
            </div>
        </div>
    </div>
</body>
</html>
