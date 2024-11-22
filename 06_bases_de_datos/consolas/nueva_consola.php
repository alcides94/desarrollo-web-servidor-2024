<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('./conexion.php')
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:green;
            --bs-table-bg:beige;
        }
    </style>
</head>
<body>

    <div class="container">
        <form action="" method="post" enctype="multipart/form-data">
            <?php
                $sql= "SELECT * FROM fabricantes ORDER BY fabricante";
                $resultado = $_conexion -> query($sql);

                $fabricantes=[];

                var_dump($resultado);

                while($fila=$resultado -> fetch_assoc()){
                    array_push($fabricantes, $fila["fabricante"]);
                }

                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    var_dump($estudios);

                    $nombre=$_POST["nombre"];
                    $fabricante=$_POST["fabricante"];
                    $generacion=$_POST["generacion"];
                    $unidades_vendidas=$_POST["unidades_vendidas"];
                    //la imagen es un array doble

                    //$nombre_imagenes=$_FILES["imagen"]["name"];
                    
                    var_dump($_FILES["imagen"]); //me da toda la informacion de la imagen 

                    $direccion_temporal=$_FILES["imagen"]["tmp_name"];
                    $nombre_imagen=$_FILES["imagen"]["name"];
                    move_uploaded_file($direccion_temporal, "./imagenes/$nombre_imagen");


                    $sql="INSERT INTO consolas (nombre, fabricante, generacion, unidades_vendidas, imagen)
                            VALUES ('$nombre', '$fabricante', $generacion, $unidades_vendidas, './imagenes/$nombre_imagen')";


                    $_conexion -> query($sql);
                }
            ?>



            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Fabricante</label>
                <select name="fabricante" id="" class="form-select">
                    <?php
                        foreach ($fabricantes as $fabricante) { 
                        ?>
                        <option value=" <?php echo $fabricante ?> "> 
                            <?php echo $fabricante ?> 
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Generacion</label>
                <input type="text" class="form-control" name="generacion">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Unidades Vendidas</label>
                <input type="text" class="form-control" name="unidades_vendidas">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Imagen</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>