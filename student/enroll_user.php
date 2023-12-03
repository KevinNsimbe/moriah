<?php
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}

// Display the logged-in student's name
$user_name = $_SESSION['user_name'];
$user_id = $_SESSION['user_id'];
$currentSemester = $_POST['current_semester'];
$currentAcademicYear = $_POST['current_academic_year'];

// Establish database connection (replace with your database credentials)
include_once 'pd_str/pd_str.php';

$query = "SELECT id, course_name FROM courses";
$statement = $pdo->query($query);
$courses = $statement->fetchAll(PDO::FETCH_ASSOC);


$queryCheck = "SELECT ca.course_id, c.course_name 
               FROM course_applications ca
               INNER JOIN courses c ON ca.course_id = c.id
               WHERE ca.user_id = $user_id";
// Example query to check if the user has any course applications
$statementCheck = $pdo->prepare($queryCheck);
$statementCheck->execute();
$result = $statementCheck->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $courseId = $result['course_id'];   
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $userId = $_SESSION['user_id'];
    // Get course initials based on course ID
    $queryCourse = "SELECT course_initials FROM courses WHERE id = :courseId";
    $statementCourse = $pdo->prepare($queryCourse);
    $statementCourse->bindParam(':courseId', $courseId);
    $statementCourse->execute();
    $courseDetails = $statementCourse->fetch(PDO::FETCH_ASSOC);

    if ($courseDetails) {
        $courseInitials = $courseDetails['course_initials'];

        // Get current year
        $currentYear = date('Y');

        // Get the current count of enrolled students for the course in the current year
        $queryCount = "SELECT COUNT(*) AS count FROM enrollment 
                       WHERE course_id = :courseId 
                       ";
        $statementCount = $pdo->prepare($queryCount);
        $statementCount->bindParam(':courseId', $courseId);
        //$statementCount->bindParam(':currentYear', $currentYear);
        $statementCount->execute();
        $enrollmentCount = $statementCount->fetch(PDO::FETCH_ASSOC);

        // Increment the count for the new student
        $studentCount = $enrollmentCount['count'] + 1;

        // Generate student_registration_number in the format: MA/(course_initials)/(currentYear)/(studentCount)
        $studentRegistrationNumber = "MAC/{$courseInitials}/{$currentAcademicYear}/{$studentCount}";

        // Rest of your enrollment logic...
        // Insert the enrollment record with $studentRegistrationNumber
        $query = "INSERT INTO enrollment (user_id, course_id, student_registration_number, current_semester, current_academic_year)
              VALUES (:userId, :courseId, :studentRegNumber, :currentSemester, :currentAcademicYear)";
    
    // Prepare and execute the query
    $statement = $pdo->prepare($query);
    $statement->bindParam(':userId', $userId);
    $statement->bindParam(':courseId', $courseId);
    $statement->bindParam(':studentRegNumber', $studentRegistrationNumber);
    $statement->bindParam(':currentSemester', $currentSemester);
    $statement->bindParam(':currentAcademicYear', $currentAcademicYear);
    
    $success = $statement->execute();

    if ($success) {
        echo "You are enrolled Successfully";
         header('Location: dashboard.php');
        
    } else {
        echo "Failed to enroll user.";
        
    }
}
}
?>
