<?php
// Simple authentication functions for student project

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: login.php');
        exit;
    }
}

function logout() {
    session_start();
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit;
}

function getUserRole() {
    return $_SESSION['role'] ?? 'Guest';
}

function getUserEmail() {
    return $_SESSION['email'] ?? '';
}
?>
