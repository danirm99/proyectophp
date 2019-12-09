<html>
        <head>
            <?php include '../plantilla/headerListarUsuarios.php'; ?>                            
            <title>Borrar</title>
            <link rel="stylesheet" href="../Assets/css/tablaFinal.css">     
                   <style>
            #customers {
                zoom: 84%;
            }
        </style>
        </head>
        <body>
            <h1>¿Quiere borrar al usuario?</h1>
            <br>
            <br>
            <div class="del">
                <table id="customers"> 
                    <tr> 
                    <th>Usuario</th>  
                    <th>Contraseña</th>  
                    <th>Admin</th>
                    </tr> 
                    <?php     
                    foreach ($rs as $reg) {//saco los datos de la consulta,  los datos vienen del controlador controladorELiminarUsuario
                        ?>
                    <td><?php echo $reg["nick"] ?></td>  
                    <td><?php echo $reg["password"] ?></td>  
                    <td><?php echo $reg["admin"] ?></td>         
                        <?php
                    }
                    ?>   
                </table> 
                <br>
                <br>
                <form action="" method="POST">
                    <div class="row">
                        <input type="submit" value="Si" name="confirmar" />
                        <input type="submit" value="No" name="denegar" />
                    </div>                           
                </form>
            </div>    
     <?php include '../plantilla/footer.php'; ?>
            
        </body>
    </html>
