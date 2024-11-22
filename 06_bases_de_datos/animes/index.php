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
        img{
               width: 100px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <?php
            $sql= "SELECT * FROM animes";
            $resultado = $_conexion -> query($sql);
        ?>
        <h1>Listado de Animes</h1>
        
        <?php
            if ($_SERVER["REQUEST_METHOD"]=="POST") {
                $id_anime=$_POST["id_anime"];
                echo "<h1> $id_anime</h1>";
                $sql="DELETE FROM animes WHERE id_anime = '$id_anime'";
                $_conexion -> query($sql);
            }
        ?>
        
        <br>
        <a class="btn btn-secondary" href="nuevo_anime.php">Nuevo anime</a>
        <br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Titulo</th>
                    <th>Estudio</th>
                    <th>Año</th>
                    <th>Numero de Temporadas</th>
                    <th>Imagen</th>
                    <th>Accion</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //fetch tatra a resultado como un array
                    while($fila=$resultado -> fetch_assoc()){
                ?>
                    <tr>
                        <td> <?php  echo $fila["titulo"] ?> </td>
                        <td> <?php  echo $fila["nombre_estudio"] ?> </td>
                        <td> <?php  echo $fila["anno_estreno"] ?> </td>
                        <td> <?php  echo $fila["num_temporadas"] ?> </td>
                        <td> <img src="<?php  echo $fila["imagen"] ?>" alt="">  </td>
                    <!-- para borrar debemos agregar un formulario y dentro del mismo agregar un boton de borrar-->
                        <td>
                            <a class="btn btn-primary" 
                            href="editar_anime.php?id_anime=<?php echo $fila["id_anime"]?>" >Editar</a>
                        </td>
                        <td>
                            <form action="" method="post">
                             <!-- enviamos de forma oculta el ID de la fila-->
                                <input type="hidden" name="id_anime" value="<?php echo $fila["id_anime"] ?>">
                                <input type="submit" class="btn btn-danger" value="Borrar">
                            </form>
                        </td>
                    </tr>
                
                <?php    }
                ?>
               
            </tbody>
        </table>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>