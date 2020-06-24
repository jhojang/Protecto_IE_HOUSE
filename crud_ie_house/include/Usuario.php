<?php

class Usuario {
    private $usuario;
    private $nombre;
    private $apellido;
    private $email;
    private $pass;

    function __construct($usuario, $nombre, $apellido, $email, $pass) {
        $this->usuario = $usuario;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->pass = $pass;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setApelido($apellido) {
        $this->apellido = $apellido;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function getPass() {
        return $this->pass;
    }

}

?>