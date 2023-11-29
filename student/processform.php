<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $to_email = 'training@moriahaerocollege.ac.ug';

    // Fetch form data
    $pdfFile = $_FILES['pdfFile']['tmp_name'];
    $pdfFileName = $_FILES['pdfFile']['name'];

    // Fetch other form fields (same as fetched in the form)
    $userData = $_POST;

    // Compose email content
    $subject = 'Course Application Details';
    $message = "Form Data:\n";
    foreach ($userData as $key => $value) {
        $message .= "$key: $value\n";
    }

    // Email headers
    $headers = "From: training@moriahaerocollege.ac.ug\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: multipart/mixed; boundary=boundary1234\r\n";

    // Read PDF file content
    $file_content = file_get_contents($pdfFile);

    // Attach PDF file to the email
    $base64_pdf = chunk_split(base64_encode($file_content));

    // Email content
    $body = "--boundary1234\r\n";
    $body .= "Content-Type: text/plain; charset=us-ascii\r\n";
    $body .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $body .= "$message\r\n";
    $body .= "--boundary1234\r\n";
    $body .= "Content-Type: application/pdf; name=\"$pdfFileName\"\r\n";
    $body .= "Content-Disposition: attachment; filename=\"$pdfFileName\"\r\n";
    $body .= "Content-Transfer-Encoding: base64\r\n";
    $body .= "\r\n$base64_pdf\r\n";
    $body .= "--boundary1234--";

    // Send email
    if (mail($to_email, $subject, $body, $headers)) {
        //$queryConfirmation = "INSERT INTO course_confirmation (user_id, course_id,confirm) VALUES (?, ?,?)";
        $queryConfirmation = "UPDATE `course_applications` SET `is_confirmed` = 1 WHERE course_applications.id = $user_id";
       // $queryConfirmation = "UPDATE course_confirmation SET confirm = 1 WHERE user_id = $user_id";
        $statementConfirmation = $pdo->prepare($queryConfirmation);
        $statementConfirmation->execute([$user_id]);
        echo "Email sent successfully!";

       




    } else {
        echo "Email sending failed!";
    }
}
?>
