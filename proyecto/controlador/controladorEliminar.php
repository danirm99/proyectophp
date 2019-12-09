<?php

session_start();

if ($_SESSION["dentro"]) {

    if ($_SESSION["admin"]) {


        if (!$_GET["id"]) {//esto sirve para que el usuario no pueda entrar  a este controlador sin
            //haber seleccionado una tarea  para eliminar
            header("Location: controladorVer.php");
        } else {

            include_once __DIR__ . "/../modelo/consultas.php";

            $errores = new consultas();

            $id_del = $_GET["id"]; //saco la id de latarea que se quiere eliminar

            $rs = $errores->sacarDatos($id_del); //saco los datos de la tarea que se quiere modificar

            if (!$_POST) {

                include_once __DIR__ . '/../vista/eliminar.php';
            } else {

                if (isset($_POST["confirmar"])) {// si se pulsa el boton confirmar
                    $errores->eliminarCampos($id_del); //elimino campos
                    include '../plantilla/headerVer.php';
                    echo "<h1>Borrado con exito</h1>";
                }

                if (isset($_POST["denegar"])) {//si se pulsa boton denegar, me marca como no borrado
                    include '../plantilla/headerVer.php';
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
