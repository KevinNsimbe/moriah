<?php
session_start();
include 'db/db_connection.php'; // Include the database connection

// Get form data
$name = $_POST['adname'];
$password = $_POST['adpassword'];

// SQL query to retrieve user data
$sql = "SELECT id, adname, adpassword FROM admin WHERE adname='$name'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['adpassword'])) {
        // Password is correct, set session variables and redirect
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['user_name'] = $row['adname'];
        echo "Login successful!";
        // Redirect to dashboard or another page
        header('Location: admin_dashboard.php');
    } else {
        echo "Incorrect password!";
        header('Location: index.php');
    }
} else {
    echo "User not found!";
    header('Location: index.php');
}

$conn->close();
?>
