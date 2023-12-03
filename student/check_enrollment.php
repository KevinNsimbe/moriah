<?php
// Assuming you have the current user's ID and the course ID
$currentUserID = $_SESSION['user_id']; // Replace this with the actual current user's ID
//$desiredCourseID = 1; // Replace this with the desired course ID to check enrollment

include_once 'pd_str/pd_str.php';

// Prepare and execute the SQL query to check enrollment
$query = "SELECT COUNT(*) AS 'enrollment_count'
          FROM enrollment
          WHERE user_id = :currentUserID
         ";

$statement = $pdo->prepare($query);
$statement->bindParam(':currentUserID', $currentUserID);
$statement->execute();

$result = $statement->fetch(PDO::FETCH_ASSOC);

// Check if the user is enrolled in the desired course
if ($result['enrollment_count'] > 0) {
    echo "The Semster is Active.";
    include_once 'display_enrollment_results.php';
} else {
    echo "Your application is confirmed!<br>Please Enroll for a new Semester";
    include_once 'enrollment.php';
    
}
?>
