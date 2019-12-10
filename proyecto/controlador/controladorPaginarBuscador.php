<?php

session_start();

if ($_SESSION["dentro"]) {
    
    if($_SESSION["buscador"]) {
        
    include_once __DIR__ . "/../modelo/consultas.php";
    include_once '../helpers/numeracion.php';

    $datos = new consultas();
    $paginacion = new paginar();

    $limite = 5;// eligo limite de campos que quiero ver

    $pn = numeracion();  // saco el num de la pagina actual

    $paginas_totales = $datos->num_Tareas($_SESSION["datos"], $limite);// imprimo las paginas totales que habra

    $rs = $datos->buscarTareas($_SESSION["datos"], $limite, $pn);// con esto voy cogiendo
                            //los datos que tengo almacenado en una sesion, y los voy
                            //viendo segun el limite y la pagina en la que estoy

    include_once '../vista/tablabusqueda.php';
    
    } else {
        
       header("Location: controladorBuscar.php"); 
        
    }  
} else {

    header("Location: controladorLogin.php");
    
}