<!DOCTYPE html>
<html>
<head>
    <title>Course Application Details</title>
    <link rel="stylesheet" href="css/course_pendingform.css">
</head>
<body>

    <?php
    // Assuming $user_id is available after the user logs in or through session data
   // $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

    $queryCheckPending = "SELECT course_date,intake_date,firstname, lastname, gender, email, 
    phone_number, date_of_birth,place_of_birth,nationality,mother_tongue,id_number,
    parent_title,parent_name,parent_address,parent_town,parent_mobile_number,
    parent_email,sponsor,English_speaking_level FROM course_applications WHERE user_id = ? AND is_confirmed = 0";
    $statementCheckPending = $pdo->prepare($queryCheckPending);
    $statementCheckPending->execute([$user_id]);

    $pendingApplication = $statementCheckPending->fetch(PDO::FETCH_ASSOC);

    if ($pendingApplication) {

        echo "Your application is pending for confirmation.";
    echo "<br>Please print the application form and attach the application fee payslip and bring them to office<hr>";
    echo '<table><tr><th>Application Fee</th><th>Payment Details</tr>
    <tr><td>100,000</td><td>6030502000172 <br> Post Bank Entebbe Branch</td></tr></table><hr>';
        echo "<div class='form-container'>";
        echo "<h2>Your Course Application Details<br> <p>Course : {$result['course_name']}.</p></h2>";
        echo "<form class='two-column-form' action='processform.php' method='POST' enctype='multipart/form-data'>";
        
       // echo "<form action="file_upload.php" method='POST' class='two-column-form'>";
        
        // Split fetched fields into two columns
        $fieldsCount = count($pendingApplication);
        $halfFieldsCount = ceil($fieldsCount / 2);
        $currentField = 0;
        
        echo "<div class='form-column'>";
        foreach ($pendingApplication as $column => $value) {
            echo "<div class='form-group'>";
            echo "<label for='$column'>$column:</label>";
            echo "<input type='text' id='$column' name='$column' value='$value' readonly>";
            echo "</div>";
            $currentField++;
            if ($currentField == $halfFieldsCount) {
                echo "</div><div class='form-column'>";
            }
        }
        echo "</div>"; // Close the last column
        include_once 'file_upload.php';
        echo "<input type='submit' value='Submit' class='submit-btn'>";
        echo "</form>";
        echo "</div>";
    } else {
        echo "Your application is confirmed!<br>Please Enroll for a new Semester";
        include_once 'enrollment.php';
        // Or display another message for confirmed applications
    }
    ?>

</body>
</html>
