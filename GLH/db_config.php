<?php
// Database Configuration
$host = 'localhost';
$db_name = 'greenfield_hub';  // Change this to your database name
$db_user = 'root';             // Default XAMPP username
$db_pass = '';                 // Default XAMPP password (empty)
$db_port = 3306;

// Create connection
$conn = new mysqli($host, $db_user, $db_pass, $db_name, $db_port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set charset to utf8
$conn->set_charset("utf8mb4");

// Optional: Enable error reporting for development
// Remove in production for security
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
?>