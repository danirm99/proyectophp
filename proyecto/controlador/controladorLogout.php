<?php

session_start();

session_destroy();//destruyo la sesion cuando se da a cerrar sesion y mando al usuario al login

    header("Location: controladorLogin.php");

?>
