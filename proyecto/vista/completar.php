<html>
    <head>
        <?php include '../plantilla/headerVer.php'; ?>   
        <?php include '../helpers/nombreProvincia.php'; ?>

        <title>Completar tareas</title>
        <style>
            .form {
                zoom: 75%;
            }
        </style>
    </head>
    <body>
        <h1>Seleccione el estado de la tarea y pon alguna anotacion</h1>
        <?php
        foreach ($rs as $reg) {
            ?>             
            <div class="form">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-25">
                            <label>Descripcion:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="descripcion" readonly value="<?= $reg["Descripcion"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errdescripcion"></span>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Persona de contacto:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="contacto" readonly value="<?= $reg["Persona_de_contacto"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errcontacto"></span>
                        </div>                
                    </div>    
                    <div class="row">
                        <div class="col-25">
                            <label>Telefono de contacto</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="telef" readonly value="<?= $reg["Telefono"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errtelef"></span>
                        </div>                 
                    </div>
                    <div class="row"> 
                        <div class="col-25">
                            <label>Correo:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="email" readonly value="<?= $reg["Correo"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="erremail"></span>
                        </div>                 
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Direccion:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="Direccion" readonly value="<?= $reg["Direccion"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errDireccion"></span>
                        </div>                
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label>Poblacion:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="poblacion" readonly value="<?= $reg["Poblacion"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errpoblacion"></span>
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-25" >
                            <label >Codigo postal:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="codigo_postal" readonly value="<?= $reg["Codigo_Postal"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errcodigo_postal"></span>
                        </div>                  
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label >Provincia:</label>
                        </div>
                        <div class="col-75">
                            <?php
                            $provincia = nombreProvincia($reg["Provincia"])[0];
                            ?> 
                            <input type="text" name="provincia" readonly value="<?php echo $provincia ?>">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label >Estado:</label>
                        </div>
                        <div class="col-75">
                            <label><input type="radio" name="estado"  value="P">Pendiente</label>
                            <label><input type="radio" name="estado"  value="R" checked>Realizada</label>
                            <label><input type="radio" name="estado"  value="C">Cancelada</label>
                        </div>
                        <div class="col-75">
                            <span id="errestado"></span>
                        </div>                 
                    </div>    
                    <div class="row">
                        <div  class="col-25">
                            <label>Fecha de realizacion:</label>
                        </div>
                        <div class="col-75">
                            <input type="date" name="fecha_realizacion" readonly value="<?= $reg["Fecha_de_realizacion"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errfecha_realizacion"></span>
                        </div>                 
                    </div>
                    <div class="row">
                        <div  class="col-25">
                            <label>Operario encargado:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="encargado" id="encargado" readonly value="<?= $reg["Operario_encargado"] ?>">
                        </div>
                    </div>    
                    <div hidden class="row">
                        <div  class="col-25">
                            <label>Anotaciones anteriores:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="anotaciones" value="">
                        </div>
                    </div>  
                    <div class="row">
                        <div  class="col-25">
                            <label>Anotaciones:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="anotaciones_post" value="<?= $reg["Anotaciones_posteriores"] ?>">
                        </div>
                    </div>
                    <div class="row">
                        <input  type="submit" name="confirmar" value="Entregar">
                    </div>
                </form>
            </div>


            <?php
        }
        ?>
     <?php include '../plantilla/footer.php'; ?>

    </body>
</html>
