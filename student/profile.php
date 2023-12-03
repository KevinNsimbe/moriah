<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link rel="stylesheet" href="css/course_pendingform.css">
</head>
<body>

    <?php
    // Assuming $user_id is available after the user logs in or through session data
    session_start();
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header('Location: ../index.php');
    exit();
}
    include_once 'pd_str/pd_str.php';
    $user_id = $_SESSION['user_id'];
    $queryCheckPending = "SELECT course_date,intake_date,firstname, lastname, gender, email, 
    phone_number, date_of_birth,place_of_birth,nationality,mother_tongue,id_number,
    parent_title,parent_name,parent_address,parent_town,parent_mobile_number,
    parent_email,sponsor,English_speaking_level FROM course_applications WHERE user_id = ?";
    $statementCheckPending = $pdo->prepare($queryCheckPending);
    $statementCheckPending->execute([$user_id]);

    $pendingApplication = $statementCheckPending->fetch(PDO::FETCH_ASSOC);

    if ($pendingApplication) {

        echo "<div class='form-container'>";
        echo "<h2>Profile</h2>";
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
        echo "</form>";
        echo "</div>";
    } 
    else {

        
        
       // include_once 'enrollment.php';
        echo 'Your not enrolled yet';
        // Or display another message for confirmed applications
    }
    ?>

</body>
</html>
