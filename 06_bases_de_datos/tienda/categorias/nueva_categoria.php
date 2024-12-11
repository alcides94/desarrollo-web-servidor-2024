<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('../util/conexion.php');

        session_start();
        if (!isset($_SESSION["usuario"])){
            header("location: ../usuario/iniciar_sesion.php");
            exit;
        }
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:green;
            --bs-table-bg:beige;
        }
        span{
            color:red;
        }
    </style>
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
    <div class="container">
        
            <?php
               
                if ($_SERVER["REQUEST_METHOD"]=="POST") {

                    $tmp_nombre=depurar($_POST["nombre"]);
                    $tmp_descripcion=depurar($_POST["descripcion"]);

                    $cont_error=0;

                    if($tmp_nombre==''){
                        $err_nombre="El nombre es obligatio";
                        $cont_error++;
                    }else{
                        if(strlen($tmp_nombre)<2 || strlen($tmp_nombre)>30 ){
                            $err_nombre="el nombre debe ser entre 2 a 30 caracteres";
                            $cont_error++;
                        }else{
                            $patron="/^[a-zA-Z\ áéíóúÁÉÍÓÚÑñ]+$/";
                            if(!preg_match($patron, $tmp_nombre)){
                                $err_nombre="El nombre solo puede tener leytras o espacios en blancos";
                                $cont_error++;
                            }else{
                                $nombre=$tmp_nombre;
                            }
                        }
        
                    }

                    if(strlen($tmp_descripcion) > 255) {
                        $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                        $cont_error++;
                    } else {
                            $descripcion = $tmp_descripcion;
                    }

                    if ( $cont_error===0){
                        $sql_verificacion = "SELECT * FROM categorias WHERE nombre = '$nombre'";
                        $resultado = $_conexion->query($sql_verificacion);

                       // var_dump($resultado);
                        if ($resultado->num_rows>0){
                            $err_nombre="El nombre ya existe";
                        }else{
                            $sql="INSERT INTO categorias (nombre, descripcion)
                            VALUES ('$nombre', '$descripcion')";

                            $_conexion->query($sql);
                        }
                        
                    }
                }
            ?>

        <h1>Crear nueva categoria</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
                <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <textarea name="descripcion" id="" class="form-control" ></textarea>
                <?php if(isset($err_descripcion)) echo $err_descripcion ?>
                
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
                <a class="btn btn-secondary" href="index.php"> Volver</a>
            </div>
            
        </form>
                

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>