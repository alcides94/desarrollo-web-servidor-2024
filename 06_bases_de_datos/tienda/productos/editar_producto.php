<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
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
            $id_producto=$_POST["id_producto"];
            $tmp_nombre=depurar($_POST["nombre"]);
            $categoria=depurar(($_POST["categoria"]));
            $tmp_precio=depurar($_POST["precio"]);
            $tmp_stock=depurar($_POST["stock"]);
            $tmp_descripcion=depurar($_POST["descripcion"]);
            
            $cont_error=0;

            //VALIDACION DE NOMBRE
            if($tmp_nombre==''){
                $err_nombre="El nombre es obligatio";
                $cont_error++;
            }else{
                if(strlen($tmp_nombre)<2 || strlen($tmp_nombre)>50 ){
                    $err_nombre="el nombre debe ser entre 2 a 30 caracteres";
                    $cont_error++;
                }else{
                    $patron="/^[a-zA-Z0-9\ áéíóúÁÉÍÓÚÑñ]+$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $err_nombre="El nombre solo puede tener leytras o espacios en blancos";
                        $cont_error++;
                    }else{
                        $nombre=$tmp_nombre;
                    }
                }

            }

            //VALIDACION DE PRECIO
            if($tmp_precio == '') {
                $err_precio = "El precio es obligatorio";
                $cont_error++;
            } else {
                if(filter_var($tmp_precio, FILTER_VALIDATE_FLOAT) === FALSE) {
                    $err_precio = "El precio debe ser un número";
                    $cont_error++;
                } else {
                    if($tmp_precio < 0.0 || $tmp_precio > 9999.99) {
                        $err_precio = "El precio debe estar entre 0.0 y 9999.99";
                        $cont_error++;
                    } else {
                        $precio = $tmp_precio;
                    }
                }
            }

            //VALIDACION DE DESCRIPCION
            if(strlen($tmp_descripcion) > 255) {
                $err_descripcion = "La descripción no puede tener más de 255 caracteres";
                $cont_error++;
            } else {
                    $descripcion = $tmp_descripcion;
            }

            //VALIDACION DE STOCK
            if($tmp_stock == '') {
                $stock=0;
            } else {
                if(filter_var($tmp_stock, FILTER_VALIDATE_INT) === FALSE) {
                    $err_stock = "El stok debe ser un número";
                    $cont_error++;
                } else {
                    if($tmp_stock < 0 || $tmp_stock > 999) {
                        $err_stock = "El STOCK debe estar entre 0 y 999";
                        $cont_error++;
                    } else {
                        $stock = $tmp_stock;
                    }
                }
            }

            //COMPROBACION DE ERRORES Y ACTUALIZACION EN BASES DE DATOS
            if($cont_error==0){  
                $sql = "UPDATE productos SET
                    nombre = '$nombre',
                    categoria = '$categoria',
                    precio = $precio,
                    stock = $stock,
                    descripcion='$descripcion'
                    WHERE id_producto = $id_producto";
                    
                $_conexion -> query($sql);
            }
        }
        
        //CONSULTA DE CATEGORIAS Y SE ALMACENA A UN ARRAY
        $sql= "SELECT * FROM categorias ORDER BY nombre";
        $resultado = $_conexion -> query($sql);

        $categorias=[];

        // var_dump($resultado);

        while($fila=$resultado -> fetch_assoc()){
            array_push($categorias, $fila["nombre"]);
        }
                
        //  echo "<h1>". $_GET["id_anime"] ."</h1>";

        $id_producto = $_GET["id_producto"];
        $sql="SELECT * FROM productos WHERE id_producto = '$id_producto'";
        $resultado = $_conexion -> query($sql);
                
        $producto = $resultado -> fetch_assoc();

    ?>

    <div class="container">

    <h1> ID de Producto:  <?php echo $_GET["id_producto"] ?>  </h1>    
            <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="" class="form-label">Nombre</label>
                <input type="text" class="form-control" name="nombre" 
                    value="<?php echo $producto["nombre"] ?>">
                    <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <select name="categoria" id="" class="form-select">
                    <option value="<?php echo $producto["categoria"] ?>" selected>
                        <?php echo $producto["categoria"] ?>
                    </option>
                    <?php
                        foreach ($categorias as $categoria) { 
                        ?>
                        <option value=" <?php echo $categoria ?> "> 
                            <?php echo $categoria ?> 
                        </option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Precio</label>
                <input type="text" class="form-control" name="precio" 
                    value="<?php echo $producto["precio"] ?>">
                    <?php if(isset($err_precio)) echo "<span class='error'>$err_precio</span>"; ?>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stock</label>
                <input type="text" class="form-control" name="stock" 
                    value="<?php echo $producto["stock"] ?>">
                    <?php if(isset($err_stock)) echo "<span class='error'>$err_stock</span>"; ?>
            </div>

            <div class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <textarea class="form-control" name="descripcion" ><?php echo $producto["descripcion"] ?></textarea>
                <?php if(isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?>
                
            </div>
            
           <!-- <div class="mb-3">
                <label for="" class="form-label">Año estreno</label>
                <input type="file" class="form-control" name="imagen">
            </div> -->
            <div class="mb-3">
                <input type="hidden" name="id_producto" value="<?php echo $producto["id_producto"] ?>">
                <input class="btn btn-primary" type="submit" value="Modificar">
                <a href="index.php" class="btn btn-primary">Volver</a>
            </div>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>