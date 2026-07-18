<?php
// Database Configuration

$db_host = "localhost";
$db_name = "onefund";
$db_user = "YOUR_DATABASE_USERNAME";
$db_pass = "YOUR_DATABASE_PASSWORD";

// Create Connection
$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check Connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Start Session
session_start();

// Site Settings
$site_name = "OneFund";
$site_url  = "https://onefund.site";
date_default_timezone_set("Asia/Dhaka");
?>
