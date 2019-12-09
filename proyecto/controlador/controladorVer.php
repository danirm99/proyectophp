<?php

session_start();

if ($_SESSION["dentro"]) {

    include_once __DIR__ . "/../modelo/consultas.php";
    include_once '../helpers/numeracion.php';

    $limite = 10;//establezco limite de elementos para ver

    $paginacion = new paginar();// llamo a la clase paginar

    $pn = numeracion();  // saco el num de la pagina actual

    $rs = $paginacion->imprimir($limite, $pn); //imprimo los datos de las tablas
  
    $paginas_totales = $paginacion->verCampos($limite); // imprimo paginas totales
    
    include_once __DIR__ . '/../vista/ver.php';
    
} else {

    header("Location: controladorLogin.php");
    
}
?>

