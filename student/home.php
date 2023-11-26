<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
//session_start(); // Start the session at the beginning of the script
$user_name = $_SESSION['user_name'];
// Check if the user is logged in and retrieve the user ID

$user_id = $_SESSION['user_id'];

// Assuming $user_id is available after the user logs in or through session data
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Query to fetch available courses
$query = "SELECT id, course_name FROM courses";
$statement = $pdo->query($query);
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);


$queryCheck = "SELECT ca.course_id, c.course_name 
               FROM course_applications ca
               INNER JOIN courses c ON ca.course_id = c.id
               WHERE ca.user_id = $user_id";
// Example query to check if the user has any course applications
$statementCheck = $pdo->prepare($queryCheck);
$statementCheck->execute();
$result = $statementCheck->fetch(PDO::FETCH_ASSOC);

if ($result) {
    echo "<p>Hello, $user_name! You have applied for {$result['course_name']}.</p>";
    // Display information or courses the user has applied for
    include_once 'application_confirmation.php';
} else {
    echo "<h1>Hello, $user_name!</h1>";
    echo "<p>You have not applied for any course yet.</p>";
    // Display the application form for users with no applications
    echo "<h2>Apply for a Course</h2>";
   
    include_once 'appform.php';
   
}
?>