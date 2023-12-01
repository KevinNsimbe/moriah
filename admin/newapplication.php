<?php
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Function to fetch all applications
function fetchAllApplications($pdo) {
    $statement = $pdo->query("SELECT * FROM course_applications WHERE is_confirmed=0");
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

$applications = fetchAllApplications($pdo);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard - All Applications</title>
    <link rel="stylesheet"  type="text/css" href="tablestyle.css">
</head>
<body>
    <h1>New Applications</h1>

    <!-- Table to display all applications -->
    <table>
        <thead>
            <tr>
                <!-- Table headers -->
                <th>ID</th>
                <!-- Include other columns here -->
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Tell</th>
                <th>Email</th>
                <!-- Add other columns based on your application table -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applications as $application) : ?>
                <tr>
                    <!-- Display application details -->
                    <td><?php echo $application['id']; ?></td>
                    <td><?php echo $application['firstname']; ?></td>
                    <td><?php echo $application['lastname']; ?></td>
                    <td><?php echo $application['Gender']; ?></td>
                    <!-- Include other columns data -->
                    <td><?php echo $application['phone_number']; ?></td>
                    <td><?php echo $application['email']; ?></td>
                    <!-- Add other columns based on your application table -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
