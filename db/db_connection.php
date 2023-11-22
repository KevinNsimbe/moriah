<?php
$servername = "localhost"; // Change this if your MySQL server is on a different host
$username = "root";
$password = "";
$dbname = "moriahesch"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
