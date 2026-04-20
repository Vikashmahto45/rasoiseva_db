<?php
/**
 * RasoiSeva - Emergency Admin Recovery Script
 * THIS FILE SHOULD BE DELETED AFTER USE
 */
require_once '../includes/config.php';

echo "<h1>RasoiSeva Recovery Mode</h1>";

// 1. Re-generate the hash using the server's native function
$username = 'admin';
$password = 'admin123';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// 2. Update the database
$stmt = $conn->prepare("UPDATE super_admins SET password = ? WHERE username = ?");
$stmt->bind_param("ss", $hashed_password, $username);

if ($stmt->execute()) {
    if ($stmt->affected_rows > 0) {
        echo "<p style='color:green;'><b>SUCCESS:</b> Admin password has been reset to 'admin123'.</p>";
    } else {
        // If no rows were updated, maybe the user doesn't exist? Let's try to insert.
        $insert = $conn->prepare("INSERT INTO super_admins (username, password) VALUES (?, ?)");
        $insert->bind_param("ss", $username, $hashed_password);
        if ($insert->execute()) {
            echo "<p style='color:green;'><b>SUCCESS:</b> Fresh Admin account created with password 'admin123'.</p>";
        } else {
            echo "<p style='color:red;'><b>ERROR:</b> Could not create admin: " . $conn->error . "</p>";
        }
    }
} else {
    echo "<p style='color:red;'><b>ERROR:</b> Query failed: " . $conn->error . "</p>";
}

echo "<hr><p><a href='login.php'>Return to Login Screen</a></p>";
?>
