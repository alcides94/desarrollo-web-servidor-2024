<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias</title>
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
        img{
               width: 100px;
        }
    </style>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $nombre=$_POST["nombre"];
            // echo "<h1> $nombre</h1>";

            $sql ="SELECT * FROM productos";
            $resultado=$_conexion -> query($sql);
            
            while($fila=$resultado -> fetch_assoc()){
                echo "<h1>Ingreso</h1>";
                if ($fila["nombre"]==$nombre){
                    echo "<h1>Error al eliminar</h1>";
                }else {
                    $sql="DELETE FROM categorias WHERE nombre = '$nombre'";
                    $_conexion -> query($sql);
                }
            }

            
        }

        $sql= "SELECT * FROM categorias";
        $resultado = $_conexion -> query($sql);


    ?>
    <div class="container">
        <h2>Bienvenido <?php echo $_SESSION["usuario"] ?></h2> 
        <a href="../usuario/cerrar_sesion.php" class="btn btn-danger"> Cerrar Sesion</a> 
        <a href="../index.php" class="btn btn-secondary"> Inicio</a> 
        <h1>Listado de Categorias</h1>
        
        <br>
        <a class="btn btn-primary" href="nueva_categoria.php">Crear Categoria</a>
        <br><br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Descripcion</th>
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
                    <td> <?php  echo $fila["nombre"] ?> </td>
                    <td> <?php  echo $fila["descripcion"] ?> </td>
                    <!-- para borrar debemos agregar un formulario y dentro del mismo agregar un boton de borrar-->
                    <td>
                        <a class="btn btn-primary" 
                            href="editar_categoria.php?nombre=<?php echo $fila["nombre"]?>" >Editar</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            <!-- enviamos de forma oculta el ID de la fila-->
                            <input type="hidden" name="nombre" value="<?php echo $fila["nombre"] ?>">
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