<?php
include "../helpers/VPost.php"
?>
<html>
    <head>
        <title>Modificar</title>
        <style>
            .form {
                zoom: 75%;
            }
        </style>
    </head>
    <body>
<?php include '../plantilla/headerVer.php'; ?>        
        <h1>Modifique los campos que desees</h1>        
        <div class="form">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-25">
                        <label>Descripcion:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="descripcion" value="<?= VPost("descripcion") ?>">
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
                        <input type="text" name="contacto" value="<?= VPost("contacto") ?>">
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
                        <input type="text" name="telef" value="<?= VPost("telef") ?>">
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
                        <input type="text" name="email" value="<?= VPost("email") ?>">
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
                        <input type="text" name="Direccion" value="<?= VPost("Direccion") ?>">
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
                        <input type="text" name="poblacion" value="<?= VPost("poblacion") ?>">
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
                        <input type="text" name="codigo_postal" value="<?= VPost("codigo_postal") ?>">
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

                                if ($_POST["provincia"] == $reg2["cod"]) {
                                    ?>

                                    <option value="<?= $reg2["cod"] ?> " selected><?= $reg2["nombre"] ?></option>

                                    <?php
                                    
                                } else {
                                    ?>

                                    <option value="<?= $reg2["cod"] ?>"><?= $reg2["nombre"] ?></option>
                                    <?php
                                }
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
                        <input type="text" name="estado" value="<?= VPost("estado") ?>">
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
                        <input type="text" name="fecha_realizacion" value="<?= VPost("fecha_realizacion") ?>">
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
                        <input type="text" name="encargado" value="<?= VPost("encargado") ?>">
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
                        <input type="text" name="anotaciones" value="<?= VPost("anotaciones") ?>">
                    </div>
                </div>
                <div hidden="" class="row">
                    <div  class="col-25">
                        <label>Anotaciones post:</label>
                    </div>
                    <div class="col-75">
                        <input type="text" name="anotaciones_post" value=" <?= VPost("anotaciones_post") ?> ">
                    </div>
                </div>      
                <div class="row">
                    <input  type="submit" name="confirmar" value="Entregar">
                </div>
            </form>
        </div>
    </body>
         <?php include '../plantilla/footer.php'; ?>
</html>