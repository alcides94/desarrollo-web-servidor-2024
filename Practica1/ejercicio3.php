<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="post">
        <br>
        <input type="text" name="numero" id="numero">
        <br><br>
        <select name="op" id="op">
            <option value="primo">Primo</option>
            <option value="par">Par</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $numero=$_POST["numero"];
            $op=$_POST["op"];
            $esPrimo = true;

            if ($op=="primo") {
                for($i = 2; $i < $numero; $i++) {
                    if($numero % $i == 0) {
                        $esPrimo = false;
                        break;
                    }
                }
                if ($esPrimo) {
                    echo ("<p>El numero es Primo</p>");
                }else{
                    echo ("<p>El numero NO es Primo</p>");
                }
               
            }else{
                if($numero % 2 == 0) {
                    echo ("<p>El numero es Par</p>");
                }else{
                    echo ("<p>El numero NO es Par</p>");
                }

            }




        }
    ?>
</body>
</html>