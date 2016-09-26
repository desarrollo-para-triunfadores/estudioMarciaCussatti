<?php

require_once('PHPMailer-master/class.phpmailer.php');
require_once('PHPMailer-master/class.smtp.php');

$name       = $_POST['name'];
$from       = $_POST['email'];
$subject    = $_POST['subject'];
$message    = $_POST['message'];

$correo = new PHPMailer();
$correo->IsSMTP();
$correo->SMTPAuth = true;
$correo->SMTPSecure = 'tls';
$correo->Host = "smtp.gmail.com";
$correo->Port = 587;
$correo->Username   = "CORREO DE MARCIA O LO QUE SEA";
$correo->Password   = "CONTRASEÑA DE ESO DE ARRIBA";
$correo->SetFrom("m.cussatti@gmail.com", "Robot");
$correo->AddAddress($from , $name);
$correo->Subject = $subject;
$correo->MsgHTML($message);

if(!$correo->Send()) {
  //echo  "Hubo un error: " . $correo->ErrorInfo;
   echo '<p class="text-warning">Hubo un problema al eviar su mensaje. Por favor utilice otra de manera de contactarse con nosotros. Disculpe las molestias.</p>';
} else {
   echo '<p class="text-success">Gracias por ponerse en contacto con nosotros. Tan pronto como sea posible nos pondremos en contacto con usted.</p>';
}
