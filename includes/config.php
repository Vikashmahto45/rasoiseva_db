<?php
/**
 * RasoiSeva - Multi-Environment Configuration
 */

// Detect Environment
$is_localhost = ($_SERVER['REMOTE_ADDR'] === '127.0.0.1' || $_SERVER['REMOTE_ADDR'] === '::1');

if ($is_localhost) {
    // LOCAL SETTINGS (XAMPP)
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'rasoiseva_db');
    define('DB_USER', 'root');
    define('DB_PASS', '');
} else {
    // LIVE SETTINGS (HOSTINGER)
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'u197849891_globalwebify20'); 
    define('DB_USER', 'u197849891_globalwebify20');
    define('DB_PASS', 'Globalwebify@12345');
}

// Global Help Functions
function escape($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}

// Database Connection
require_once __DIR__ . '/db_connect.php';
?>
