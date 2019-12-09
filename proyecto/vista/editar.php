
<html>
    <head>
        <?php include '../plantilla/headerVer.php'; ?>
        <title>Modificar</title>
        <style>
            .form {
                zoom: 75%;
            }
        </style>
    </head>
    <body>
        <h1>Modifique los datos que desees</h1>
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
                            <input type="text" name="descripcion" value="<?= $reg["Descripcion"] ?>">
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
                            <input type="text" name="contacto" value="<?= $reg["Persona_de_contacto"] ?>">
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
                            <input type="text" name="telef" value="<?= $reg["Telefono"] ?>">
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
                            <input type="text" name="email" value="<?= $reg["Correo"] ?>">
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
                            <input type="text" name="Direccion" value="<?= $reg["Direccion"] ?>">
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
                            <input type="text" name="poblacion" value="<?= $reg["Poblacion"] ?>">
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
                            <input type="text" name="codigo_postal" value="<?= $reg["Codigo_Postal"] ?>">
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
                    <select id="provincia[]" name="provincia">
                        <?php
                            foreach($provincias as $reg2) {//imprime select provincias

                                    ?>
                                    <option value="<?= $reg2["cod"] ?>"><?= $reg2["nombre"] ?></option>
                                    <?php
                                }                            
                        ?>
                    </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label >Estado:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="estado" value="<?= $reg["Estado"] ?>">
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
                            <input type="text" name="fecha_realizacion" value="<?= $reg["Fecha_de_realizacion"] ?>">
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
                            <input type="text" name="encargado" value="<?= $reg["Operario_encargado"] ?>">
                        </div>
                        <div class="col-75">
                            <span id="errencargado"></span>
                        </div>                         
                    </div>    
                    <div class="row">
                        <div  class="col-25">
                            <label>Anotaciones anteriores:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="anotaciones" value="<?= $reg["Anotaciones_anteriores"] ?>">
                        </div>
                    </div>    
                    <div hidden="" class="row">
                        <div  class="col-25">
                            <label>Anotaciones post:</label>
                        </div>
                        <div class="col-75">
                            <input type="text" name="anotaciones_post" value="<?= $reg["anotaciones_post"] ?>">
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
