<?php

session_start();

if ($_SESSION["dentro"]) {
    
        if ($_SESSION["admin"]) {


    include_once __DIR__ . "/../modelo/consultasUsuario.php";
    include_once '../helpers/numeracion.php';

    $limite = 5;//establezco limite de elementos para ver

    $paginacion = new login();// llamo a la clase paginar

    $pn = numeracion();  // saco el num de la pagina actual

    $rs = $paginacion->imprimir($limite, $pn); //imprimo los datos de las tablas

    $paginas_totales = $paginacion->verCampos($limite); // imprimo paginas totales

    include_once __DIR__ . '/../vista/listaUsuarios.php';
    
} else {
        header('HTTP/1.0 403 Forbidden');
    }
} else {

    header("Location: controladorLogin.php");
}

?>

