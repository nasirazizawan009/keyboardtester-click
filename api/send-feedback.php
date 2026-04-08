<?php
header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');
    $honeypot = trim($_POST['website'] ?? '');

    if ($honeypot !== '') {
        echo json_encode(['status' => 'error', 'message' => 'Invalid submission.']);
        exit;
    }

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit;
    }

    $nameSafe = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $emailSafe = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
    $messageSafe = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    $emailHeaderSafe = str_replace(["\r", "\n"], ' ', $email);

    // Recipient email
    $to = "nasirazizawan@gmail.com";
    $subject = "New Feedback from KeyboardTester.click";
    $body = "Name: $nameSafe\nEmail: $emailSafe\n\nMessage:\n$messageSafe";
    $headers = "From: no-reply@keyboardtester.click\r\n" .
               "Reply-To: $emailHeaderSafe\r\n" .
               "Content-Type: text/plain; charset=UTF-8\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send email. Please try again.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
exit;
?>
