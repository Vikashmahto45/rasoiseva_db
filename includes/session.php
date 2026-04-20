<?php
/**
 * RasoiSeva - Session Management Middleware
 */
session_start();

/**
 * Check if the user is a logged-in Super Admin
 */
function protect_super_admin() {
    if (!isset($_SESSION['super_admin_id'])) {
        header("Location: login.php");
        exit;
    }
}

/**
 * Handle Logout
 */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

/**
 * Flash message helper
 */
function set_flash_message($msg, $type = 'error') {
    $_SESSION['flash_msg'] = $msg;
    $_SESSION['flash_type'] = $type;
}

function display_flash_message() {
    if (isset($_SESSION['flash_msg'])) {
        $msg = $_SESSION['flash_msg'];
        $type = $_SESSION['flash_type'];
        unset($_SESSION['flash_msg']);
        unset($_SESSION['flash_type']);
        echo "<div class='alert alert-{$type} animate-fade'>{$msg}</div>";
    }
}
?>
