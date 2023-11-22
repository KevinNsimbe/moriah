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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Link to your separate CSS file -->
</head>

<body>
    <header>
        <!-- Header content -->
        <h1>Welcome, <?php echo $user_name; ?></h1>
        <!-- Hamburger menu icon for mobile -->
        <div class="menu-icon">&#9776;</div>
    </header>

    <div class="container">
        <!-- Navigation bar on the left -->
        <nav>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="academic_info.php">Academic Information</a></li>
                <li><a href="courses.php">Courses</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="timetable.php">Timetable</a></li>
                <li><a href="finance.php">Finance</a></li>
            </ul>
        </nav>

        <!-- Dashboard content on the right -->
        <div class="main-content">
            <section>
                <!-- Your dashboard content -->
                <p>This is the dashboard. Hello, <?php echo $user_name; ?>!</p>
                <!-- Other dashboard content -->
            </section>
        </div>
    </div>

    <!-- Your JavaScript scripts -->
    <script>
        // JavaScript to handle the click event on the menu icon
        document.addEventListener('DOMContentLoaded', function () {
            const menuIcon = document.querySelector('.menu-icon');
            const nav = document.querySelector('nav');

            menuIcon.addEventListener('click', function () {
                nav.classList.toggle('active'); // Toggle the 'active' class on click
            });
        });
    </script>
</body>
</html>

