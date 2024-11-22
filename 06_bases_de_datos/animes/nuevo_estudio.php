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
        <form action="" method="post">
            <?php
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    $nombre_estudio=$_POST["nombre_estudio"];
                    $ciudad=$_POST["ciudad"];
                    $anno_fundacion=$_POST["anno_fundacion"];


                    $sql="INSERT INTO estudios (nombre_estudio, ciudad, anno_fundacion)
                            VALUES ('$nombre_estudio', '$ciudad', $anno_fundacion)";


                    $_conexion -> query($sql);
                }
            ?>



            <div class="mb-3">
                <label for="" class="form-label">Nombre Estudio</label>
                <input type="text" class="form-control" name="nombre_estudio">
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Ciudad</label>
                <input type="text" class="form-control" name="ciudad">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Año de fundacion</label>
                <input type="text" class="form-control" name="anno_fundacion">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>