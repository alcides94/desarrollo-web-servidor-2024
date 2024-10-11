<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 </title>
</head>
<body>
    <!--EJERCICIO 1: Realiza un formulario que reciba 3 números y devuelva el mayor de ellos.-->
 
    <form action="" method="POST">
        <label for="num1" style="color:red;"><b>Averiguar el Numero Mayor de los siguientes Numeros</b></label>
        <br><br>
        <input type="text" name="num1" id="num1">
        <br><br>
        <input type="text" name="num2" id="num2">
        <br><br>
        <input type="text" name="num3" id="num3">
        <br><br>
        <input type="submit" value="Mayor">
    </form>
    
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST")
        $num1=$_POST["num1"];
        $num2=$_POST["num2"];
        $num3=$_POST["num3"];

    if ($num1==$num2 && $num1==$num3){
        echo "<p>Los numeros son iguales</p>";
    }else{
        if ($num1>=$num2 && $num1>=$num3){
            echo ("<p>El <b>$num1</b> es mayor</p>");
        }elseif ($num2>=$num1 && $num2>=$num3){
            echo ("<p>El <b>$num2</b> es mayor</p>");
        }else{
            echo ("<p>El <b>$num3</b> es mayor</p>");
        }
    }
    ?>

</body>
</html>