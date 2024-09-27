<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fechas</title>
</head>
<body>
    <?php
    //imprime nombre dia
    echo date("l");
    //imprime numero dia 
    echo "<br>";
    echo date("j");
    
    //imprime si el numero del dia es par o impar
    $dia = date("j");

    if ($dia%2==0) echo "<p>El numero del dia es par</p>";
    else echo "<p>ES IMPAR</p>";

    ?>
</body>
</html>