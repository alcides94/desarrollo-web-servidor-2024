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
        <?php
            $sql= "SELECT * FROM consolas";
            $resultado = $_conexion -> query($sql);
        ?>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Fabricante</th>
                    <th>Generacion</th>
                    <th>Unidades Vendidas</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //fetch tatra a resultado como un array
                    while($fila=$resultado -> fetch_assoc()){
                ?>
                    <tr>
                        <td> <?php  echo $fila["nombre"] ?> </td>
                        <td> <?php  echo $fila["fabricante"] ?> </td>
                        <td> <?php  echo $fila["generacion"] ?> </td>
                        <td> <?php  if ($fila["unidades_vendidas"]===null) {
                                echo "No tiene unidades Vendidas";
                            }else{echo $fila["unidades_vendidas"]; }?> </td>
                    </tr>
                
                <?php    }
                ?>
               
            </tbody>
        </table>


    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>