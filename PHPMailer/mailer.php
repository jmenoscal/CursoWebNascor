<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Inicio
$mail = new PHPMailer(true);

try {
   // Configuracion SMTP
   $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
   $mail->isSMTP();                                               // Activar envio SMTP
   $mail->Host  = 'smtp-es.securemail.pro';                     // Servidor SMTP
   $mail->SMTPAuth  = true;                                       // Identificacion SMTP
   $mail->Username  = 'cursonascor@cartaclic.es';                  // Usuario SMTP
   $mail->Password  = 'cursoNascor***-';              // Contraseña SMTP
   $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
   $mail->Port  = 587;
   $mail->setFrom('cursonascor@cartaclic.es', 'Joel');                // Remitente del correo

   // Destinatarios
   $mail->addAddress('jmenoscal@gmail.com', 'Joel');  // Email y nombre del destinatario

   // Contenido del correo
   $mail->isHTML(true);
   $mail->Subject = 'Asunto del correo';
   $mail->Body  = 'Contenido del correo <b>en HTML!</b>';
   $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
   $mail->send();
   echo 'El mensaje se ha enviado';
} catch (Exception $e) {
   echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
}

