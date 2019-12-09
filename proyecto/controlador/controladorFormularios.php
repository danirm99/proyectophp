<?php
session_start();

if ($_SESSION["dentro"]) {

    if ($_SESSION["admin"]) {

        include_once __DIR__ . "/../modelo/consultas.php";
        include_once 'tareas.php';
        include_once 'validarErrores.php';

        $errores = new consultas();
        $provincias = $errores->insertarProvinciasTest();//saco datos de la provincia
        $id  = "";// como este es un  controlador para crear formulario,
        //no hay id de usuario, asi que la pondremos vacia
        


        if (!$_POST) {

            include_once __DIR__ . '/../vista/form_vacio.php';
            
        } else {

            if (count(checkErrores($id)) != 0) {//si el array de errores no esta vacio
                include "../vista/form_relleno.php";

                foreach (checkErrores($id) as $key => $value) {//imprimo en los span los errores
                    ?>
                    <script>
                        document.getElementById("err<?= $key ?>").innerHTML = "<?= $value ?>"; //asigno a 
                        //las id de los span los valores de errores
                    </script>

                    <?php
                }
            } else {// si esta vacio
                $tareas_filtradas = imp_tareas();//imprimo las  tareas en  un array
                include '../plantilla/headerForm.php';
                echo "<h1>Tarea insertada con exito</h1>";
                $errores->insertarTareas($tareas_filtradas); //inserto el formulario en la base de datos
            }
        }
    } else {

            header('HTTP/1.0 403 Forbidden');
    }
} else {

    header("Location: controladorLogin.php");
} 

