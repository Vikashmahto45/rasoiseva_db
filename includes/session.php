<?php
/**
 * RasoiSeva v2.0 - Clean Multi-Tenant Middleware
 */
session_start();

/**
 * Protect Super Admin Routes
 */
function protect_super_admin() {
    if (!isset($_SESSION['super_admin_id'])) {
        header("Location: ../login.php");
        exit;
    }
}

/**
 * Protect Restaurant Staff Routes
 */
function protect_user() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
        exit;
    }
}

/**
 * Global Helper: Sanitization
 */
function escape($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}
?>
