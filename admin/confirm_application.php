<?php
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Check if application ID is provided via GET request
if(isset($_GET['user_id'])) {
    $applicationID = $_GET['user_id'];

    // Update the is_confirmed column to 1 for the specified application ID
    $query = "UPDATE course_applications SET is_confirmed = 2 WHERE user_id = :applicationID";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':applicationID', $applicationID);
    $success = $statement->execute();

    if($success) {
        echo "Application confirmed successfully.";
    } else {
        echo "Failed to confirm the application.";
    }
} else {
    echo "Application ID not provided.";
}
?>
