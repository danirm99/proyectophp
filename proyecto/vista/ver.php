
<html> 
    <head> 
        <title>Ver datos</title> 
        <?php include '../plantilla/headerVer.php'; ?>
        <?php include '../helpers/paginacion.php'; ?>
        <?php include '../helpers/nombreProvincia.php'; ?>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <link rel="stylesheet" href="../Assets/css/tablaFinal.css">
        <style>
            #customers {
                zoom: 64%;
            }
        </style>
    </head> 
    <body> 
        <?php  
        
        if($paginas_totales == 0) {
            
            echo "<h1>Aun no tienes tareas</h1>";
        }
        else  {
            
        
        
        ?>
        
        <br> 
        <h1>Tareas</h1> 
        <table id="customers"> 
            <thead> 
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
                    <?php
                    if ($_SESSION["admin"]) {// si el que hace login es admin
                    //  solo saldran los campos de modificar y eliminar, si es 
                    //  operatio se imprime el campo completar
                        ?>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                        <?php
                    } else {
                        ?>

                        <th>Completar</th>
                        <?php
                    }
                    ?>
                </tr> 
            </thead> 
            <?php
                    
            foreach ($rs as $reg) {//saco los datos de la consulta,  los datos vienen del controlador controladorVer
                
            
                
                $provincia = nombreProvincia($reg["Provincia"])[0];//llamo a un helper para transformar la id de la provincia a su correspondiente nombre
                ?>   
                <tr>
                    <td><?php echo $reg["Descripcion"]; ?></td>      
                    <td><?php echo $reg["Persona_de_contacto"]; ?></td>   
                    <td><?php echo $reg["Telefono"]; ?></td>
                    <td><?php echo $reg["Correo"]; ?></td>   
                    <td><?php echo $reg["Direccion"]; ?></td>
                    <td><?php echo $reg["Poblacion"]; ?></td>   
                    <td><?php echo $reg["Codigo_Postal"]; ?></td>
                    <td><?php echo $provincia ?></td>   
                    <td><?php echo $reg["Estado"]; ?></td>
                    <td><?php echo $reg["Fecha_de_creacion"]; ?></td>   
                    <td><?php echo $reg["Operario_encargado"]; ?></td>
                    <td><?php echo $reg["Fecha_de_realizacion"]; ?></td>
                    <td><?php echo $reg["Anotaciones_anteriores"]; ?></td>   
                    <td><?php echo $reg["Anotaciones_posteriores"]; ?></td>
                    
                    <?php
                    if ($_SESSION["admin"]) {// si el que hace login es admin
                    //  solo saldran los campos de modificar y eliminar, si es 
                    //  operatio se imprime el campo completar
                        ?>
                        <td><a  href="../controlador/controladorEditar.php?id=<?= $reg["Id"] ?>"><img src="../Assets/img/edit.png" alt="idk"/></a></td>
                        <td><a  href="../controlador/controladorEliminar.php?id=<?= $reg["Id"] ?>"><img src="../Assets/img/del2.png" alt="idk"/></a></td>
                        <?php
                    } else {
                        ?>
                        <td><a  href="../controlador/controladorCompletar.php?id=<?= $reg["Id"] ?>"><img src="../Assets/img/check.png" alt="idk"/></a></td>            

                        <?php
                    }
                    ?>
                </tr>

                <?php
            }
            ?>   
        </table> 
        <br><br>
        <div class="pagination"> 
            <?php
            $controlador = "controladorVer.php";//paso por una variable el nombre del controlador

            paginar($paginas_totales, $controlador, $pn);//llamo al helper de paginacion
                                //y le paso las paginas totales de la paginacion,
                                // el nombre del controlador, y la pagina actual
            ?>

        </div>   
        <?php  } ?>
                <?php include '../plantilla/footer.php'; ?>
    </body> 
</html> 