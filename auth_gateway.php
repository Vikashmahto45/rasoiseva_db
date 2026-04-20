<?php
/**
 * RasoiSeva v2.0 - Multi-Tenant Auth Gateway
 */
require_once 'includes/config.php';
require_once 'includes/session.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = escape($conn, $_POST['username']);
    $password = $_POST['password'];

    // 1. Check Super Admin Table
    $stmt = $conn->prepare("SELECT id, password FROM super_admins WHERE username = ? LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['super_admin_id'] = $user['id'];
            $_SESSION['super_admin_user'] = $username;
            header("Location: admin/dashboard.php");
            exit;
        }
    }

    // 2. Check Restaurant Users Table
    $stmt = $conn->prepare("SELECT id, tenant_id, outlet_id, password, role FROM users WHERE username = ? AND status = 1 LIMIT 1");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['tenant_id'] = $user['tenant_id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $user['role'];
            header("Location: client/dashboard.php");
            exit;
        }
    }

    $_SESSION['login_error'] = "Authentication failed. Access denied.";
    header("Location: login.php");
    exit;

} else {
    header("Location: login.php");
    exit;
}
?>
