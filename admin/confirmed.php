<?php

session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: index.php');
    exit();
}
// Establish database connection (replace with your database credentials)
$pdo = new PDO('mysql:host=localhost;dbname=moriahesch', 'root', '');

// Replace 'your_user_id' with the actual user ID for whom you want to fetch the course information
$userID = $_SESSION['user_id'];

// SQL query to fetch user's course information
$query = "SELECT a.user_id,a.id, a.firstname, c.course_name, a.lastname, a.Gender, a.email, a.intake_date, a.nationality, a.phone_number
 FROM course_applications a 
JOIN courses c ON a.course_id = c.id
where a.is_confirmed=2";


$statement = $pdo->query($query);
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmed Applications</title>
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body>
    <h1>Confirmed User Applications</h1>
    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Course Name</th>
                <th>Intake Date</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Tell</th>
                <th>Nationality</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
            <?php foreach ($results as $row) : ?>
                <tr>
                <td><?php echo $row['firstname']; ?></td>
                    <td><?php echo $row['lastname']; ?></td>
                    <td><?php echo $row['course_name']; ?></td>
                    <td><?php echo $row['intake_date']; ?></td>
                    <td><?php echo $row['Gender']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone_number']; ?></td>
                    <td><?php echo $row['nationality']; ?></td>
                   
                       <td><a href="#" class="view-link" data-application-id="<?php echo $row['user_id']; ?>">Enroll</a></td>
              
                  
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<!-- Add this script at the end of your HTML body -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // Handle click event for "View" links
    $('.view-link').on('click', function(event) {
        event.preventDefault();
        
        // Get the application ID from data attribute
        var applicationID = $(this).data('application-id');
        
        // AJAX request to load view_application.php content
        $.ajax({
            type: 'GET',
            url: 'view_application.php?application_id=' + applicationID,
            success: function(response) {
                // Display the content within a specific element in your dashboard (e.g., a div)
                $('#view-application-content').html(response);
            },
            error: function() {
                alert('Error loading application details.');
            }
        });
    });
});
</script>

</html>
