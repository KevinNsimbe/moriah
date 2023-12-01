<?php
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Function to fetch all applications
function fetchAllApplications($pdo) {
    $statement = $pdo->query("SELECT * FROM course_applications");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$applications = fetchAllApplications($pdo);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - All Applications</title>
</head>
<body>
    <h1>All Applications</h1>

    <!-- Table to display all applications -->
    <table border="1">
        <thead>
            <tr>
                <!-- Table headers -->
                <th>ID</th>
                <!-- Include other columns here -->
                <th>Gender</th>
                <th>Last Name</th>
                <!-- Add other columns based on your application table -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application) : ?>
                <tr>
                    <!-- Display application details -->
                    <td><?php echo $application['id']; ?></td>
                    <!-- Include other columns data -->
                    <td><?php echo $application['Gender']; ?></td>
                    <td><?php echo $application['lastname']; ?></td>
                    <!-- Add other columns based on your application table -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
