<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /**SUMAR LOS NUMEROS SEGUIDOS HASTA 20 QUE SEAN PARES */
    echo"<h1>SUMAR LOS NUMEROS SEGUIDOS HASTA 20 QUE SEAN PARES</h1>";
        $suma = 0;
        for ($i=0; $i <=20 ; $i++) { 
            if ($i%2==0) {
                $suma+=$i;
            };
        }
    
        echo "<h3>la suma es $suma</h3>";


        /**MOSTRAR LA FECHA EN ESPAÑOL */

        echo"<h1>MOSTRAR LA FECHA EN ESPAÑOL</h1>";
        $dia = date ("l");
        
        $dia = match($dia){
            "Monday"=>$dia="Lunes",
            "Tuesday"=>$dia="Martes",
            "Wednesday"=>$dia="Miercoles",
            "Thursday"=>$dia="Jueves",
            "Friday"=>$dia="Viernes",
            "Saturday"=>$dia="Sabado",
            "Sunday"=>$dia="Domingo",

        };
        
        $mes = date ("F");

        $mes = match($mes){
            "January" => "Enero",
            "Febrary" => "Febrero",
            "March" => "Marzo",
            "April" =>"Abril",
            "May" => "Mayo",
            "June" => "Junio",
            "July" => "Julio",
            "August" => "Agosto",
            "September" => "Septiembre",
            "October" => "Octubre",
            "November" => "Noviembre",
            "December" => "Diciembre",
        };
        


        $dia_n =date("j");
        $anno = date("Y");
        
        echo "<h3>hoy es $dia_n $dia del $mes del $anno</h3>";


        /** EJERCICIOS DE NUEMROS PRIMOS */
        echo"<h1>EJERCICIOS DE NUEMROS PRIMOS</h1>";

        $num=7;
        $esPrimo=true;

        for ($i=2; $i < $num; $i++) { 
            if ($num%$i==0){
                $esPrimo=false;
                break;
            }
        }
        if ($esPrimo)echo"<h3>El Numero $num: es Primo</h3>";
        else echo"<h3>El Numero $num: NO es Primo</h3>";


        /** EJERCICIOS DE NUEMROS PRIMOS */
        echo"<h1>EJERCICIOS DE LOS PRIMERPS 50 NUEMROS PRIMOS</h1>";

        
        $num=2;
        $contador=0;
        echo"<ol>";
        while($contador<=50){
            $esPrimo=true;
            for ($i=2; $i <= $num; $i++) { 
                if ($num%$i==0){
                    $esPrimo=false;
                    break;
                }
            }
            if ($esPrimo){
                echo"<li>$num</li>";
                
            }else{
                $contador++;
            }
            $num++;
        }
        echo "</ol>";

    ?>




</body>