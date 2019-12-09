<?php

include_once __DIR__ . "/db_pdo.php ";

class consultas {

    function insertarTareas($tareas_filtradas) {//esta funcion me sirve para poder insertar los datos en la base de datos
        $cc = DBConnector2::getInstance();
        $sql = "INSERT INTO tareas(`Descripcion`,`Persona_de_contacto`,`Telefono`,"
                . "`Correo`,`Direccion`,`Poblacion`,`Codigo_Postal`,`Provincia`,"
                . "`Estado`,`Operario_encargado`,`Fecha_de_realizacion`,`Anotaciones_anteriores`)";
        $sql .= " values( ";
        $sql .= " :descripcion,:contacto,:telefono,:correo,:direccion,:poblacion,"
                . ":codigo_postal,:provincia,:estado,:operacio_encargado,"
                . ":fecha_realizacion,:anotaciones_anteriores)";
        $result = $cc->db->prepare($sql);
        $params = array("descripcion" => $tareas_filtradas["descripcion"], "contacto" => $tareas_filtradas["contacto"],
            "telefono" => $tareas_filtradas["telef"], "correo" => $tareas_filtradas["email"],
            "direccion" => $tareas_filtradas["Direccion"], "poblacion" => $tareas_filtradas["poblacion"],
            "codigo_postal" => $tareas_filtradas["codigo_postal"], "provincia" => $tareas_filtradas["provincia"],
            "estado" => $tareas_filtradas["estado"], "operacio_encargado" => $tareas_filtradas["encargado"],
            "fecha_realizacion" => $tareas_filtradas["fecha_realizacion"], "anotaciones_anteriores" => $tareas_filtradas["anotaciones"]);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

    function getFechaCreacion($id) {// saco la fecha de creacion para hacer comparaciones en el filtrado de datos
       $cc = DBConnector2::getInstance();
        $sql = "SELECT Fecha_de_creacion FROM tareas WHERE Id = :id";
        $result = $cc->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params) or die(print_r($result->errorInfo()));
        return ($result->fetch());
    }

    function modificarCampos($id_mod, $tareas_filtradas) {// modifico los cambios una vez la validacion fue correcta
        $cc = DBConnector2::getInstance();

        $sql = "UPDATE tareas "
                . "SET Descripcion = :descripcion ,"
                . "Persona_de_contacto = :contacto ,"
                . "Telefono = :telefono ,"
                . "Correo = :correo ,"
                . "Direccion = :direccion ,"
                . "Poblacion = :poblacion ,"
                . "Codigo_Postal = :codigo_postal ,"
                . "Provincia = :provincia ,"
                . "Estado = :estado ,"
                . "Operario_encargado = :operacio_encargado ,"
                . "Fecha_de_realizacion = :fecha_realizacion ,"
                . "Anotaciones_anteriores = :anotaciones_anteriores "
                . "WHERE Id = :id ";

        $result = $cc->db->prepare($sql);

        $params = array("descripcion" => $tareas_filtradas["descripcion"], "contacto" => $tareas_filtradas["contacto"],
            "telefono" => $tareas_filtradas["telef"], "correo" => $tareas_filtradas["email"],
            "direccion" => $tareas_filtradas["Direccion"], "poblacion" => $tareas_filtradas["poblacion"],
            "codigo_postal" => $tareas_filtradas["codigo_postal"], "provincia" => $tareas_filtradas["provincia"],
            "estado" => $tareas_filtradas["estado"], "operacio_encargado" => $tareas_filtradas["encargado"],
            "fecha_realizacion" => $tareas_filtradas["fecha_realizacion"], "anotaciones_anteriores" => $tareas_filtradas["anotaciones"], "id" => $id_mod);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }
    
        function insertarProvinciasTest() {//esta funcion sirve para el select en el formulario de agregar/modificar formulario
       $cc = DBConnector2::getInstance();
        $sql = "SELECT * from provincias group by cod";
        $result = $cc->db->prepare($sql);     
        $result->execute() or die(print_r($result->errorInfo()));
        return ($result);
    }

