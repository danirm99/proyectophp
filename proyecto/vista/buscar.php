
    <html>
    <?php 
    
    include '../plantilla/headerBuscar.php'; 
    ?>  <title>Buscar tareas</title>
        <h1>Busque las tareas</h1>
        <div class="form">

            <form action="" method="POST">

                <select id="1" name="campo1" onchange="myFunction(this.id)"> 
                    <option value="Default">Seleccione campo a buscar</option>
                    <option value="Fecha_de_creacion">Fecha</option>
                    <option value="Estado">Estado</option>
                    <option value="Descripcion">Descripcion</option> 
                </select>

                <select id="atributos1" name="atributos1">
                    <option value="Default">Seleccione atributos del campo</option>
                    <option value="LIKE">Contiene</option>  
                    <option value="=">igual a</option>  
                    <option value=">">></option>
                    <option value="<"><</option>
                </select>
                <input type="text" name="buscar1">

                <br><br><br>

                <select id="2" name="campo2" onchange="myFunction(this.id)"> 
                    <option value="Default">Seleccione un campo</option>
                    <option value="Fecha_de_creacion">Fecha</option>
                    <option value="Estado">Estado</option>
                    <option value="Descripcion">Descripcion</option> 
                </select>

                <select id="atributos2" name="atributos2">
                    <option value="Default">Seleccione un campo</option>
                    <option value="LIKE">Contiene</option>  
                    <option value="=">igual a</option>  
                    <option value=">">></option>
                    <option value="<"><</option>
                </select>
                <input type="text" name="buscar2">

                <br><br><br>

                <select id="3" name="campo3" onchange="myFunction(this.id)"> 
                    <option value="Default">Seleccione un campo</option>
                    <option value="Fecha_de_creacion">Fecha</option>
                    <option value="Estado">Estado</option>
                    <option value="Descripcion">Descripcion</option> 
                </select>

                <select id="atributos3" name="atributos3">
                    <option value="Default">Seleccione un campo</option>
                    <option value="LIKE">Contiene</option>  
                    <option value="=">igual a</option>  
                    <option value=">">></option>
                    <option value="<"><</option>
                </select>
                <input type="text" name="buscar3">

                <input  type="submit" name="confirmar" value="Buscar">
            </form>
        </div>
        <script> 
            //este script sirve para cuando el campo de busqueda sea estado o Descripcion,
            // solo salgan las opciones de  busqueda Contiene y Igual  a, ya que
            // para  esos esos campos el comparador > o < no es muy util
            function myFunction(id) {

                var campo = document.getElementById(id).value;

                if (campo !== "Fecha_de_creacion") {

                    document.getElementById("atributos" + id).selectedIndex = "Default"
                    document.getElementById("atributos" + id).options[3].hidden = true;
                    document.getElementById("atributos" + id).options[4].hidden = true;

                } else {

                    document.getElementById("atributos" + id).options[3].hidden = false;
                    document.getElementById("atributos" + id).options[4].hidden = false;

                }

            }
        </script>
     <?php include '../plantilla/footer.php'; ?>
        
</html>