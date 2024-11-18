<?php
session_start(); // Start the session

// Check if the admin is logged in
if (!isset($_SESSION['role'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit();
}

// Clear the session data for the admin
unset($_SESSION['role']);
unset($_SESSION['username']);

// Destroy the session
session_destroy();

// Redirect to the login page with a logout message
header("Location: login.php?logout=1");
exit();
?>
