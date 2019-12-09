<?php

session_start();

if ($_SESSION["dentro"]) {

    include_once __DIR__ . "/../modelo/consultasUsuario.php";

    $usuario = new login();

    if (!$_POST) {

        include_once '../vista/modificarCuenta.php';
        
    } else {

        if ($usuario->userExists($_POST["newusuario"])) {//si el usuario existe da un error

            include_once '../vista/modificarCuenta.php';
            echo "<h1>El nombre de usuario que quieres elegir no esta disponible</h1>";
        }
        else if ($_POST["newusuario"] == "" && $_POST["passwordnew"] == "") {////si los campos estan vacios da un error

            include_once '../vista/modificarCuenta.php';
            echo "<h1>Los campos estan vacios</h1>";
            
        }  
        else if ($_POST["newusuario"] != "" && $_POST["passwordnew"] == "") {//si solo se quiere modificar el usuario se hara esto

            $usuario->modificarNombre($_POST["newusuario"], $_SESSION["usuario"]);//llamo a una consulta que modifica el nombre de usuario
            $usuario->modificarNombreTareas($_POST["newusuario"], $_SESSION["usuario"]);//llamo a una consulta que modifica en las tareas al Operario encargado
            $_SESSION["usuario"] = $_POST["newusuario"];//modifico el usuario que guarde en sesion a su nombre cambiado
            include_once '../vista/modificarCuenta.php';
            echo "<h1>Usuario cambiado con exito</h1>";
            
        } 
        
         else if ($_POST["newusuario"] == "" && $_POST["passwordnew"] != "") {//si solo se quiere modificar la contraseña se hara esto

            $usuario->modificarContraseña($_POST["passwordnew"], $_SESSION["usuario"]);//llamo a una consulta que modifica la contraseña del usuario
            include_once '../vista/modificarCuenta.php';
            echo "<h1>Contraseña cambiada con exito</h1>";
            
        } 
        else {//si solo se quiere ambos campos se  hara esto

            $usuario->modificarUsuario($_POST["newusuario"], $_POST["passwordnew"], $_SESSION["usuario"]);//llamo a una consulta que modifica los datos del usuario
            $usuario->modificarNombreTareas($_POST["newusuario"], $_SESSION["usuario"]);//llamo a una consulta que modifica en las tareas al Operario encargado
            $_SESSION["usuario"] = $_POST["newusuario"];//modifico el usuario que guarde en sesion a su nombre cambiado
            include_once '../vista/modificarCuenta.php';
            echo "<h1>Modificacion exitosa</h1>";
        }
    }
} else {

    header("Location: controladorLogin.php");
} 

