<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potencia</title>
</head>
<body>
    <?php
    /**CREAR UN FORMULARIO QUE RECIBE DOS NUMEROS; BASE Y EXPONENTE 
     * SE MOSTRARA EL RESULTADO DE ELEVAR LA BASE AL EXPONENTE
     * 
     * EJEMPLOS
     * 2 ELEVADO A 3 = 8 => 2*2*2
     * 
    */
    ?>

    <form action="" method="POST" >
        <input type="text" name="base" id="">
        <input type="text" name="exp" id="">
        <input type="submit" value="Enviar">

    </form>
    
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $base= (int) $_POST["base"];
            $exp= (int) $_POST["exp"];
            $resultado=1;
                for ($i=0; $i < $exp; $i++) { 
                    $resultado=$resultado*$base;
                }
                echo "<h1>$resultado</h1>";
            
        }
    
    ?>


</body>
</html>