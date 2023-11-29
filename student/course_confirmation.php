<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//session_start(); // Start the session at the beginning of the script
$user_name = $_SESSION['user_name'];
// Check if the user is logged in and retrieve the user ID

$user_id = $_SESSION['user_id'];

// Establish a database connection
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Assuming you have a variable $user_id containing the user's ID
//$user_id = 123; // Replace this with the actual user ID

// Update the is_confirmed status
$updateQuery = "UPDATE course_applications SET is_confirmed = 1 WHERE user_id = ?";
$statement = $pdo->prepare($updateQuery);
$statement->execute([$user_id]);
