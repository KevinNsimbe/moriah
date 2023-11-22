<?php
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}

// Display the logged-in student's name
$user_name = $_SESSION['user_name'];
?>



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



<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Hovers and focus using the has() relational pseudo-class</title>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Bebas+Neue&amp;family=Figtree:wght@300;600&amp;display=swap'>
  <link rel="stylesheet" href="css/styles_courses.css">

</head>
<body>
<!-- partial:index.partial.html -->
<section class="articles">
  <article>
    <div class="article-wrapper">
      <figure>
        <img src="img/course1.png" alt="" />
      </figure>
      <div class="article-body">
        <h2>Flight Operation Oficer</h2>
        <p>
        The flight operations officer’s course is delivered in 2 phases, 60%, approximately 6 months of
the course comprises class room training and 40% taking 3 months, comprises of practical
training in active airline operations.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is course</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="img/course2.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>AIR TRAFFIC CONTROL</h2>
        <p>
        The main objective for the ATC course is to deliver training that will enable the trainees to
be able to :<br>
a. Successfully undergo the examination for the licence and appropriate ratings
prescribed by the CAA.<br>
b. Effectively and safely deliver air traffic control and related tasks.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is course</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
  <article>

    <div class="article-wrapper">
      <figure>
        <img src="img/course3.jpg" alt="" />
      </figure>
      <div class="article-body">
        <h2>AREA RADAR/ SURVEILLANCE-14 WEEKS</h2>
        <p>
        Identify the components, physics, features and operational aspects of primary and secondary radar
systems
 Identify and understand radar tracking terms. List components, functions of automated radar
tracking systems and understand the operational aspects of each.
        </p>
        <a href="#" class="read-more">
          Read more <span class="sr-only">about this is some title</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </div>
  </article>
</section>
<!-- partial -->
  
</body>
</html>
