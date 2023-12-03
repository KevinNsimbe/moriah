<?php
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Prepare and execute the SQL query
$query = "SELECT u.full_name AS 'User Name', e.student_registration_number AS 'Registration Number', e.current_semester AS 'Current Semster', e.current_academic_year AS 'Academic Year', c.course_name AS 'Course Name' 
FROM users u JOIN enrollment e ON u.id = e.user_id JOIN courses c ON c.id = e.course_id;";

$statement = $pdo->query($query);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Enrollment</title>
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
    <h2>Enrollments Details</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Registration Number</th>
                <th>Course Name</th>
                <th>Current semster</th>
                <th>Current Year</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row): ?>
                <tr>
                    <td><?php echo $row['User Name']; ?></td>
                    <td><?php echo $row['Registration Number']; ?></td>
                    <td><?php echo $row['Course Name']; ?></td>
                    <td><?php echo $row['Current Semster']; ?></td>
                    <td><?php echo $row['Academic Year']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
