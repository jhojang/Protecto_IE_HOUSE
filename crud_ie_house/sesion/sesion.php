<?php

session_start();

if (isset($_SESSION["usuario"]) && $_SESSION["rol"] == 1) {
    header("Location: ../view/pagesAdmin/home.php");
} else if (isset($_SESSION["usuario"]) && $_SESSION["rol"] == 2) {
    header("Location: ../view/pagesComun/home.php");
} else {
    header("Location: ../view/login.php");
}

?>