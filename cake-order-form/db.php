<?php
// ============================================================================
// DATABASE CONNECTION
// ============================================================================

// Database credentials - UPDATE THESE FOR YOUR SETUP
$db_host = 'localhost';
$db_name = 'cake_orders';
$db_user = 'root';
$db_pass = '';

// Create connection
$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Set charset to UTF-8
mysqli_set_charset($conn, "utf8");

// Helper function to safely escape strings
function clean_input($data) {
    global $conn;
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysqli_real_escape_string($conn, $data);
    return $data;
}

// Helper function to format money
function format_money($amount) {
    return '$' . number_format($amount, 2);
}

// Helper function to format date
function format_date($date) {
    return date('m/d/Y', strtotime($date));
}
?>
