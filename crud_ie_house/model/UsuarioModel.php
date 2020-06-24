<?php

require_once("Conexion.php");
require_once("../include/Usuario.php");


class UsuarioModel {
    private $connection;

    function __construct() {
        $this->connection = Conexion::getConnection();
    }

    function insertUsuario($usuarioClass) {
        
        $sql = "INSERT INTO usuario (nombre_de_usuario, nombre, apellido, correo_usuario, pass_usuario, id_rol) VALUES (?, ?, ?, ?, ?, ?)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $usuarioClass->getUsuario(), 
            $usuarioClass->getNombre(),
            $usuarioClass->getApellido(),
            $usuarioClass->getEmail(),
            $usuarioClass->getPass(),
            2
        ]);
    }


    function getUsuarios() {
        $sql = "SELECT * FROM usuario";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getByUsuario($usuarioClass) {
        $sql = "SELECT * FROM usuario WHERE nombre_de_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$usuarioClass->getUsuario()]);
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getByEmail($usuarioClass) {
        $sql = "SELECT * FROM usuario WHERE correo_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$usuarioClass->getEmail()]);
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getByUsuarioPass($usuarioClass) {
        $sql = "SELECT * FROM usuario WHERE nombre_de_usuario = ? AND pass_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $usuarioClass->getUsuario(),
            $usuarioClass->getPass()
        ]);
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getByEmailPass($usuarioClass) {
        $sql = "SELECT * FROM usuario WHERE correo_usuario = ? AND pass_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            $usuarioClass->getEmail(),
            $usuarioClass->getPass()
        ]);
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

    function getBombilloUsuario($id_usuario) {
        $sql = "SELECT * FROM bombillo_usuario WHERE id_usuario = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id_usuario]);
        $resultSet = $statement->fetchAll();
        return $resultSet;
    }

}

?>