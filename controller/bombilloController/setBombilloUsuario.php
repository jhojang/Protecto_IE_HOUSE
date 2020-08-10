<?php

    require_once("../../model/BombilloModel.php");
    $bombilloModel = new BombilloModel();

    $id_bombillo = (int) $_POST["id_bombillo"];
    $id_usuario = (int) $_POST["id_usuario"];
    
    $bombilloModel->insertIntermediaBombilloUsuario($id_bombillo, $id_usuario);
    echo json_encode(true);
    
    

?>