<?php include 'includes/functions.php'; ?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Manually include PHPMailer files
require 'includes/phpmailer/src/Exception.php';
require 'includes/phpmailer/src/PHPMailer.php';
require 'includes/phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }

    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = ''; // Xneelo SMTP server
        $mail->SMTPAuth   = true;
        $mail->Username   = ''; // Your Xneelo email
        $mail->Password   = '';  // Email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use TLS for port 587
        $mail->Port       = 465; // Or use 465 with SSL

        // Email Headers
        $mail->setFrom('', 'Website Contact Form');
        $mail->addAddress('', 'Admin'); // Recipient email
        $mail->addReplyTo($email, $name);

        // Email Content
        $mail->isHTML(false);
        $mail->Subject = "New Contact Form Submission from $name";
        $mail->Body    = "You have received a new message from $name ($email):\n\n$message\n\nSent on: " . date("Y-m-d H:i:s");

        // Send the Email
        if ($mail->send()) {
            echo "Email sent successfully!";
        } else {
            echo "Failed to send email.";
        }
    } catch (Exception $e) {
        echo "Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    header("Location: contact.php");
    exit;
}
?>

