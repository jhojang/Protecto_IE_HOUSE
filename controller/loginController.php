<?php

session_start();
if (isset($_SESSION["usuario"])) {
    header("Location: ../sesion/sesion.php");
}

require_once("../model/UsuarioModel.php");
require_once("../include/Usuario.php");

$usuarioModel = new UsuarioModel();

$usuario = filter_var($_POST["usuario"], FILTER_SANITIZE_STRING);
$pass = $_POST["pass"];

if (trim($usuario) == "" || trim($pass) == "") {
    echo json_encode("Los campos están vacíos");
} else {

    $resultSet;
    $passEncriptado = hash("sha512", $pass);

    if (filter_var($usuario, FILTER_VALIDATE_EMAIL)) {
        $usuarioClass = new Usuario(null, null, null, $usuario, $passEncriptado);
        $resultSet = $usuarioModel->getByEmailPass($usuarioClass);
    } else {
        $usuarioClass = new Usuario($usuario, null, null, null, $passEncriptado);
        $resultSet = $usuarioModel->getByUsuarioPass($usuarioClass);
    }

    if (!empty($resultSet)) {
        $_SESSION["id_usuario"] = $resultSet[0]["id_usuario"];
        $_SESSION["usuario"] = $resultSet[0]["nombre_de_usuario"];
        $_SESSION["rol"] = $resultSet[0]["id_rol"];
        echo json_encode(true);
    } else {
        echo json_encode(false);
    }

}





/*if (trim($usuario) == "" || trim($nombre) == "" || trim($apellido) == "" || trim($email) == "" || trim($pass1) == "" || trim($pass2) == "") {
    json_encode("Los campos están vacíos");
} else {
    if ($pass1 != $pass2) {
        json_encode("Las contraseñas no coinciden");
    } else {

        $passEncriptado = hash("sha512", $pass1);

        $usuarioClass = new Usuario($usuario, $nombre, $apellido, $email, $passEncriptado);
        $resultSet = $usuarioModel->getUsuarioByName($usuarioClass);

        if (!empty($resultSet)) {
            echo json_encode(false);
        } else {
            $usuarioModel->insertUsuario($usuarioClass);
            echo json_encode(true);
        }
    }
    
}*/

?>