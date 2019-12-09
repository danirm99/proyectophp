<?php

session_start();

if ($_SESSION["dentro"]) {

    if (!$_GET["id"]) {//esto sirve para que el usuario no pueda entrar  a este controlador sin
        //haber seleccionado una tarea  para completar

        header("Location: controladorVer.php");
        
    } else {

        include_once __DIR__ . "/../modelo/consultas.php";
        include_once 'tareas.php';
        include_once 'validarErrores.php';

        $consultas = new consultas();
        $id_mod = $_GET["id"];// paso la id de la tarea que se quiere modificar
        $rs = $consultas->sacarDatos($id_mod);// saco tarea que se quiere completar

        if (!$_POST) {

            include_once __DIR__ . '/../vista/completar.php';
        } else {

            $tareas_filtradas = imp_tareas();//guardo las tareas en un array
            $consultas->completarCampos_modificar($id_mod, $tareas_filtradas);//completo  la tarea
            include '../plantilla/headerVer.php';
            echo "<h1>Tarea completada con exito</h1>";
            
        }
    }
} else {

    header("Location: controladorLogin.php");
    
}