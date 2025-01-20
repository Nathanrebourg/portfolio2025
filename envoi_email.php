<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    error_log("POST request received");
    // Retrieve email
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    error_log("Email: $email");

    // Validate email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        error_log("Email is valid");
        $portfolioLink = "https://drive.google.com/drive/u/0/folders/1WVnshN51DxcjQ2zfqdsz18StRyXt3XnE";

        $subject = "Your Portfolio";
        $message = "Hello,\n\nThank you for your interest! You can view my portfolio by clicking the link below:\n\n$portfolioLink\n\nBest regards,\n[Your Name]";

        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host = 'smtp.example.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true;
            $mail->Username = 'your-email@example.com'; // SMTP username
            $mail->Password = 'your-email-password'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('your-email@example.com', 'Your Name');
            $mail->addAddress($email);

            // Content
            $mail->isHTML(false);
            $mail->Subject = $subject;
            $mail->Body = $message;

            $mail->send();
            error_log("Mail sent successfully");
            echo "The email was sent successfully!";
        } catch (Exception $e) {
            error_log("Mail function failed: {$mail->ErrorInfo}");
            echo "An error occurred while sending the email.";
        }
    } else {
        error_log("Invalid email address");
        echo "Invalid email address.";
    }
} else {
    error_log("Invalid request method: " . $_SERVER["REQUEST_METHOD"]);
    echo "Method not allowed.";
}
?>