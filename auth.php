<?php
// Start the session
session_start();

// Check if the user is logged in by checking the cookies
if (!isset($_COOKIE['user_id']) || !isset($_COOKIE['username'])) {
    // Redirect the user to the login page if they are not authenticated
    header("Location: login.html");
    exit();
}
?>
