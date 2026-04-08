<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // Recipient email (hidden from user)
    $to = "nasirazizawan@gmail.com";
    $subject = "New Feedback from KeyboardTester.click";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";
    $headers = "From: no-reply@keyboardtester.click\r\nReply-To: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        // Redirect back with success message
        header("Location: feedback.php?status=success");
    } else {
        // Redirect back with error message
        header("Location: feedback.php?status=error");
    }
} else {
    // Redirect if accessed directly
    header("Location: feedback.php");
}
exit;
?>
