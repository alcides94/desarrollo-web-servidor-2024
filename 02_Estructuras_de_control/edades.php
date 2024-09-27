<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edades</title>
</head>
<body>
    <?php
        /*
        CON IF Y MATCH
        -Si la persona tiene entre 0 y 4 años, es BEBE
        -Si la persona tiene entre 5 y 17 años, es MENOR DE EDAD
        -Si la persona tiene entre 18 y 65 años, es ADULTO
        -Si la persona tiene entre 66 y 120 años, es JUBILADO
        -Si esta fuera del rango es ERROR
        */
        $edad = rand(-10,140);
        echo"<h1>IF</h1>";
        if ($edad >=0 && $edad <=4): echo "tiene $edad años Es un bebe";
        elseif ($edad >=5 && $edad <=17): echo "tiene $edad años Es un MENOR DE EDAD";
        elseif ($edad >=18 && $edad <=65): echo "tiene $edad años Es un ADULTO";
        elseif ($edad >=66 && $edad <=120): echo "tiene $edad años Es un JUBILADO";
        else: echo "Error";
        endif;
        
        echo"<h1>MATCH</h1>";

        $resultado = match (true) {
             $edad >=0 && $edad <=4 => "tiene $edad años Es un bebe",
             $edad >=5 && $edad <=17 => "tiene $edad años Es un MENOR DE EDAD",
             $edad >=18 && $edad <=65 => "tiene $edad años Es un ADULTO",
             $edad >=66 && $edad <=120 => "tiene $edad años Es un JUBILADO",
             default => "ERROR"
        };
       
        echo $resultado;

    ?>    

</body>
</html>