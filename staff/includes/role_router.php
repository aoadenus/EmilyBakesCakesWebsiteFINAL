<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header('Location: ../login.php');
    exit;
}

// Route based on user role
$role = $_SESSION['user_role'] ?? '';

switch ($role) {
    case 'manager':
        header('Location: ../manager/dashboard.php');
        break;
    case 'sales':
        header('Location: ../sales/orders.php');
        break;
    case 'baker':
        header('Location: ../baker/dashboard.php');
        break;
    case 'decorator':
        header('Location: ../decorator/dashboard.php');
        break;
    case 'accountant':
        header('Location: ../accountant/dashboard.php');
        break;
    default:
        // If role is unknown, logout
        session_destroy();
        header('Location: ../login.php');
        break;
}
exit;
?>
