<?php
/**
 * RasoiSeva - Database Connector
 */

// Use constants defined in config.php
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for universal character support
$conn->set_charset("utf8mb4");
?>
