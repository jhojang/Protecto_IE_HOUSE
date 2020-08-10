<?php

require_once("../../model/BombilloModel.php");
$bombilloModel = new BombilloModel();

$nombre_bombillo = $_POST["set_nombre_bombillo"];
$id_cuarto = (int) $_POST["set_cuarto_bombillo"];
$usuarios = $_POST["usuario"];

if (trim($nombre_bombillo) == "" || trim($id_cuarto) == "") {
    echo json_encode("Por favor ingrese el nombre del bombillo");
} else {
    $existencia = $bombilloModel->getBombilloByName($nombre_bombillo);
    if (!empty($existencia)) {
    echo json_encode(false);
    } else {
        $bombilloModel->insertBombillo($nombre_bombillo, $id_cuarto);
        $existencia2 = $bombilloModel->getBombilloByName($nombre_bombillo);
        
        for ($i = 0; $i < count($usuarios); $i++) {
            $bombilloModel->insertIntermediaBombilloUsuario($existencia2["id_bombillo"], $usuarios[$i]);
        }
        echo json_encode(true);
    }
}





?>