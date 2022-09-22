<?php
require_once('src/PHPMailer.php');
require_once('src/SMTP.php');
require_once('src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ((isset($_POST['email']) && !empty(trim($_POST['email']))) && (isset($_POST['mensagem']) && !empty(trim($_POST['mensagem'])))) {

  $nome = !empty($_POST['nome']) ? $_POST['nome'] : 'Não Informado';
  $email = $_POST['email'];
  $assunto = !empty($_POST['assunto']) ? utf8_decode($_POST['assunto']) : 'Não Informado';
  $Mensagem = $_POST['mensagem'];
  $data = data('d/m/Y H:i:s');

  $mail = new PHPMailer();
  $mail->isSMTP();
  $mail->Host = 'smtp.gmail.com';
  $mail->SMTPAuth = true;
  $mail->Username = 'Sabrinadeo740@gmail.com';
  $mail->Password = 'calopisita';
  $mail->Port = 587;

  $mail->setFrom('Sabrinadeo740@gmail.com');
  $mail->addAddress('Sabrinadeo740@gmail.com');

  $mail->isHTML(true);
  $mail->Subject = $assunto;
  $mail->Body = "Nome: {$nome}<br> Email: {$email} <br> Mensagem: {$mensagem} <br> Data/hora: {$data}";

  if($mail->send()) {
    echo 'Email enviado com sucesso.';
  } else {
    echo 'Email nao enviado.';
  }
  else {
    echo 'Não enviado: Informar o e-mail e a mensagem.';
  }
}
?>
