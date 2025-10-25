<?php

require __DIR__.'/../../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;


// Ini adalah penggabungan string yang benar
$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$mail = new PHPMailer(true);
//ga bisa pake getenv
// var_dump(getenv('SMTP_HOST'));
// var_dump(getenv('SMTP_PORT'));
// var_dump(getenv('SMTP_USER'));
// var_dump(getenv('SMTP_PASS'));

// var_dump($_ENV['SMTP_HOST']);
// var_dump($_ENV['SMTP_PORT']);
// var_dump($_ENV['SMTP_USER']);
// var_dump($_ENV['SMTP_PASS']);

try {
    $mail->isSMTP();
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->Host = $_ENV['SMTP_HOST'];
    $mail->Port = $_ENV['SMTP_PORT'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_USER']; // ganti email kamu
    $mail->Password = $_ENV['SMTP_PASS'];   // gunakan App Password, bukan password Gmail biasa
    $mail->setFrom($_ENV['SMTP_USER'], 'Mailer Docker');
    $mail->addAddress('kmuradiab@gmail.com'); // email tujuan

    $mail->isHTML(false);
    $mail->Subject = 'Test PHPMailer from Docker';
    $mail->Body    = 'Berhasil! Email ini dikirim lewat PHPMailer di dalam Docker.';
    $mail->AltBody = 'Berhasil! Email ini dikirim lewat PHPMailer di dalam Docker.';

    $mail->send();
    echo '✅ Email berhasil dikirim!';
} catch (Exception $e) {
    echo "❌ Email gagal dikirim. Error: {$mail->ErrorInfo}";
}
