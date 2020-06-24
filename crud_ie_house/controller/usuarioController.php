<?php

session_start();

require_once("../model/UsuarioModel.php");
require_once("../include/Usuario.php");

$usuarioModel = new UsuarioModel();

if ($_POST["query"] == 1) {
    $listadoUsuarios = $usuarioModel->getUsuarios();
    echo json_encode($listadoUsuarios);
} else if ($_POST["query"] == 7) {
    $tablaBombilloUsusario = $usuarioModel->getBombilloUsuario($_SESSION["id_usuario"]);
    echo json_encode($tablaBombilloUsusario);
}

?>