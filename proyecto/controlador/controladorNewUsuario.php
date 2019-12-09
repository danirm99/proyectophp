<?php

session_start();

if ($_SESSION["dentro"]) {

    if ($_SESSION["admin"]) {

        include_once __DIR__ . "/../modelo/consultasUsuario.php";

        $usuario = new login();


        if (!$_POST) {

            include_once '../vista/crearUsuario.php';
        } else {

            if ($usuario->userExists($_POST["usuario"])) {//si el usuario existe da un error
                include_once '../vista/crearUsuario.php';
                echo "<h1>El usuario que quieres crear ya existe</h1>";
            } else if ($_POST["usuario"] == "" || $_POST["password"] == "") {// si los  campos  estan vacios da un error
                include_once '../vista/crearUsuario.php';
                echo "<h1>Los campos no pueden estar vacios</h1>";
            } else {

                $usuario->crearUsuario($_POST["usuario"], $_POST["password"]); // si llega aqui, se crea el usuario exitosamente
                include_once '../vista/crearUsuario.php';
                echo "<h1>Usuario creado con exito</h1>";
            }
        }
    } else {
            header('HTTP/1.0 403 Forbidden');
    }
} else {

    header("Location: controladorLogin.php");
}



