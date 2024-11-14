<?php
$servername = "localhost";  // or your database server
$username = "root";         // your MySQL username
$password = "yourpasswdhere";             // your MySQL password
$dbname = "user_db";        // the name of the database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

