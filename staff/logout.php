<?php
/**
 * Emily Bakes Cakes - Staff Logout
 * Clears session and redirects to login
 */

session_start();

// Destroy all session data
$_SESSION = [];

if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

session_destroy();

// Redirect to login page
header('Location: login.php?logout=success');
exit();
?>
