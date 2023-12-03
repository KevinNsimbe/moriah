<?php
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}

$currentUserID = $_SESSION['user_id']; // Replace this with the actual current user's ID

include_once 'pd_str/pd_str.php';

// Check if the current user is already enrolled in the selected course
$query = "SELECT COUNT(*) AS 'enrollment_count'
          FROM enrollment 
          WHERE user_id = :currentUserID 
          ";

$statement = $pdo->prepare($query);
$statement->bindParam(':currentUserID', $currentUserID);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);

// Check if there is an enrollment record for the current user and course
if ($result['enrollment_count'] > 0) {
    echo "The current user is already enrolled in the selected course.";
} else {
    echo "You are not enrolled yet for the semster.";
}
?>
