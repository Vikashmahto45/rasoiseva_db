<?php
/**
 * RasoiSeva - Main Gateway
 * Redirects visitors to appropriate logins
 */
session_start();

if (isset($_SESSION['super_admin_id'])) {
    header("Location: admin/dashboard.php");
} else if (isset($_SESSION['tenant_id'])) {
    header("Location: client/dashboard.php");
} else {
    // Default to admin login for now as we build the system
    header("Location: admin/login.php");
}
exit;
?>
