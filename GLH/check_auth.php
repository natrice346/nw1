<?php
/**
 * Authentication Check
 * Include this file at the top of any page that requires authentication
 * 
 * Usage:
 * <?php
 * require 'check_auth.php';
 * ?>
 */

session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Make username available (already set in session, but for convenience)
$user_id = $_SESSION['user_id'];
$username = htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
$email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email'], ENT_QUOTES, 'UTF-8') : '';
?>