<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');

        session_start();
        /*if (!isset($_SESSION["usuario"])){
            header("location: ../index.php");
            exit;
        }*/
    ?>
</head>
<body>
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $usuario = $_SESSION["usuario"];

                $tmp_contrasena = $_POST["contrasena"];
                $cont_error=0;
                if($tmp_contrasena==''){
                    $err_contrasena="la constraseña es obligatoria";
                    $cont_error++;
                }else{
                    if(strlen($tmp_contrasena)<8 || strlen($tmp_contrasena)>15 ){
                        $err_contrasena="el constraseña de usuario debe ser entre 8 a 15 caracteres";
                        $cont_error++;
                    }else{
                        $patron = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/";
                        if(!preg_match($patron, $tmp_contrasena)){
                            $err_contrasena="El constraseña debe tener obligado mayuscula, minuscula y numero ";
                            $cont_error++;
                        }else{
                            $contrasena=$tmp_contrasena;
                        }
                    }
        
                }

                

                if($cont_error==0){
                    $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                    
                    $sql = "UPDATE usuarios SET
                        contrasena = '$contrasena_cifrada'
                    WHERE usuario = '$usuario'";

                    $_conexion -> query($sql);
                    $err_contrasena="la constraseña modificada";
                    //echo "adentro";
                   
                
                }   
                }
                   
        ?>
    <div class="container">
        <h1>Cambiar Credenciales</h1>

       

        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text" disabled 
                value="<?php echo $_SESSION["usuario"] ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Nueva Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Cambiar Contraseña">
                <a href="../index.php" class="btn btn-primary">Volver</a>
            </div>
        </form>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>