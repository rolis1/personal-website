<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST["name"]);
    $email   = htmlspecialchars($_POST["email"]);
    $subject = htmlspecialchars($_POST["subject"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);
    
    try {
        // Konfigurasi SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'rolisliu0@gmail.com';
        $mail->Password   = 'abcd efgh ijkl mnop'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Pengirim & Penerima
        $mail->setFrom($email, $name);
        $mail->addAddress('your-email@gmail.com');
        
        // Konten email
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<strong>From:</strong> $name ($email)<br><br><strong>Message:</strong><br>" . nl2br($message);

        $mail->send();
        echo "<script>alert('Message sent successfully!'); window.location.href='index.html';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Message could not be sent. Error: {$mail->ErrorInfo}'); window.location.href='index.html';</script>";
    }
}
?>
