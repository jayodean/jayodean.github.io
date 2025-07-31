<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Or use require 'PHPMailer/src/PHPMailer.php' if manual

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'your_email@gmail.com';      // Replace with your Gmail
        $mail->Password   = 'your_app_password';         // Use Gmail App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Recipients
        $mail->setFrom($email, $name);
        $mail->addAddress('your_email@gmail.com', 'James Dev'); // Your receiving email

        // Content
        $mail->isHTML(true);
        $mail->Subject = 'New Contact Form Message';
        $mail->Body    = "
            <h3>Contact Form Submission</h3>
            <p><strong>Name:</strong> {$name}</p>
            <p><strong>Email:</strong> {$email}</p>
            <p><strong>Message:</strong><br>{$message}</p>
        ";

        $mail->send();
        echo \"<script>alert('Message sent successfully.');window.location='form.php';</script>\";
    } catch (Exception $e) {
        echo \"Message could not be sent. Mailer Error: {$mail->ErrorInfo}\";
    }
} else {
    header('Location: form.php');
    exit;
}
