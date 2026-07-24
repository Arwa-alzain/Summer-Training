<?php
$servername = "sql302.infinityfree.com";
$username = "";
$password = "";
$dbname = "if0_42455644_user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
