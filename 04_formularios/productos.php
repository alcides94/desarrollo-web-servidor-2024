<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
    $productos=[
        ["Nintendo Switch",300],
        ["Play 5",500],
        ["Family",30],
        ["XBOX",300],
        ["PC",900],
    ];

    /**
     * Añadir al array una tercera columna que sera el stock y se generara
     * con un rand entre 0 y 5
     * 
     * Mostrar en una tabla cada productojunto a su precio y su stock
     * 
     * crear un formulario donde se introduzca el nombre de un producto y:
     * 
     * -si hay stock decimos que esta disponible y su precio
     * -si no hay decimos que esta agotado
     */
    
     for ($i=0; $i<count($productos); $i++){
        $productos[$i][2]=rand(0,5);
     }
    ?>

    <table>
        <thead>
            <caption></caption>
            <tr>
                <th>Nombre</th>
                <th>Producto</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($productos as $producto){
                list($nom_producto, $precio, $stock)=$producto;
            ?>
            <tr>
                <td><?php echo $nom_producto ?></td>
                <td><?php echo $precio ?></td>
                <td><?php echo $stock ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <br><br>

    <form action="" method="POST" >
        <label for="producto">NOmbre del producto</label>
        <input type="text" name="producto" id="producto">
        <input type="submit" value="Ingresar">
    </form>
            <!-- $_SERVER ES UN ARRAY -->
    <?php 
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $producto=$_POST["producto"];
            
            $i=0;
            $encontrado=false;
            $fila=null;
            
            while($i < count($productos) && !$encontrado){
                if ($productos[$i][0]==$producto){
                    $encontrado=true;
                    $fila=$i;
                }
                $i++;
            }
            if ($encontrado && $productos[$fila][2] != 0){
                echo "<p>Tenemos ".$productos[$fila][2]." unidades de " .$producto. " en stock  </p>";
            }elseif ($encontrado && $productos[$fila][2] == 0){
                echo "<p>No tenemos stock del producto: ".$producto."</p>";
            }else{
                echo "<p>El producto $producto no exite </p>";
            }
        }
    ?>
    
</body>
</html>