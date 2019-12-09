
<html>
    <head>
        <title>Agregar tarea</title>
        <?php
        include '../plantilla/headerForm.php';
        ?>
        <style>
            .form {
                zoom: 75%;
            }
        </style>
    </head>
    <h1>Rellene los datos</h1>
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <div class="col-25">
                    <label>Descripcion:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="descripcion" value="">
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
                    <input type="text" name="contacto" value="">
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
                    <input type="text" name="telef" value="">
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
                    <input type="text" name="email" value="">
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
                    <input type="text" name="Direccion" value="">
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
                    <input type="text" name="poblacion" value="">
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
                    <input type="text" name="codigo_postal" value="">
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
                            foreach($provincias as $reg) {//imprime select provincias
                                    ?>
                                    <option value="<?= $reg["cod"] ?>"><?= $reg["nombre"] ?></option>
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
                    <input type="text" name="estado" value="">
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
                    <input type="text" name="fecha_realizacion" value="">
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
                    <input type="text" name="encargado" value="">
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
                    <input type="text" name="anotaciones" value="">
                </div>
            </div>
            <div hidden="" class="row">
                <div  class="col-25">
                    <label>Anotaciones post:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="anotaciones_post" value="">
                </div>
            </div>      
            <div class="row">
                <input  type="submit" name="confirmar" value="Entregar">
            </div>
        </form>
    </div>
     <?php include '../plantilla/footer.php'; ?>
</html>