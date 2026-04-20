<?php
/**
 * RasoiSeva - Production Configuration (Hostinger Optimized)
 */

// Hostinger DB Credentials (YOU MUST FILL THESE FROM YOUR HOSTINGER PANEL)
define('DB_HOST', 'localhost'); // Usually 'localhost' on Hostinger
define('DB_NAME', 'u123456789_rasoiseva'); // Fill your Hostinger DB Name
define('DB_USER', 'u123456789_admin');   // Fill your Hostinger DB User
define('DB_PASS', 'your_secure_password'); // Fill your Hostinger DB Password

// Application Settings
define('APP_NAME', 'RasoiSeva');
define('APP_URL', 'https://yourdomain.com'); // Fill your temporary domain

// Database Connection
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if ($conn->connect_error) {
    die("Live Connection failed: " . $conn->connect_error);
}

// Global Help Functions
function escape($conn, $data) {
    return mysqli_real_escape_string($conn, htmlspecialchars($data));
}
?>
