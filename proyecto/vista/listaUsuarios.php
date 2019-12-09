
<html> 
    <head> 
        <title>Lista de usuarios</title> 
        <?php include '../plantilla/headerListarUsuarios.php'; ?>
        <?php include '../helpers/paginacion.php'; ?>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="../Assets/css/tablaFinal.css">

    </head> 
    <body> 
        <br> 
        <h1>Usuarios</h1> 
        <div>
        <table id="customers"> 
            <thead> 
                <tr> 
                    <th>Usuario</th>  
                    <th>Contraseña</th>  
                    <th>Admin</th>  
                    <th>Borrar</th>  
                </tr> 
            </thead> 
            <?php
            foreach ($rs as $reg) {//saco los campos de la consulta, los datos vienen del controladorListarUsuario
                ?>   
                <tr>
                    <td><?php echo $reg["nick"] ?></td>  
                    <td><?php echo $reg["password"] ?></td>  
                    <td><?php echo $reg["admin"] ?></td>  
                    <td><a  href="../controlador/controladorEliminarUsuario.php?nombre=<?= $reg["nick"] ?>"><img src="../Assets/img/del2.png" alt="idk"/></a></td>
                </tr>

                <?php
            }
            ?>   
        </table> 
        <br><br>
        <div class="pagination"> 
            <?php
            $controlador = "controladorListarUsuario.php";//paso por una variable el nombre del controlador

            paginar($paginas_totales, $controlador, $pn);//llamo al helper de paginacion
                                //y le paso las paginas totales de la paginacion,
                                // el nombre del controlador, y la pagina actual
            ?>

        </div>   
           <?php include '../plantilla/footer.php'; ?>
    </body>    
</html> 