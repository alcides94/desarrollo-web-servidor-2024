<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        span{
            color:red;
        }
    </style>
</head>


<body>
    <?php
        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('/\s+/', ' ', $salida);
            return $salida;
        }
    ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $tmp_nombre_estudio=depurar($_POST["nombre_estudio"]);
        $tmp_ciudad=depurar($_POST["ciudad"]);

        if ($tmp_nombre_estudio==''){
            $err_nombre_estudio="No puede estar Vacio";
        }else{
            $patron="/^[A-Za-z0-9\ áÁeÉíÍóÓúÚ]+$/";
            if (!preg_match($patron,$tmp_nombre_estudio)) {
                $err_nombre_estudio="Solo debe tener letras, espacio y numeros";
            }else{
                $nombre_estudio=$tmp_nombre_estudio;
            }
        }

        if ($tmp_ciudad==''){
            $err_ciudad="No puede estar Vacio";
        }else{
            $patron1="/^[A-Za-z\ áÁeÉíÍóÓúÚ]+$/";
            if (!preg_match($patron1,$tmp_ciudad)) {
                $err_ciudad="Solo debe tener letras y espacio";
            }else{
                $ciudad=$tmp_ciudad;
            }
        }


    }
    ?>

    <form action="" method="post">
        <input type="text" name="nombre_estudio" id="" class="nom_estudio" placeholder="Nombre Estudio">
        <?php if (isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>" ?>
        <br><br>
        <input type="text" name="ciudad" id="" class="ciudad" placeholder="Ciudad">
        <?php if (isset($err_ciudad)) echo "<span class='error'>$err_ciudad</span>" ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>