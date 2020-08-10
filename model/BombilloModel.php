<?php
require_once("Conexion.php");

class BombilloModel {
    private $connection;

    function __construct () {
        $this->connection = Conexion::getConnection();
    }

    function insertBombillo($nombre_bombillo, $id_cuarto) {
        $sql = "INSERT INTO bombillo (nombre_bombillo, estado_bombillo, id_cuarto) VALUES (?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$nombre_bombillo, false, $id_cuarto]);
    }

    function getBombillos() {
        $sql = "SELECT * FROM bombillo";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getBombilloById($id_bombillo) {
        $sql = "SELECT * FROM bombillo WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_bombillo]);
        $resulSet = $statement->fetch();
        return $resulSet;
    }

    function getBombilloByName($nombre_bombillo) {
        $sql = "SELECT * FROM bombillo WHERE nombre_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$nombre_bombillo]);
        $resulSet = $statement->fetch();
        return $resulSet;
    }

    function cambiarEstadoBombillo($id_bombillo, $estado) {
        $sql = "UPDATE bombillo SET estado_bombillo = ? WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$estado, $id_bombillo]);
    }

    function actualizarBombillo($nombre_bombillo, $id_bombillo, $id_cuarto) {
        $sql = "UPDATE bombillo SET nombre_bombillo = ?, id_cuarto = ? WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$nombre_bombillo, $id_cuarto, $id_bombillo]);
    }

    function eliminarBombillo($id_bombillo) {
        $sql = "DELETE FROM bombillo WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_bombillo]);
    }

    function insertIntermediaBombilloUsuario($id_bombillo, $id_usuario) {
        $sql = "INSERT INTO bombillo_usuario (id_bombillo, id_usuario) VALUES (?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_bombillo, $id_usuario]);
    }

    function getTableBombilloUsuario($id_bombillo) {
        $sql = "SELECT * FROM bombillo_usuario WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_bombillo]);
        $resulSet = $statement->fetchAll();
        return $resulSet;
    }

    function deleteBombilloUsuario($id_bombillo, $id_usuario) {
        $sql = "DELETE FROM bombillo_usuario WHERE id_bombillo = ? AND id_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_bombillo, $id_usuario]);
    }

    function setIntensidadById($id_bombillo, $intensidad) {
        $sql = "UPDATE bombillo SET intensidad = ? WHERE id_bombillo = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$intensidad, $id_bombillo]);
    }


}

?>