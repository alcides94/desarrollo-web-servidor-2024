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
        require('conexion.php')
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
        
            <?php 
                if ($_SERVER["REQUEST_METHOD"]=="POST") {
                    $id_anime=$_POST["id_anime"];
                    $titulo=$_POST["titulo"];
                    $nombre_estudio=$_POST["nombre_estudio"];
                    $anno_estreno=$_POST["anno_estreno"];
                    $num_temporadas=$_POST["num_temporadas"];

                    $sql = "UPDATE animes SET
                            titulo = '$titulo',
                            nombre_estudio = '$nombre_estudio',
                            anno_estreno = $anno_estreno,
                            num_temporadas = $num_temporadas
                            WHERE id_anime = $id_anime";
                    
                    $_conexion -> query($sql);



                }
            ?>
            
            
            <?php
                $sql= "SELECT * FROM estudios ORDER BY nombre_estudio";
                $resultado = $_conexion -> query($sql);

                $estudios=[];

                var_dump($resultado);

                while($fila=$resultado -> fetch_assoc()){
                    array_push($estudios, $fila["nombre_estudio"]);
                }
                
                echo "<h1>". $_GET["id_anime"] ."</h1>";

                $id_anime = $_GET["id_anime"];
                $sql="SELECT * FROM animes WHERE id_anime = '$id_anime'";
                $resultado = $_conexion -> query($sql);
                
                $anime = $resultado -> fetch_assoc();

            ?>


            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Titulo</label>
                <input type="text" class="form-control" name="titulo" 
                    value="<?php echo $anime["titulo"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Estudio</label>
                <select name="nombre_estudio" id="" class="form-select">
                    <option value="<?php echo $anime["nombre_estudio"] ?>" selected>
                        <?php echo $anime["nombre_estudio"] ?>
                    </option>
                    <?php
                        foreach ($estudios as $estudio) { 
                        ?>
                        <option value=" <?php echo $estudio ?> "> 
                            <?php echo $estudio ?> 
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Año estreno</label>
                <input type="text" class="form-control" name="anno_estreno" 
                    value="<?php echo $anime["anno_estreno"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Temporadas</label>
                <input type="text" class="form-control" name="num_temporadas" 
                    value="<?php echo $anime["num_temporadas"] ?>">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Año estreno</label>
                <input type="file" class="form-control" name="imagen">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id_anime" value="<?php echo $anime["id_anime"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a href="index.php" class="btn btn-primary">Volver</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>