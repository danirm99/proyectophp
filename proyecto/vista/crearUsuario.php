
<html>
    <head>
        <title>Agregar</title>
        <?php
        include '../plantilla/headerNuevoUsuario.php';
        ?>
        <style>
            .form {
                zoom: 80%;
            }
        </style>
    </head>
    <h1>Inserte datos del nuevo usuario</h1>
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <div class="col-25">
                    <label>Nombre de usuario:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="usuario" value="">
                </div> 
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label>Contraseña:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="password" value="">
                </div>              
            </div>           
            <br>            
            <div class="row">
                <input  type="submit" name="confirmar" value="Crear">
            </div>
        </form>
    </div>
     <?php include '../plantilla/footer.php'; ?>
    
</html>