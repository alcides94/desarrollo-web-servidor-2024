<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INiciar Sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('../conexion.php')
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:green;
            --bs-table-bg:beige;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $usuario =$_POST["usuario"];
            $contrasena =$_POST["contrasena"];
            
            $sql = "SELECT * FROM usuarios WHERE usuario ='$usuario'";
            $resultado = $_conexion -> query($sql);
            var_dump($resultado);
            if ($resultado -> num_rows==0) {
                echo "El usuario no existe";
            }else{
                $info_usuario=$resultado -> fetch_assoc();
                $acceso_conseguido = password_verify($contrasena, $info_usuario["contrasena"]);
                if (!$acceso_conseguido) {
                    echo "Contraseña erronea";
                }else{
                    //echo "adentro";
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    header("location: ../index.php");
                    exit;
                }
            }

            /**
             * $_COOKIE -> se almacenan en el cliente 
             * 
             * $_SESSION -> se almacenan en el servidor
             */
        }
    ?>
    <div class="container">
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
      
            <div class="mb-3">
                <label for="" class="form-label">Usuario</label>
                <input type="text" class="form-control" name="usuario">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Contraseña</label>
                <input type="password" class="form-control" name="contrasena">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Iniciar Sesion">
            </div>
        </form>
        <h3>O, si aun no tienes cuenta registrate</h3>
        <a class="btn btn-secondary" href="registro.php">Registrarse</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>