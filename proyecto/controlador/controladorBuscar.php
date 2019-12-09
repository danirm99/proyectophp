<?php

session_start();

if ($_SESSION["dentro"]) {

    include_once __DIR__ . "/../modelo/consultas.php";

    $datos = new consultas();

    if (!$_POST) {

        include_once '../vista/buscar.php';
        
    } else {

        $array_de_campos = array();//este es un array de los campos

        for ($i = 1; $i <= 3; $i++) {

            if ($_POST["campo" . $i] == "Default" || $_POST["atributos" . $i] == "Default" || $_POST["buscar" . $i] == "") {
                echo ""; //este if me sirve por si ponen un hueco en vacio en la
                        // busqueda, no lo tenga en cuenta para la busqueda
            } else {

                if ($_POST["atributos" . $i] == "LIKE") { 

                    $campo = array($_POST["campo" . $i], $_POST["atributos" . $i], "%" . $_POST["buscar" . $i] . "%");
                    //este if me sirve para el atributo de "contiene" le pongo un
                    // % delante y detras de la palabra para que me seleccione todas las
                    //campos que busquen que tengan esa palabra
                } else {

                    $campo = array($_POST["campo" . $i], $_POST["atributos" . $i], $_POST["buscar" . $i]);
                    //y este me sirve para cuando no sea "contiene" me lo selecciona de forma normal
                }

                array_push($array_de_campos, $campo);//cada vez que se termine el for, meto el array campo
                                // en otro array para pasarlo luego
            }
        } 

        $_SESSION["datos"] = $array_de_campos; //uso sesion aqui para guardar
                        //el array de campos para poder usarlos en el paginador
                        //de buscar, ya que si no los datos no se guardarian correctamente    
        
        $_SESSION["buscador"] = TRUE;
        header("Location: controladorPaginarBuscador.php");
    }
} else {
    
    header("Location: controladorLogin.php");
}
?>
