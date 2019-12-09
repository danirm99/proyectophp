<?php
session_start();

if ($_SESSION["dentro"]) {

    if ($_SESSION["admin"]) {


        if (!$_GET["id"]) {//esto sirve para que el usuario no pueda entrar  a este controlador sin
            //haber seleccionado una tarea  para editar
            header("Location: controladorVer.php");
        } else {

            include_once __DIR__ . "/../modelo/consultas.php";
            include_once 'tareas.php';
            include_once 'validarErrores.php';

            $consultas = new consultas();
            $provincias = $consultas->insertarProvinciasTest(); //guardo las provincias en un array

            $id_mod = $_GET["id"]; // paso la id de la tarea que se quiere modificar
            $rs = $consultas->sacarDatos($id_mod); // saco tarea que se quiere modificar

            if (!$_POST) {


                include_once '../vista/editar.php';
            } else {

                if (count(checkErrores($id_mod)) != 0) {//si el array de errores no esta vacio
                    include "../vista/form_relleno_editar.php";

                    foreach (checkErrores($id_mod) as $key => $value) {//imprimo en los span los errores
                        ?>
                        <script>
                            document.getElementById("err<?= $key ?>").innerHTML = "<?= $value ?>"; //asigno a 
                            //las id de los span los valores de errores
                        </script>

                        <?php
                    }
                } else {

                    $tareas_filtradas = imp_tareas(); //guardo las tareas en un array
                    $consultas->modificarCampos($id_mod, $tareas_filtradas); //modifico  las tareas
                    include '../plantilla/headerVer.php';
                    echo "<h1>Tarea editada con exito</h1>";
                }
            }
        }
    } else {

        header('HTTP/1.0 403 Forbidden');
    }
} else {

    header("Location: controladorLogin.php");
} 
