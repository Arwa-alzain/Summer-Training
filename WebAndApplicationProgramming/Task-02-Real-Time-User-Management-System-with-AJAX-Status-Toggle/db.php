<?php
$servername = "sql302.infinityfree.com";
$username = "if0_42455644";
$password = "K4aLgpWN2I";
$dbname = "if0_42455644_user_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>