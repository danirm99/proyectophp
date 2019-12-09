<?php

include_once "../helpers/filtrar.php";

function imp_tareas() {//es funcion que devuelve las tareas en un array para su
            //facil uso en diferentes consultas
    
        $tareas = array ("descripcion" => $_POST["descripcion"] , "contacto" => $_POST["contacto"],
                 "telef" => $_POST["telef"], "email" => $_POST["email"], "Direccion" => $_POST["Direccion"],
                "poblacion" => $_POST["poblacion"], "codigo_postal" => $_POST["codigo_postal"],
                "provincia" => $_POST["provincia"], "estado" => $_POST["estado"],
                "fecha_realizacion" => $_POST["fecha_realizacion"],"encargado" => $_POST["encargado"],
                "anotaciones" => $_POST["anotaciones"] , "anotaciones_post" => $_POST["anotaciones_post"]);


        foreach ($tareas as $key => $value) {
                
        $tareas_filtradas[$key] = filtrado($value);
        
        }
        
        return $tareas_filtradas;
}
