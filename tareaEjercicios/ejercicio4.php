<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );

    
    ?>
</head>
<body>
<!-- EJERCICIO 4: Realiza un formulario que funcione a modo de conversor de temperaturas. Se introducirá en un campo de texto la temperatura, y luego tendremos un select para elegir las unidades de dicha temperatura, y otro select para elegir las unidades a las que queremos convertir la temperatura.

Por ejemplo, podemos introducir "10", y seleccionar "CELSIUS", y luego "FAHRENHEIT". Se convertirán los 10 CELSIUS a su equivalente en FAHRENHEIT.

En los select se podrá elegir entre: CELSIUS, KELVIN y FAHRENHEIT. -->


<form action="" method="POST">
    <label for="grados"  style="color:red;"><b>CONVERSOR DE TEMPERATURAS</b></label>
    <br><br>
    <input type="text" name="grados" id="grados">
    <br><br>
    <select name="op1" id="op1">
        <option value="celsius">CELSIUS</option>
        <option value="fahrenheit">FAHRENHEIT</option>
        <option value="kelvin">KELVIN</option>
    </select>
    <br><br>
    <label for="conversion">CONVERTIRLO A </label>
    <br><br>
    <select name="op2" id="op2">
        <option value="celsius">CELSIUS</option>
        <option value="fahrenheit">FAHRENHEIT</option>
        <option value="kelvin">KELVIN</option>
    </select>
    <br><br>
    <input type="submit" value="CONVERTIR">
</form>

<?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $grados=$_POST["grados"];
        $op1=$_POST["op1"];
        $op2=$_POST["op2"];
        if ($grados==""){
            echo("<p>Debe ingresar algun numero para convertir</p>");
        }else{
            $resultado=$grados;
            $resultado = match (true) {
                ($op1=="celsius")&&($op2=="fahrenheit")=> ($grados*9/5)+32, 
                ($op1=="celsius")&&($op2=="kelvin")=> $grados+273.15,
                ($op1=="fahrenheit")&&($op2=="celsius")=> ($grados -32)*5/9,
                ($op1=="fahrenheit")&&($op2=="kelvin")=> ((($grados-32)*5)/9)+273.15,
                ($op1=="kelvin")&&($op2=="celsius")=> $grados-273.15,
                ($op1=="kelvin")&&($op2=="fahrenheit")=> ((($grados-273.15)*9)/5)+32,
                ($op1==$op2)=> $grados,
            };
            
            echo ("<p>$grados  $op1  =  $resultado   $op2</p>");
        }
    }

?>
</body>
</html>