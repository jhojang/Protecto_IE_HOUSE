<?php

require_once("../model/UsuarioModel.php");
require_once("../include/Usuario.php");

$usuarioModel = new UsuarioModel();

$usuario = filter_var($_POST["usuario"], FILTER_SANITIZE_STRING);
$nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
$apellido = filter_var($_POST["apellido"], FILTER_SANITIZE_STRING);
$email = $_POST["email"];
$pass1 = $_POST["pass1"];
$pass2 = $_POST["pass2"];


if (trim($usuario) == "" || trim($nombre) == "" || trim($apellido) == "" || trim($email) == "" || trim($pass1) == "" || trim($pass2) == "") {
    json_encode("error");
} else {
    if ($pass1 != $pass2) {
        json_encode("error");
    } else {

        $passEncriptado = hash("sha512", $pass1);

        $usuarioClass = new Usuario($usuario, $nombre, $apellido, $email, $passEncriptado);
        $resultSetUsuario = $usuarioModel->getByUsuario($usuarioClass);
        $resultSetEmail = $usuarioModel->getByEmail($usuarioClass);

        if (!empty($resultSetUsuario)) {
            echo json_encode(0);
        } else if (!empty($resultSetEmail)) {
            echo json_encode(3);
        } else {
            $usuarioModel->insertUsuario($usuarioClass);
            echo json_encode("exito");
        }
    }
    
}

?>