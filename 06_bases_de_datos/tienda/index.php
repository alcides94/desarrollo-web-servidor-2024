<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        require('./util/conexion.php');
        
        session_start();


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
        <h1>Tienda MEDAC DAW</h1>
        <?php if (isset($_SESSION["usuario"])) { ?>
            <h2>Bienvenido <?php echo $_SESSION["usuario"] ?></h2>
            <a href="usuario/cambiar_credenciales.php" class="btn btn-warning">Cambiar Contraseña</a>
            <a href="usuario/cerrar_sesion.php" class="btn btn-danger">Cerrar Sesion</a>
            <a href="productos/index.php" class="btn btn-secondary">Productos</a>
            <a href="categorias/index.php" class="btn btn-secondary">Categorias</a>
        <?php } else { ?>
            <a href="usuario/iniciar_sesion.php" class="btn btn-danger">Iniciar Sesión</a>
        <?php } ?>
    <?php
            $sql= "SELECT * FROM productos";
            $resultado = $_conexion -> query($sql);
        ?>
        <br>
        <h1>Listado de Productos</h1>
        
        <br>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Categoria</th>
                    <th>Stock</th>
                    <th>Descripcion</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //fetch tatra a resultado como un array
                    while($fila=$resultado -> fetch_assoc()){
                ?>
                    <tr>
                        <td> <?php  echo $fila["id_producto"] ?> </td>
                        <td> <?php  echo $fila["nombre"] ?> </td>
                        <td> <?php  echo $fila["precio"] ?> </td>
                        <td> <?php  echo $fila["categoria"] ?> </td>
                        <td> <?php  echo $fila["stock"] ?> </td>
                        <td> <?php  echo $fila["descripcion"] ?> </td>
                    </tr>
                
                <?php    }
                ?>
               
            </tbody>
        </table>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>