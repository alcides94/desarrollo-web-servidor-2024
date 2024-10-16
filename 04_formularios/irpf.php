<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULO DE IRPF</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <form action="" method="POST">
        <label for="salario">CALCULO DE IRPF</label>
        <br><br>
        <input type="text" name="salario" id="salario">
        <br><br>
        <input type="submit" value="CALCULAR">
    </form>    

    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $salario=$_POST["salario"];
            
            $r1=12450*0.19;
            $r2=($salario-$r1)*0.24;
            $r3=($salario-$r1-$r2)*0.30;
            $r4=($salario-$r1-$r2-$r3)*0.37;
            $r5=($salario-$r1-$r2-$r3)*0.45;
            
            if ($salario<12450) {
                $resultado=$salario*0.19;    
            }elseif (($salario>=12450) &&($salario<=20199)) {
                $resultado=($salario-$r1)*0.24;
            }elseif (($salario>=20200)($salario<=35199)) {
                $resultado=($salario-$r1-$r2)*0.30;
            }elseif (($salario>=35200)($salario<=59999)) {
                $resultado=($salario-$r1-$r2-$r3)*0.37;
            }elseif (($salario>=60000)($salario<=299999)) {
                $resultado=($salario-$r1-$r2-$r3-$r4)*0.45;
            }else{
                $resultado=($salario-$r1-$r2-$r3-$r4-$r5)*0.47;
            }
            
            echo $salario-$resultado;
        }
    ?>
</body>
</html>