<?php

    require_once("../../model/BombilloModel.php");
    $bombilloModel = new BombilloModel();

    $id_bombillo = (int) $_POST["id_bombillo"];
    
    $tabla_bombillo_usuario = $bombilloModel->getTableBombilloUsuario($id_bombillo);
    if (!empty($tabla_bombillo_usuario)) {
        echo json_encode($tabla_bombillo_usuario);
    } else {
        echo json_encode(false);
    }

?>