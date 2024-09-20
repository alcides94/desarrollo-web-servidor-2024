<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <?php
    //2e5 = es 2x10 elevado a la 5
    $var = "Hola mundo";
    //echo $var;

    //te muestra la ruta, tipo y valor de una variable 
    //(en caso de los string muestra la cantidad de letras)
    var_dump($var);

    //se cambia el tipo segun la asignacion de valor
   //$var = false;
    var_dump($var);
    
    //DECLARACION DE Constate
    define("EDAD", 25);
    echo EDAD;
    echo "<br>";
    
    //dentro de PHP se puede poner html y css 
    echo "La variable es <h1 style='color:orange'>$var</h1>";
    
    $frase1 ="Hola";
    $frase2 ="Mundo";
    
    //concatenacion de variables
    echo $frase1." ".$frase2;
    echo "<p>$frase1 "   .   "$frase2</p>";

    ?>
</body>
</html>