<?php
session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: index.php');
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
    <link rel="stylesheet" href="styles.css"> <!-- Link to your separate CSS file -->
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
            <li><a href="home.php" data-page="home.php" class="nav-link">Home</a></li>
            <li><a href="students.php" data-page="students.php" class="nav-link">New Enrolles</a></li>
            <li><a href="courses.php" data-page="courses.php" class="nav-link">Confirmed Enrolles</a></li>
            <li><a href="newapplication.php" data-page="newapplication.php" class="nav-link">New Applications <b class="count">
                <?php
                $pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');
                
                function countAllApplication($pdo){
                $querystatment = $pdo->query("SELECT COUNT(*) as total FROM course_applications where is_confirmed = 0");
                $result = $querystatment->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
                }
                $totalApplications = countAllApplication($pdo);
                echo $totalApplications;
                ?></b>
            </a></li>
            <li><a href="timetable.php" data-page="timetable.php" class="nav-link">Confirmed Applications</a></li>
            <li><a href="underreview.php" data-page="underreview.php" class="nav-link">Applications Under Review
            <?php
                $pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');
                
                function countReviewApplications($pdo){
                $querystatment = $pdo->query("SELECT COUNT(*) as total FROM course_applications where is_confirmed = 1");
                $result = $querystatment->fetch(PDO::FETCH_ASSOC);
                return $result['total'];
                }
                $totalReviewApplications = countReviewApplications($pdo);
                echo $totalReviewApplications;
                ?></b>

            
            </a></li>
            <li><a href="pending.php" data-page="pending.php" class="nav-link">Pending Applications</a></li>
            <li><a href="students.php" data-page="students.php" class="nav-link">Students</a></li>
            <li><a href="courses.php" data-page="courses.php" class="nav-link">Instructors</a></li>
            <li><a href="results.php" data-page="results.php" class="nav-link">Set Semseter</a></li>
            <li><a href="timetable.php" data-page="timetable.php" class="nav-link">Courses</a></li>
            <li><a href="finance.php" data-page="finance.php" class="nav-link">Finance</a></li>
            <li><a href="finance.php" data-page="finance.php" class="nav-link">Academics</a></li>
            <li><a href="finance.php" data-page="finance.php" class="nav-link">Logout</a></li>
            </ul>
        </nav>

        <!-- Dashboard content on the right -->
        <div class="main-content" id="dashboard-content">
            <section>
                <!-- Your dashboard content -->
                 <?php 
            
                //include_once 'home.php';
                ?></p>

                <!-- Other dashboard content -->
            </section>
        </div>
    </div>

    <!-- Your JavaScript scripts -->
    <script>
        // JavaScript to handle the click event on navigation links
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('.nav-link');
            const dashboardContent = document.getElementById('dashboard-content');

            navLinks.forEach(function (link) {
                link.addEventListener('click', function (e) {
                    e.preventDefault(); // Prevent default link behavior

                    const page = this.getAttribute('data-page');
                    loadPage(page);
                });
            });

            function loadPage(page) {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            dashboardContent.innerHTML = xhr.responseText;
                        } else {
                            dashboardContent.innerHTML = 'Error loading page.';
                        }
                    }
                };
                xhr.open('GET', page, true);
                xhr.send();
            }
        });
    </script>
</body>
</html>

