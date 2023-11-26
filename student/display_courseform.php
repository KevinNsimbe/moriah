<?php
// Assuming $user_id is available after the user logs in or through session data
//$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

$queryCheckPending = "SELECT * FROM course_applications WHERE user_id = ? AND is_confirmed = 0";
$statementCheckPending = $pdo->prepare($queryCheckPending);
$statementCheckPending->execute([$user_id]);

$pendingApplications = $statementCheckPending->fetchAll(PDO::FETCH_ASSOC);

if ($pendingApplications && count($pendingApplications) > 0) {
    echo "Your application is pending confirmation.<br><br>";
    
    // Display details of pending applications for the current user
    echo "<h2>Pending Application Details</h2>";
    echo "<table border='1'>";
    echo "<tr><th>First Name</th><th>Last Name</th><th>Gender</th><th>Phone Number</th><th>Email</th><th>Date of Birth</th><th>Place of Birth</th><th>Nationality</th><th>Mother Tongue</th><th>ID Number</th><th>Parent Title</th><th>Parent Name</th><th>Parent Address</th><th>Parent Town</th><th>Parent Mobile Number</th><th>Parent Email</th><th>Sponsor</th><th>Course Date</th><th>Intake Date</th><th>English Speaking Level</th><th>Confirmation Status</th></tr>";
    foreach ($pendingApplications as $application) {
        echo "<tr>";
        echo "<td>" . $application['firstname'] . "</td>";
        echo "<td>" . $application['lastname'] . "</td>";
        echo "<td>" . $application['Gender'] . "</td>";
        echo "<td>" . $application['phone_number'] . "</td>";
        echo "<td>" . $application['email'] . "</td>";
        // Display other columns similarly...
        echo "<td>Pending Confirmation</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "Your application is confirmed!";
    // Or display another message for confirmed applications
}
?>
