<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros Aleatorios</title>
</head>
<body>
    <?php
        /*PARA CREAR UN NUMERO RANDOM ENTRE 1 Y 3 INCLUSIVES*/
        /*
        #FORMA 1
        $n = rand(1,3);
        switch($n){
            case 1:
                echo"<p>el numero aleatrio es $n</p>";
                break;
            case 2:
                echo"<p>el numero aleatrio es $n</p>";
                break;
            default:
                echo"<p>el numero aleatrio es $n</p>";
                break; 
        }

*/
        $n =rand(1,3);

        $resultado = match ($n){
            1=>"<p>el numero aleatrio es $n</p>",
            2=>"<p>el numero aleatrio es $n</p>",
            3=>"<p>el numero aleatrio es $n</p>",
        };
        echo $resultado;
    /* COMPROBAR CON UN SWITCH SI UN NUMERO ES PAR O IMPAR */
        
        $n1 = rand(1,10);
        $resto =$n1%2;
        /*
        

        switch($resto){
            case 1:
                echo"<p>el numero aleatrio $n1 es IMPAR</p>";
                break;
            default:
                echo"<p>el numero aleatrio $n1 es PAR</p>";
                break; 
        }
                */
        $resultado2 = match ($resto){
            1=>"<p>el numero aleatrio $n1 es IMPAR</p>",
            0=>"<p>el numero aleatrio $n1 es PAR</p>",
        };
        echo $resultado2;

    ?>

</body>
</html>