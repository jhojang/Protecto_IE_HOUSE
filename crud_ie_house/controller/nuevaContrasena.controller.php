<?php

session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: ../sesion/sesion.php");
}

require_once("../include/Usuario.php");
require_once("../model/UsuarioModel.php");
$usuarioModel = new UsuarioModel();



if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
        $resultSet = $usuarioModel->getUsuarioByToken($token);

        if (!empty($resultSet)) {
            $email = $resultSet['correo_usuario'];
            echo $resultSet['correo_usuario'];
            include "../view/nuevaContrasena.php";
            $errores = "";
            if (isset($_POST['confirmar'])) {
                $nuevoPass = $_POST['nuevoPass'];
                $nuevoPassR = $_POST['nuevoPassR'];

                if (trim($nuevoPass) == "" || trim($nuevoPassR) == "") {
                    $errores = "Llene todos los campos";
                } else if (trim($nuevoPass) !==  trim($nuevoPassR)) {
                    $errores = "Las contraseñas no coinciden";
                } else {

                    $passEncriptado = hash("sha512", $nuevoPass);

                    $usuarioClass = new Usuario(null, null, null, $email, $passEncriptado);
                    $usuarioModel->updatePasswordTokenByEmail($usuarioClass);

                    header("Location: ../view/contrasenaRecuperada.php");
                }
            }
        } else {
            header('Location: ../index.php');
        }


} 



?>