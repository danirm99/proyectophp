<?php
if ($_SESSION["admin"]) {
    $nombre = "admin";
} else {
    $nombre = "operario";
}
?>
<meta charset="utf-8"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<link rel="stylesheet" href="../Assets/css/menu5.css">
<link rel="stylesheet" href="../Assets/css/header.css">
<link rel="stylesheet" href="../Assets/css/footer.css">

<?php
if (!$_SESSION["admin"]) {
    ?>
    <style>
        nav {
            width: 600px;
        }
    </style>
    <?php
}
?>
<div class="topnav">
    <img src="../Assets/img/<?php echo $nombre ?>.png" class="user" >
    <img src="../Assets/img/title.png" class="center" >
    <a class="active" href="../controlador/controladorLogout.php">Cerrar sesion</a>
    <a>Usuario: <?php echo $_SESSION["usuario"] ?></a>
    

</div>
<nav>        

       <?php if ($_SESSION["admin"]) {
        ?>
        <a class="menu" href= "../controlador/controladorVer.php">Ver tareas</a>
        <a class="menu" href= "../controlador/controladorBuscar.php">Buscar tareas</a>
        <a class="menu" href="../controlador/controladorModificarCuenta.php" >Modificar Cuenta</a>
        <a class="menu" href="../controlador/controladorFormularios.php">Nueva tarea</a>
        <a class="menu" href="../controlador/controladorNewUsuario.php" >Agregar Usuario</a>
        <a class="menu" href="../controlador/controladorListarUsuario.php" >Lista de Usuarios</a>
        <?php
    } else {
        ?>
        <a class="menu" href= "../controlador/controladorVer.php">Ver tareas</a>
        <a class="menu" href= "../controlador/controladorBuscar.php">Buscar tareas</a>
        <a class="menu" href="../controlador/controladorModificarCuenta.php" >Modificar Cuenta</a>

        <?php
    }
    ?>
    <div class="animation start-user"></div>
</nav>