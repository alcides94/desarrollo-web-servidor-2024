<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDADES</title>
</head>
<body>

    <form action="" method="POST" >
        <input type="text" name="nombre" id="">
        <input type="text" name="edad" id="">
        <input type="submit" value="ENVIAR">
    </form>

    <?php
    function depurar(string $entrada) : string {
        $salida = htmlspecialchars($entrada); //verifica que no tenga html
        $salida = trim($salida); // verifica que 
        $salida = preg_replace('/\s+/', ' ', $salida); //verifica que no tenga estapcios de mas
        return $salida;
    }
    ?>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = depurar($_POST["nombre"]); //llama la funcion antes de almacenar
        $edad = depurar($_POST["edad"]);// llama la funcion antes de almacenar

        $resultado = match(true) {
            $edad < 18 => "es menor de edad",
            $edad >= 18 and $edad < 65 => "es mayor de edad",
            $edad >= 65 => "se ha jubilado"
        };

        var_dump($nombre);

        echo "<p>$nombre $resultado</p>";
    }
    ?>
</body>
</html>