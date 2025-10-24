<?php
require './vendor/phpmailer';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'shidathalah@gmail.com'; // ganti email kamu
    $mail->Password = 'your_app_password';   // gunakan App Password, bukan password Gmail biasa
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    $mail->setFrom('shidathalah@gmail.com', 'Mailer Docker');
    $mail->addAddress('kmuradiab@gmail.com'); // email tujuan

    $mail->isHTML(true);
    $mail->Subject = 'Test PHPMailer from Docker';
    $mail->Body    = '<b>Berhasil!</b> Email ini dikirim lewat PHPMailer di dalam Docker.';
    $mail->AltBody = 'Berhasil! Email ini dikirim lewat PHPMailer di dalam Docker.';

    $mail->send();
    echo '✅ Email berhasil dikirim!';
} catch (Exception $e) {
    echo "❌ Email gagal dikirim. Error: {$mail->ErrorInfo}";
}
