<?php
// Assuming form data is submitted via POST method
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}

// Retrieve the form data
$user_id = $_SESSION['user_id']; // Assuming user ID is available through session
$course_id = $_POST['course']; // Get the selected course ID from the form
$message = $_POST['message']; // Additional message from the form (if provided)

// Insert the application into the course_applications table
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

$query = "INSERT INTO course_applications (user_id, course_id, message) VALUES (?, ?, ?)";
$statement = $pdo->prepare($query);
$statement->execute([$user_id, $course_id, $message]);

// Confirm the application in the course_confirmation table
$queryConfirmation = "INSERT INTO course_confirmation (user_id, course_id) VALUES (?, ?)";
$statementConfirmation = $pdo->prepare($queryConfirmation);
$statementConfirmation->execute([$user_id, $course_id]);

// Redirect back to the dashboard or a confirmation page after application submission
header("Location: dashboard.php");
exit();
?>
