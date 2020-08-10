<?php

session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: ../sesion/sesion.php");
}

require_once("../include/Usuario.php");
require_once("../model/UsuarioModel.php");
$usuarioModel = new UsuarioModel();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

$email = $_POST['email'];

if (trim($email) == "") {
    echo json_encode("El campo no debe estar vacío");
} else {
    $usuarioClass = new Usuario(null, null, null, $email, null);
    
    $resultSet = $usuarioModel->getByEmail($usuarioClass);

    if (!empty($resultSet)) {
        
        $token = uniqid();
        $usuarioClass->setToken($token);
        $usuarioModel->setTokenByEmail($usuarioClass);

        $mail = new PHPMailer(true);

        try {
            //Configuración del servidor de email
            
            $mail->SMTPDebug = 0;                   // Con 2 se activa el debu, con 0 se desactiva
            $mail->isSMTP();                                            // Enviar usando SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Servidor SMTP
            $mail->SMTPAuth   = true;                                   // Activar la autenticación SMTP
            $mail->Username   = 'masanienter@gmail.com';                     // correo SMTP (direcció del correo)
            $mail->Password   = '1995elrey';                               // contraseña SMTP (contraseña del correo)
            $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Receptor
            $mail->setFrom('masanienter@gmail.com', 'IE House');
            $mail->addAddress($email); 

            $mail->isHTML(true);                                  // Establecer el formato HTML del email
            $mail->Subject = 'Restablecer contraseña';
            $mail->Body    = 'Clickea en el enlace para recuperar la contraseña: http://localhost/phpStudy/ie_house_repositorio/Protecto_IE_HOUSE/crud_ie_house/controller/nuevaContrasena.controller.php?token=' . $token;

            $mail->send();
            echo json_encode("Se ha enviado un enlace de recuperación a tu correo electrónico");
        } catch (Exception $e) {
            echo json_encode("No se pudo enviar el mensaje: {$mail->ErrorInfo}");
        }

    }
} 




?>