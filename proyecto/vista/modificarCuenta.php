
<html>
    <head>
        <title>Modificar  cuenta</title>
        <?php
        include '../plantilla/headerUsuario.php';
        ?>
        <style>
            .form {
                zoom: 80%;
            }
        </style>
    </head>
    <h1>Modifique los datos que desees cambiar</h1>
    <div class="form">
        <form action="" method="POST">
            <div class="row">
                <div class="col-25">
                    <label>Nuevo usuario:</label>
                </div>
                <div class="col-75">
                    <input type="text" name="newusuario" value="">
                </div> 
            </div>
            <br>
            <div class="row">
                <div class="col-25">
                    <label>Nueva contraseña:</label>
                </div>
                <div class="col-75">
                    <input type="password" name="passwordnew" value="">
                </div>              
            </div>           
            <br>            
            <div class="row">
                <input  type="submit" name="confirmar" value="Modificar">
            </div>
        </form>
    </div>
                    <?php include '../plantilla/footer.php'; ?>

</html>