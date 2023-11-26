<?php
// Assuming form data is submitted via POST method
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}

// Retrieve the form data
$user_id = $_SESSION['user_id']; // Assuming user ID is available through session
$course_id = $_POST['course']; // Get the selected course ID from the form
//$message = $_POST['message']; // Additional message from the form (if provided)
$gender = $_POST['gender'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];
$dob = $_POST['date_of_birth'];
$pob = $_POST['place_of_birth'];

$nationality = $_POST['nationality'];
$mother_tongue = $_POST['mother_tongue'];
$id_number = $_POST['id_number'];
$parent_title = $_POST['parent_title'];
$parent_name = $_POST['parent_name'];
$parent_address = $_POST['parent_address'];
$parent_town = $_POST['parent_town'];

$parent_mobile_number = $_POST['parent_mobile_number'];
$parent_email = $_POST['parent_email'];
$sponsor = $_POST['sponsor'];
$course_date = $_POST['course_date'];
$intake_date = $_POST['intake_date'];
$english_speaking_level = $_POST['English_speaking_level'];
// Insert the application into the course_applications table
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');


$query = "INSERT INTO course_applications (user_id, course_id, gender, lastname, phone_number, firstname, email, date_of_birth, place_of_birth, nationality, mother_tongue, id_number, parent_title, parent_name, parent_address, parent_town, parent_mobile_number, parent_email, sponsor, course_date, intake_date, English_speaking_level)
VALUES (?,?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?, ?, ?)";



//$query = "INSERT INTO course_applications (user_id, course_id, message) VALUES (?, ?, ?)";
$statement = $pdo->prepare($query);
$statement->execute([$user_id, $course_id,$gender, $lastname, $phone_number,$firstname, $email, $dob, $pob, $nationality, $mother_tongue, $id_number, $parent_title, $parent_name, $parent_address, $parent_town, $parent_mobile_number, $parent_email, $sponsor, $course_date, $intake_date, $english_speaking_level
]);

// Confirm the application in the course_confirmation table
$queryConfirmation = "INSERT INTO course_confirmation (user_id, course_id,confirm) VALUES (?, ?,?)";
$statementConfirmation = $pdo->prepare($queryConfirmation);
$statementConfirmation->execute([$user_id, $course_id,1]);

// Redirect back to the dashboard or a confirmation page after application submission
header("Location: dashboard.php");
exit();
?>
