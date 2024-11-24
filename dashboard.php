<?php

require_once 'auth.php';

// If the user is logged in, display the dashboard
echo "Welcome, " . htmlspecialchars($_COOKIE['username']) . "! This is your dashboard.";
?>

