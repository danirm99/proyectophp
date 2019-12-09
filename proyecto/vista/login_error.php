<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../Assets/css/style2.css">
    <script src="../Assets/js/jquery-3.4.1.min.js"></script>

</head>
<body>
    <form action="" method="POST" class="login-form">
        <h1>Iniciar sesión</h1>

        <div class="txtb">
            <input type="text" name="usuario" value="<?php echo $_POST["usuario"] ?>">
            <span data-placeholder="Username"></span>
        </div>


        <div class="txtb">
            <input type="password" name="password">
            <span data-placeholder="Password"></span>
        </div>

        <input type="submit" name="entrar" class="logbtn" value="Login">

        <div   class="bottom-text">
            Usuario o contraseña incorrectos
        </div>

    </form>
    
    <!--Estas script de abajo, son jquery, su funcion es al haces click en el input
    de contraseña o usuario el nombre de "usuario" y "password" se pongan en pequeñito
    arriba. Me parecio bonito para un logina asi que decidi añadirlo como  extra.-->
    <script type="text/javascript">
        $(".txtb input").on("focus", function () {
            $(this).addClass("focus");
        });
    </script>
    <script type="text/javascript">
     if($(".txtb input").val() != "") {
         $(".txtb input").addClass("focus");
     }
    </script>
    <script type="text/javascript">
        $(".txtb input").on("blur", function () {
            if($(this).val()== "")
            $(this).removeClass("focus");
        });
    </script>
</body>
</html>
