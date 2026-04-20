<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';

$conn = new mysqli($host, $user, $pass);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully to MySQL\n";

// Execute the SQL file
$sql = file_get_contents('setup_database.sql');
if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->next_result());
    echo "Database structure initialized.\n";
} else {
    die("Error initializing database: " . $conn->error);
}

// Reconnect to the new DB
$conn->select_db('rasoiseva_db');

// Insert default Super Admin (Password: admin123)
$username = 'admin';
$password_hash = password_hash('admin123', PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO super_admins (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $username, $password_hash);

if ($stmt->execute()) {
    echo "Default Super Admin created: admin / admin123\n";
} else {
    echo "Super Admin already exists or Error: " . $conn->error . "\n";
}

$stmt->close();
$conn->close();
?>
