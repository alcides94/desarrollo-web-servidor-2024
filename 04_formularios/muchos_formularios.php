<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
     <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        //llamar a una funcion

        require('../05_Funciones/iva.php'); //NUEVO

        require('../05_Funciones/irpf.php'); //NUEVO
    ?>
    
</head>
<body>
    

    <h2>IVA</h2>
    <form action="" method="post">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio"><br><br>
        <label for="iva">IVA</label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="hidden" name="accion" value="formulario_iva"> <!--NUEVO-->
        <input type="submit" value="Calcular PVP">
    </form>

    <h2>IRPF</h2>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="hidden" name="accion" value="formulario_irpf"> <!--NUEVO-->
        <input type="submit" value="Calcular salario bruto">
    </form>

    <h2>TEMPERATURA</h2>
    <form action="" method="post">
        <input type="number" name="temperatura" placeholder="temperatura"><br><br>
        <label>Unidad inicial: </label>
        <select name="unidad_inicial">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <label>Unidad final: </label>
        <select name="unidad_final">
            <option value="C">Celsius</option>
            <option value="K">Kelvin</option>
            <option value="F">Fahrenheit</option>
        </select><br><br>
        <input type="hidden" name="accion" value="TEMPERATURA"> <!--NUEVO-->
        <input type="submit" value="Convertir">
    </form>

    <?php 
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if ($_POST["accion"]=="formulario_iva"){ //NUEVO
                $precio=(int)$_POST["precio"];
                $iva= (int)$_POST["iva"];

                comprobarIva($precio,$iva);
            }

            if($_POST["accion"]=="formulario_irpf"){ //NUEVO
                $salario=$_POST["salario"];

                comprobarIrpf($salario);
            }


        
        }
    
    ?>


</body>


</html>