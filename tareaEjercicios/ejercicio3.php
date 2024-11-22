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
<!-- EJERCICIO 3: Realiza un formulario que reciba dos números y devuelva todos los números primos dentro de ese rango (incluidos los extremos). -->
    <form action="" method="POST">
    <label for="num1" style="color:red;"><b>PRIMOS</b></label>
        <br><br>
        <label for="num1" style="color:red;"><b>Entre</b></label>
        <input type="text" name="num1" id="num1">
        <label for="num1" style="color:red;"><b>a</b></label>
        <input type="text" name="num2" id="num2">
        <br><br>
        <input type="submit" value="PRIMOOOO">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $num1=$_POST["num1"];
        $num2=$_POST["num2"];
        
        if ($num1>$num2){
            echo "<p>El campo 1 debe ser menor o igual al campo 2</p>";
        }else{
            $resultado="";
            for ($i = $num1; $i<=$num2; $i++){
                $esPrimo=true;
                if ($i==1) continue;
                for ($j=2; $j <  $i; $j++) { 
                    if ($i%$j==0){
                        $esPrimo=false;
                        break;
                    }
                }
                if ($esPrimo) {$resultado=$resultado .  " " . $i. " ";}
            }
            if ($resultado!=""){
                echo "<p>Los numeros primos son $resultado</p>";
            }else {
                echo "<p>NO hay numeros primos</p>";
            }
        }
    }
    ?>
</body>
</html>