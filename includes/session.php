<?php
/**
 * RasoiSeva v3.0 - Enterprise Session Middleware
 */
session_start();

/**
 * Super Admin Middleware
 */
function protect_super_admin() {
    if (!isset($_SESSION['super_admin_id'])) {
        header("Location: ../login.php");
        exit;
    }
}

/**
 * Restaurant Staff Middleware
 */
function protect_user() {
    if (!isset($_SESSION['user_id'])) {
        header("Location: ../login.php");
        exit;
    }
}

/**
 * Auth Flash Messaging Helper
 */
function set_auth_error($msg) {
    $_SESSION['auth_error'] = $msg;
}
?>
