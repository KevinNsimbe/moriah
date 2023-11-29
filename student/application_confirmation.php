<?php
// Assuming $user_id is available after the user logs in or through session data
//$pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

$queryCheckConfirmation = "SELECT COUNT(*) AS confirmation_count FROM course_applications WHERE user_id = ? AND is_confirmed = 1";
$statementCheckConfirmation = $pdo->prepare($queryCheckConfirmation);
$statementCheckConfirmation->execute([$user_id]);

$resultConfirmation = $statementCheckConfirmation->fetch(PDO::FETCH_ASSOC);

if ($resultConfirmation && $resultConfirmation['confirmation_count'] > 0) {
    echo "Your application is under review!<br>Check the system after 15 minutes to proceed with enrollment";
} else {
    echo "Your application is pending for confirmation.";
    echo "<br>Please print the application form and attach the application fee payslip and bring them to office<hr>";
    echo '<table><tr><th>Application Fee</th><th>Payment Details</tr>
    <tr><td>100,000</td><td>6030502000172 <br> Post Bank Entebbe Branch</td></tr></table><hr>';

    include_once 'display_courseform.php';

}
?>
