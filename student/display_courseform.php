<!DOCTYPE html>
<html>
<head>
    <!-- <title>Course Application Details</title> -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <?php
    // Assuming $user_id is available after the user logs in or through session data
   // $pdo = new PDO('mysql:host=localhost;dbname=your_database', 'username', 'password');

   $queryCheckPending = "SELECT firstname, lastname, email, phone_number, date_of_birth FROM course_applications WHERE user_id = ? AND is_confirmed = 0";
   
   // $queryCheckPending = "SELECT * FROM course_applications WHERE user_id = ? AND is_confirmed = 0";
    $statementCheckPending = $pdo->prepare($queryCheckPending);
    $statementCheckPending->execute([$user_id]);

    $pendingApplication = $statementCheckPending->fetch(PDO::FETCH_ASSOC);

    if ($pendingApplication) {
        echo "<h2>Your Course Application Details</h2>";
        echo "<form>";
        foreach ($pendingApplication as $column => $value) {
            echo "<label for='$column'>$column:</label><br>";
            echo "<input type='text' id='$column' name='$column' value='$value' readonly><br><br>";
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    } else {
        echo "Your application is confirmed!";
        // Or display another message for confirmed applications
    }
    ?>

</body>
</html>
