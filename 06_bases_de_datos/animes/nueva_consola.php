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
                    $titulo=$_POST["titulo"];
                    $nombre_estudio=$_POST["nombre_estudio"];
                    $anno_estreno=$_POST["anno_estreno"];
                    $num_temporadas=$_POST["num_temporadas"];


                    $sql="INSERT INTO animes (titulo, nombre_estudio, anno_estreno, num_temporadas)
                            VALUES ('$titulo', '$nombre_estudio', $anno_estreno, $num_temporadas)";


                    $_conexion -> query($sql);
                }
            ?>



            <div class="mb-3">
                <label for="" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estudio</label>
                <input type="text" class="form-control" name="nombre_estudio">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Año estreno</label>
                <input type="text" class="form-control" name="anno_estreno">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Temporadas</label>
                <input type="text" class="form-control" name="num_temporadas">
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Crear">
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>