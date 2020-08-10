<?php

require_once("../../model/BombilloModel.php");
$bombilloModel = new BombilloModel();

$id_bombillo = (int) $_POST["id_bombillo"];
$intensidad = (int) $_POST["intensidad"];


$bombilloModel->setIntensidadById($id_bombillo, $intensidad);
echo json_encode(true);

?>