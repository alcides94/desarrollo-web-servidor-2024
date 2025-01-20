<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
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
    <?php 
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $nombre=depurar($_POST["nombre"]);
            $tmp_descripcion=depurar($_POST["descripcion"]);

            $cont_error=0;

            if(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                $cont_error++;
            } else {
                $descripcion = $tmp_descripcion;
            }

            if ( $cont_error===0){
                $sql = "UPDATE categorias SET
                        descripcion = '$descripcion'
                        WHERE nombre = '$nombre'";
                        
                $_conexion->query($sql);

                header("location: ../categorias/index.php");
                exit;

            }                
        }
                
        $nombre = $_GET["nombre"];
        $sql="SELECT * FROM categorias WHERE nombre = '$nombre'";
        $resultado = $_conexion -> query($sql);
                
        $categoria = $resultado -> fetch_assoc();

    ?>

    <div class="container">
        <h1>Editar Categoria</h1>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input disabled type="text" class="form-control" name="nombre" 
                    value="<?php echo $categoria["nombre"] ?>" >
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <textarea  class="form-control" name="descripcion" id="" ><?php echo $categoria["descripcion"] ?></textarea>
                <?php if(isset($err_descripcion)) echo $err_descripcion ?>
            </div>
            <div class="mb-3">
                <input type="hidden" name="nombre" value="<?php echo $categoria["nombre"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a href="index.php" class="btn btn-primary">Volver</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>