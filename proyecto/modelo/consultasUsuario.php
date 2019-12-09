<?php

include_once __DIR__ . "/db_pdo.php ";

class login {

    function check_login_ok($nombre, $password) {//funcion que comprueba si el login es correcto

        $cc = DBConnector2::getInstance();
        $sql = "SELECT COUNT(*) FROM usuario WHERE nick LIKE :nombre AND password LIKE :password";
        $result = $cc->db->prepare($sql);
        $result->bindParam("nombre", $nombre);
        $result->bindParam("password", $password);
        $result->execute() or die(print_r($result->errorInfo()));
        return $result->fetchColumn();
    }

    function isAdmin($nombre) {//funcion que comprueba  si el usuario que hace login es admin

        $cc = DBConnector2::getInstance();
        $sql = "SELECT admin FROM usuario WHERE nick = :nombre";
        $result = $cc->db->prepare($sql);
        $result->bindParam("nombre", $nombre);
        $result->execute() or die(print_r($result->errorInfo()));
        return $result->fetchColumn();
    }

    function userExists($nombre) {//funcion que compruebas si el usuario existe,
        //sirve para el controlador de crear usuario

        $cc = DBConnector2::getInstance();
        $sql = "SELECT COUNT(*) FROM usuario WHERE nick = :nombre";
        $result = $cc->db->prepare($sql);
        $result->bindParam("nombre", $nombre);
        $result->execute() or die(print_r($result->errorInfo()));
        return $result->fetchColumn();
    }

    function modificarUsuario($newusuario, $newpassword, $usuario) {//funcion que
        //modifica un usuario

        $cc = DBConnector2::getInstance();

        $sql = "UPDATE usuario "
                . "SET nick = :newname ,"
                . "password = :newpassword "
                . "WHERE nick = :name";

        $result = $cc->db->prepare($sql);

        $params = array("newname" => $newusuario, "newpassword" => $newpassword,
            "name" => $usuario);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }
    
    function modificarNombre($newusuario, $usuario) {//funcion que modifica
            //el  nombrede usuario

        $cc = DBConnector2::getInstance();

        $sql = "UPDATE usuario "
                . "SET nick = :newname "
                . "WHERE nick = :name";

        $result = $cc->db->prepare($sql);

        $params = array("newname" => $newusuario, "name" => $usuario);

        $result->execute($params) or die(print_r($result->errorInfo()));
        
    }
    
    function modificarContraseña($newpassword, $usuario) {//funcion que modifica
            //la contraseña


        $cc = DBConnector2::getInstance();

        $sql = "UPDATE usuario "
                . "SET password = :newpassword "
                . "WHERE nick = :name";

        $result = $cc->db->prepare($sql);

        $params = array("newpassword" => $newpassword, "name" => $usuario);

        $result->execute($params) or die(print_r($result->errorInfo()));
        
    }

    function crearUsuario($usuario, $password) {//funcion que crea un usuario

        $cc = DBConnector2::getInstance();

        $sql = "INSERT INTO usuario(`nick`,`password`,`admin`) VALUES (:usuario, :password,:admin)";

        $result = $cc->db->prepare($sql);

        $params = array("usuario" => $usuario, "password" => $password, "admin" => 0);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

    function modificarNombreTareas($newusuario, $usuario) {//funcion que modifica
        //el campo operario encargado cuando hayamos modificado el nombre de
        //usuario

        $cc = DBConnector2::getInstance();

        $sql = "UPDATE tareas  SET Operario_encargado = :newname WHERE Operario_encargado = :name ";

        $result = $cc->db->prepare($sql);

        $params = array("newname" => $newusuario, "name" => $usuario);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

    function imprimir($limit, $pn) {//funcion que me lista todos los usuarios
        
        $cc = DBConnector2::getInstance();
        $start_from = ($pn - 1) * $limit;
        $sql = "SELECT * FROM usuario WHERE admin = 0 LIMIT ? , ?";
        $result = $cc->db->prepare($sql);
        $result->bindParam(1, $start_from, PDO::PARAM_INT);
        $result->bindParam(2, $limit, PDO::PARAM_INT);
        $result->execute() or die(print_r($result->errorInfo()));
        return $result;
        
    }

    function verCampos($limit) {//funcion que me devuelve cuantos usuarios hay
        //no administradores
        
        $cc = DBConnector2::getInstance();
        $sql = "SELECT count(*) FROM usuario WHERE admin = 0";
        $result = $cc->db->prepare($sql);
        $result->execute() or die(print_r($result->errorInfo()));
        $affected_rows = $result->fetchColumn();
        return $total = ceil($affected_rows / $limit);
        
    }

    function sacarDatos($nombre) {//funcion que me devuelve el usuario
        //que hayamos elegido para borrar
        
        $cc = DBConnector2::getInstance();
        $sql = "SELECT * FROM usuario WHERE nick = :nombre ";
        $result = $cc->db->prepare($sql);
        $params = array("nombre" => $nombre);
        $result->execute($params) or die(print_r($result->errorInfo()));
        return ($result);
        
    }

    function eliminarCampos($nombre) {//funcion que borra un usuario

        $cc = DBConnector2::getInstance();

        $sql = "DELETE FROM usuario WHERE nick = :usuario ";

        $result = $cc->db->prepare($sql);

        $params = array("usuario" => $nombre);

        $result->execute($params) or die(print_r($result->errorInfo()));
    }

}
