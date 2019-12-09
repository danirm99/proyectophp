

<html>
        <head>
            <?php include '../plantilla/headerVer.php'; ?>    
            <?php include '../helpers/nombreProvincia.php'; ?>
            
            <title>Agregar</title>
            <link rel="stylesheet" href="../Assets/css/tablaFinal.css">     
                   <style>
            #customers {
                zoom: 84%;
            }
        </style>
        </head>
        <body>
            <h1>¿Quiere borrar el campo?</h1>
            <br>
            <br>
            <div class="del">
                <table id="customers"> 
                    <tr> 
                        <th>Descripcion</th> 
                        <th>Persona de contacto</th> 
                        <th>Telefono</th>
                        <th>Correo</th> 
                        <th>Direccion</th> 
                        <th>Poblacion</th>
                        <th>Codigo Postal</th> 
                        <th>Provincia</th> 
                        <th>Estado</th> 
                        <th>Fecha de creacion</th> 
                        <th>Operario encargado</th> 
                        <th>Fecha de realizacion</th>  
                        <th>Anotaciones anteriores</th>
                        <th>Anotaciones posteriores</th>
                    </tr> 
                    <?php     
                    foreach ($rs as $reg) {//saco los datos de la consulta,  los datos vienen del controlador controladorELiminar

                        $provincia =  nombreProvincia($reg["Provincia"])[0]; //llamo a un helper para transformar la id de la provincia a su correspondiente nombre
                        ?>
                        <td><?php echo $reg["Descripcion"]; ?></td>      
                        <td><?php echo $reg["Persona_de_contacto"]; ?></td>   
                        <td><?php echo $reg["Telefono"]; ?></td>
                        <td><?php echo $reg["Correo"]; ?></td>   
                        <td><?php echo $reg["Direccion"]; ?></td>
                        <td><?php echo $reg["Poblacion"]; ?></td>   
                        <td><?php echo $reg["Codigo_Postal"]; ?></td>
                        <td><?php echo $provincia; ?></td>   
                        <td><?php echo $reg["Estado"]; ?></td>
                        <td><?php echo $reg["Fecha_de_creacion"]; ?></td>   
                        <td><?php echo $reg["Operario_encargado"]; ?></td>
                        <td><?php echo $reg["Fecha_de_realizacion"]; ?></td>
                        <td><?php echo $reg["Anotaciones_anteriores"]; ?></td>   
                        <td><?php echo $reg["Anotaciones_posteriores"]; ?></td>

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