    function eliminarCampos($Id) {// elimino los campos una vez confirmo el usuario
        $cc = DBConnector2::getInstance();

        $sql = "DELETE FROM tareas WHERE Id = :id ";

        $result = $cc->db->prepare($sql);

        $params = array("id" => $Id);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

    function sacarDatos($id) { //saco datos de la Id que le pase por parametros,
                                // para editar/borrar/completar
        $cc = DBConnector2::getInstance();
        $sql = "SELECT * FROM tareas WHERE Id = :id ";
        $result = $cc->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params) or die(print_r($result->errorInfo()));
        return ($result);
    }

    function completarCampos_modificar($id_mod, $tareas_filtradas) {// este update me sirve solo para cambiar el estado y las anotaciones posteriores
        // es mas comodo asi ya que solo tengo que updatear 2 campos
        $cc = DBConnector2::getInstance();

        $sql = "UPDATE tareas "
                . "SET Estado = :estado ,"
                . "Anotaciones_posteriores = :anotaciones_posteriores "
                . "WHERE Id = :id ";

        $result = $cc->db->prepare($sql);

        $params = array("estado" => $tareas_filtradas["estado"],
            "anotaciones_posteriores" => $tareas_filtradas["anotaciones_post"],
            "id" => $id_mod);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

    function getNombreProvincia($id) {// esta funcion le paso la id de la provincia
                                      // y me devuelve su nombre

        $cc = DBConnector2::getInstance();
        $sql = "SELECT nombre FROM provincias WHERE cod = :id ";
        $result = $cc->db->prepare($sql);
        $params = array("id" => $id);
        $result->execute($params);
        return ($result->fetch());
    }

    function buscarTareas($campos, $limite, $pn) {//funcion que devuelve el resultado de la busqueda

        $num_consultas = sizeof($campos);//calculo cuantos campos relleno

        $cc = DBConnector2::getInstance();
        $start_from = ($pn - 1) * $limite; //con la pagina seleccionada antes, preparo la consulta para avanzar y seleccionar mas campos. 
        $user = $_SESSION["usuario"];

        if ($num_consultas == 1) {//si relleno un campo se hace esto

            if ($_SESSION["admin"]) {
            
                $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo LIMIT :inicio , :limite";
                
            }
            
            else {
                
                $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo AND Operario_encargado = '$user' LIMIT :inicio , :limite";
            }
            
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->bindParam("inicio", $start_from, PDO::PARAM_INT);
            $result->bindParam("limite", $limite, PDO::PARAM_INT);
            $result->execute() or die(print_r($result->errorInfo()));
            return $result;
            
        } else if ($num_consultas == 2) {//s  relleno dos campo se hace esto

            if ($_SESSION["admin"]) {

            $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
            . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 LIMIT :inicio , :limite";                
                
            }
            
            else {
                
            $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
            . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 AND Operario_encargado = '$user'  LIMIT :inicio , :limite";                
                
            }
                
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->bindParam("campo2", $campos[1][2]);
            $result->bindParam("inicio", $start_from, PDO::PARAM_INT);
            $result->bindParam("limite", $limite, PDO::PARAM_INT);
            $result->execute() or die(print_r($result->errorInfo()));
            return $result;
            
        } else if ($num_consultas == 3) {//si relleno tres campo se hace esto

            if ($_SESSION["admin"]) {
               
            $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 " . ""
                    . "AND " . $campos[2][0] . " " . $campos[2][1] . " :campo3 LIMIT :inicio , :limite";                
                
            }
            
            else {
                
            $sql = "SELECT * FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 " . ""
                    . "AND " . $campos[2][0] . " " . $campos[2][1] . " :campo3  AND Operario_encargado = '$user' LIMIT :inicio , :limite";                
                
            }                        
            
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->bindParam("campo2", $campos[1][2]);
            $result->bindParam("campo3", $campos[2][2]);
            $result->bindParam("inicio", $start_from, PDO::PARAM_INT);
            $result->bindParam("limite", $limite, PDO::PARAM_INT);
            $result->execute() or die(print_r($result->errorInfo()));
            return $result;
        }
    }

    function num_Tareas($campos, $limite) {//funcion que me devuelve el numero de tareas totales que devuelve la busqueda

        $num_consultas = sizeof($campos);//calculo cuantos campos relleno

        $cc = DBConnector2::getInstance();
        $user = $_SESSION["usuario"];

        
        if ($num_consultas == 1) {//si relleno un campo se hace esto
            
            if ($_SESSION["admin"]) {
                
                $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo ";
                
                
            }
            
            else {
              
                $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo AND Operario_encargado = '$user' ";                
                
            }
                        
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->execute() or die(print_r($result->errorInfo()));
            $affected_rows = $result->fetchColumn();

            return $total = ceil($affected_rows / $limite); // devuelve el numero de paginas totales    
            
        } else if ($num_consultas == 2) {//si relleno dos campo se hace esto
            
            if ($_SESSION["admin"]) {
                
            $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2";     
                
            }
            
            else  {

            $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 AND Operario_encargado = '$user' ";                 
                
            }
                        
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->bindParam("campo2", $campos[1][2]);
            $result->execute() or die(print_r($result->errorInfo()));
            $affected_rows = $result->fetchColumn();

            return $total = ceil($affected_rows / $limite); // devuelve el numero de paginas totales 
            
        } else if ($num_consultas == 3) {//si relleno tres campo se hace esto

            if ($_SESSION["admin"]) {
                
            $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 " . ""
                    . "AND " . $campos[2][0] . " " . $campos[2][1] . " :campo3";        
                
            }
            
            else {
              
            $sql = "SELECT COUNT(*) FROM tareas WHERE " . $campos[0][0] . " " . $campos[0][1] . " :campo " . ""
                    . "AND " . $campos[1][0] . " " . $campos[1][1] . " :campo2 " . ""
                    . "AND " . $campos[2][0] . " " . $campos[2][1] . " :campo3 AND Operario_encargado = '$user'";                 
                
            }
                        
            $result = $cc->db->prepare($sql);
            $result->bindParam("campo", $campos[0][2]);
            $result->bindParam("campo2", $campos[1][2]);
            $result->bindParam("campo3", $campos[2][2]);
            $result->execute() or die(print_r($result->errorInfo()));
            $affected_rows = $result->fetchColumn();

            return  $total = ceil($affected_rows / $limite); // devuelve el numero de paginas totales
            
        }
    }

}

class paginar {

