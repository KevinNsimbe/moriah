<?php
session_start(); // Start the session at the beginning of the script
$user_name = $_SESSION['user_name'];
// Check if the user is logged in and retrieve the user ID

$user_id = $_SESSION['user_id'];

// Assuming $user_id is available after the user logs in or through session data
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Query to fetch available courses
$query = "SELECT id, course_name FROM courses";
$statement = $pdo->query($query);
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);

// Example query to check if the user has any course applications
$queryCheck = "SELECT COUNT(*) AS total_applications FROM course_applications WHERE user_id = $user_id";
// Execute the query and fetch the result

$statementCheck = $pdo->prepare($queryCheck);
$statementCheck->execute();
$result = $statementCheck->fetch(PDO::FETCH_ASSOC);

if ($result && $result['total_applications'] > 0) {
    echo "<p>Hello, $user_name! You have already applied for course(s).</p>";
    // Display information or courses the user has applied for
} else {

    echo '
    
    ';
    echo "<h1>Hello, $user_name!</h1>";
    echo "<p>You have not applied for any course yet.</p>";
    // Display the application form for users with no applications
    echo "<h2>Apply for a Course</h2>";
    echo "<form action='process_application.php' method='POST'>";
    echo "<label for='course'>Select a Course:</label><br>";
    echo "<select id='course' name='course'>";
    foreach ($courses as $course) {
        echo "<option value='{$course['id']}'>{$course['course_name']}</option>";
    }
    echo "</select><br><br>";
    echo "<label for='message'>Additional Message (optional):</label><br>";
    echo "<textarea id='message' name='message' rows='4' cols='50'></textarea><br><br>";
    echo "<input type='submit' value='Apply'>";
    echo "</form>";
}
?>
