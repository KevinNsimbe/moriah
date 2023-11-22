<?php
include 'db/db_connection.php'; // Include the database connection

// Get form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// SQL query to insert user data into the 'users' table
$sql = "INSERT INTO users (full_name, email, password) VALUES ('$fullname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
