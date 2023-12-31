<?php

session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: index.php');
    exit();
}
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Replace 'your_user_id' with the actual user ID for whom you want to fetch the course information
$userID = $_SESSION['user_id'];

// SQL query to fetch user's course information
$query = "SELECT a.id, a.firstname, c.course_name, a.lastname, a.Gender, a.email, a.intake_date, a.nationality, a.phone_number
 FROM course_applications a 
JOIN courses c ON a.course_id = c.id
where a.is_confirmed=0";


$statement = $pdo->query($query);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>User's Course Information</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>User's Course Information</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course Name</th>
                <th>Intake Date</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Tell</th>
                <th>Nationality</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row) : ?>
                <tr>
                <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['intake_date']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['nationality']; ?></td>
                    
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
