<?php
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Get the application ID from the URL parameter
if (isset($_GET['user_id'])) {
    $applicationID = $_GET['user_id'];

    // SQL query to fetch application details by ID
    $query = "SELECT * FROM course_applications WHERE user_id = :applicationID";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':applicationID', $applicationID);
    $statement->execute();
    $applicationDetails = $statement->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Application ID not provided.";
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Application</title>
    <!-- Add your CSS styles here -->
</head>
<body>
    <h1>View Application</h1>
    <div>
        <h2>Application Details</h2>
        <?php if ($applicationDetails) : ?>
            <p>Application ID: <?php echo $applicationDetails['user_id']; ?></p>
            <!-- Display other application details based on your table structure -->
            <p>User Name: <?php echo $applicationDetails['firstname']; ?></p>
            <p>Course ID: <?php echo $applicationDetails['course_id']; ?></p>
            <!-- Display other application details as needed -->
        <?php else : ?>
            <p>Application not found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
