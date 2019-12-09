<?php

session_start();

include_once '../modelo/consultasUsuario.php';

$check = new login();

if (!$_POST) {

    include_once __DIR__ . '/../vista/login.php';
    
} else {
    
    $ValidacionDeUsuario = "UsuarioParaValidar";// esta variable guarda un 
    //nombre de usuario para el punto 2.Validacion de usuario, en el login con poner
    //este nombre te dejaria entrar
    
    if ($check->check_login_ok($_POST["usuario"], $_POST["password"]) || $_POST["usuario"] == $ValidacionDeUsuario) {//llamo a una consulta
    // que comprueba si el usuario esta registrado
       

        $_SESSION["dentro"] = TRUE;//guardo en una sesion que se hizo login correctamente
        $_SESSION["admin"] = $check->isAdmin($_POST["usuario"]);//compruebo si es admin, si es admin se guarda un 1 si no, se guarda un 0
        $_SESSION["usuario"] = $_POST["usuario"];//guardo el nombre de usuario para enseñarlo

        header("Location: controladorVer.php");
                        
    } else {

        include '../vista/login_error.php';
        
    }
}
