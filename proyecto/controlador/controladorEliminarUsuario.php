<?php

session_start();

if ($_SESSION["dentro"]) {

    if ($_SESSION["admin"]) {

        if (!$_GET["nombre"]) {//esto sirve para que el usuario no pueda entrar  a este controlador sin
            //haber seleccionado una usuario  para  eliminar
            header("Location: controladorListarUsuario.php");
        } else {

            include_once __DIR__ . "/../modelo/consultasUsuario.php";

            $campos = new login();

            $id_del = $_GET["nombre"]; // guardo en una variable el nombre del usuario

            $rs = $campos->sacarDatos($id_del); //saco los datos del usuario

            if (!$_POST) {

                include_once __DIR__ . '/../vista/eliminarUsuario.php';
            } else {

                if (isset($_POST["confirmar"])) {// si se pulsa el boton confirmar
                    $campos->eliminarCampos($id_del); //elimino usuario
                    include '../plantilla/headerListarUsuarios.php';
                    echo "<h1>Borrado con exito</h1>";
                }

                if (isset($_POST["denegar"])) {//si se pulsa boton denegar, me marca como no borrado
                    include '../plantilla/headerListarUsuarios.php';
                    echo "<h1>No borrado</h1>";
                }
            }
        }
    } else {
            header('HTTP/1.0 403 Forbidden');
    }
} else {

    header("Location: controladorLogin.php");
}
