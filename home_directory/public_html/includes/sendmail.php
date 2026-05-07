<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'includes/phpmailer/src/Exception.php';
require 'includes/phpmailer/src/PHPMailer.php';
require 'includes/phpmailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host       = 'smtp.your-domain.co.za'; // Xneelo SMTP
    $mail->SMTPAuth   = true;
    $mail->Username   = 'your-email@your-domain.co.za';
    $mail->Password   = 'your-email-password'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Use ENCRYPTION_SMTPS for SSL
    $mail->Port       = 587; // Use 465 for SSL

    // Recipients
    $mail->setFrom('your-email@your-domain.co.za', 'Website Contact');
    $mail->addAddress('recipient@example.com', 'Recipient Name');
    $mail->addReplyTo('your-email@your-domain.co.za', 'Website');

    // Email content
    $mail->isHTML(true);
    $mail->Subject = 'Test Email from Xneelo';
    $mail->Body    = '<p>This is a test email sent via Xneelo SMTP.</p>';

    if ($mail->send()) {
        echo "Email sent successfully!";
    } else {
        echo "Error: " . $mail->ErrorInfo;
    }
} catch (Exception $e) {
    echo "Mailer Error: {$mail->ErrorInfo}";
}
?>
