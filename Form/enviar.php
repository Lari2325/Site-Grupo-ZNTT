<?php
header("Content-type: text/html; charset=utf-8");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$mail = new PHPMailer(true);

$nome = filter_input(INPUT_POST, 'nome');
$email = filter_input(INPUT_POST, 'email');
$telefone = filter_input(INPUT_POST, 'telefone');
$assunto = filter_input(INPUT_POST, 'assunto');
$mensagem = filter_input(INPUT_POST, 'mensagem');
    
$emailConstruido = "<b>Contato do website:</b><br><b>
Nome:</b> $nome<br><b>
E-mail:</b> $email<br><b>
Telefone:</b> $telefone<br><b>
Assunto:</b> $assunto<br><b>
Mensagem:</b> $mensagem";

try {
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = '92f784d47af185';
    $mail->Password = '67cab1d3a29580';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Habilita TLS

    // Configurações do e-mail
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('larissazntt@gmail.com', 'Grupo ZNTT');
    $mail->addAddress('larissazntt@gmail.com', 'Grupo ZNTT'); 

    $mail->isHTML(true);
    $mail->Subject = 'Grupo ZNTT - Website';
    $mail->Body    = $emailConstruido;

    if ($mail->send()) {
        header('Location: ../contato?formulario=success');
    } else {
        header('Location: ../contato?formulario=error');
    }
} catch (Exception $e) {
    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";
}