    function imprimir($limit, $pn) {// esta funcion me imprimre los campos en la tabla
        $cc = DBConnector2::getInstance();
        $start_from = ($pn - 1) * $limit; //con la pagina seleccionada antes, preparo la consulta para avanzar y seleccionar mas campos. 
        // Al principio iria del 1 al 20, si pulsasemos la pagina 2, iria del 20 al 40, y asi sucesivamente...     
        $user = $_SESSION["usuario"];
        if($_SESSION["admin"]) {
        $sql = "SELECT * FROM tareas ORDER BY Fecha_de_creacion DESC LIMIT ? , ?"; //Aqui tuve que poner ? en lugar de
        //placeholders porque pdo los detecta como string automaticamente    
        }
        else {
            $sql = "SELECT * FROM tareas  WHERE  Operario_encargado = '$user'  ORDER BY Fecha_de_creacion DESC LIMIT ? , ?"; //Aqui tuve que poner ? en lugar de
        //placeholders porque pdo los detecta como string automaticamente
        }
        
        $result = $cc->db->prepare($sql);
        $result->bindParam(1, $start_from, PDO::PARAM_INT); //con PDO::PARAM_INT se pone pone en int
        $result->bindParam(2, $limit, PDO::PARAM_INT);
        $result->execute() or die(print_r($result->errorInfo()));
        return $result;
    }

    function verCampos($limit) {//esta funcion me imprime los numeros de la paginacion
        $cc = DBConnector2::getInstance();
        $user = $_SESSION["usuario"];
        if($_SESSION["admin"]) {
            
           $sql = "SELECT count(*) FROM tareas";

        }
        
         else {
     $sql = "SELECT count(*) FROM tareas WHERE Operario_encargado =  '$user'";
     }

        $result = $cc->db->prepare($sql);
        $result->execute() or die(print_r($result->errorInfo()));
        $affected_rows = $result->fetchColumn();
        return $total = ceil($affected_rows / $limit); // devuelve el numero de paginas totales        
    }

}
