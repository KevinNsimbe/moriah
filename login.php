<?php
session_start();
include 'db/db_connection.php'; // Include the database connection

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// SQL query to retrieve user data
$sql = "SELECT id, full_name, email, password FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        // Password is correct, set session variables and redirect
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['full_name'];
        echo "Login successful!";
        // Redirect to dashboard or another page
        header('Location: student/dashboard.php');
    } else {
        echo "Incorrect password!";
    }
} else {
    echo "User not found!";
}

$conn->close();
?>
