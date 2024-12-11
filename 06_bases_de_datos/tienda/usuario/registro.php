<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 ); 
        
        require('../util/conexion.php');
    ?>
</head>
<body>
    <?php
        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada); //verifica que no tenga html
            $salida = trim($salida); // verifica que 
            $salida = preg_replace('/\s+/', ' ', $salida); //verifica que no tenga estapcios de mas
            return $salida;
        }
    ?>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $tmp_usuario = depurar($_POST["usuario"]);
        $tmp_contrasena = depurar($_POST["contrasena"]);

        $cont_error=0;

        if($tmp_usuario==''){
            $err_usuario="El nombre de usuario es obligatio";
            $cont_error++;
        }else{
            if(strlen($tmp_usuario)<3 || strlen($tmp_usuario)>15 ){
                $err_usuario="el nombre de usuario debe ser entre 3 a 15 caracteres";
                $cont_error++;
            }else{
                $patron="/^[a-zA-Z0-9]+$/";
                if(!preg_match($patron, $tmp_usuario)){
                    $err_usuario="El nombre de usuario solo puede tener leytras y numeros";
                    $cont_error++;
                }else{
                    $usuario=$tmp_usuario;
                }
            }

        }
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


       


        if ($cont_error==0){
            $sql_verificar = "SELECT * FROM usuarios WHERE usuario ='$usuario'";
            $resultado = $_conexion -> query($sql_verificar);
           // var_dump($resultado);
            if ($resultado -> num_rows>0) {
                $err_usuario= "El usuario ya existe";
            }else{
                $contrasena_cifrada = password_hash($contrasena, PASSWORD_DEFAULT);
                $sql = "INSERT INTO usuarios VALUES ('$usuario', '$contrasena_cifrada')";
                $_conexion -> query($sql);
                    //echo "adentro";
                    session_start();
                    $_SESSION["usuario"]=$usuario;
                    header("location: ../index.php");
                    exit;
                
            }
        
            
        }
    }
    ?>
    <div class="container">
        <h1>Formulario de registro</h1>
        <form class="col-4" action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Usuario</label>
                <input class="form-control" name="usuario" type="text">
                <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
            </div>
            <div class="mb-3">
                <label class="form-label">Contraseña</label>
                <input class="form-control" name="contrasena" type="password">
                <?php if(isset($err_contrasena)) echo "<span class='error'>$err_contrasena</span>"; ?>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Registarse">
            </div>
        </form>
        <h3>O, si ya tienes cuenta, inicia sesión</h3>
        <a class="btn btn-secondary" href="iniciar_sesion.php">Iniciar sesión</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>