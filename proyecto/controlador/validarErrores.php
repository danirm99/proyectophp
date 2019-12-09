<?php

function checkErrores($id) {//esta funcion valido los campos para comprobar si hay algun error
        
        $errores3 = array();

        if ($_POST["descripcion"] == "") {

            $errores3["descripcion"] = "El campo descripcion no debe de estar vacio";
        }

        if ($_POST["contacto"] == "") {

            $errores3["contacto"] = "El campo persona de contacto no debe de estar vacio";
        }

        if ($_POST["Direccion"] == "") {

            $errores3["Direccion"] = "El campo direccion no debe de estar vacio";
        }

        if ($_POST["poblacion"] == "") {

            $errores3["poblacion"] = "El campo poblacion no debe de estar vacio";
        }

        if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $_POST["telef"])) {

            $errores3["telef"] = "El telefono debe de tener el siguiente formando: 000-0000-0000";
        }

        if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {

            $errores3["email"] = "La direccion de correo no es valida.";
        }

        if (!preg_match("/^[0-9]{5}$/", $_POST["codigo_postal"])) {

            $errores3["codigo_postal"] = "El codigo postal solo debe de tener 5 numeros";
        }

        if ($id == "") {// este me sirve para ver si la fecha introducida en el formulario es valida,
            //la si se crea un form nuevo,  la  id estara vacia, por lo que se hara esta
            $time = strtotime($_POST["fecha_realizacion"]);

            if (date("Y-m-d") >= date('Y-m-d', $time)) {

                $errores3["fecha_realizacion"] = "La fecha de realizacion no pude ser igual menor que la de creacion y debe de tener"
                        . "el siguiente formato '2019-02-12 o 12-02-2019' <- Ejemplo ";
            }
        }

        if ($id != "") {//esto me sirve para el campo de editar, ya  que  al
            //ser una  fecha sacada de la base de datos, hay que compararla diferente
            
            $fecha = new consultas();          
            $time = strtotime($fecha->getFechaCreacion($id)[0]);
            
            $newformat = date('Y-m-d', $time);


            if ($newformat >= strtotime($_POST["fecha_realizacion"])) {

                $errores3["fecha_realizacion"] = "La fecha de realizacion no pude ser igual menor que la de creacion y debe de tener"
                        . "el siguiente formato '2019-02-12 o 12-02-2019' <- Ejemplo ";
            }
        }
        

        
        if ($_POST["estado"] != "P" && $_POST["estado"] != "R" && $_POST["estado"] != "C") {

            $errores3["estado"] = "El campo estado solo puede ser: P, R o C";
        }
        
        if($_POST["encargado"] == "") {
            
         $errores3["encargado"] = "El campo operario no puede estar vacio";
         
        }

        return $errores3;
    }

    
    ?>