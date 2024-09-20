<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Numeros</title>
</head>
<body>
    <?php
    $numero = 0;
    /*
    //HAY 3 FORMAS de implementar el IF
    
    if ($numero>0){
        echo "<p>El numero es positivo</p>";
    }
    if ($numero>0) echo "<p>El numero es positivo</p>";
    
    if ($numero>0):
        echo "<p>El numero es positivo</p>";
    endif;
    */
/*
    //HAY 3 FORMAS de implementar el ELSE
    if ($numero>0){
        echo "<p>1·El numero es positivo</p>";
    }else{
        echo "<p>1·El numero NO es positivo</p>";
    }
   
    if ($numero>0) echo "<p>2·El numero es positivo</p>";
    else echo "<p>2·El numero NO es positivo</p>";
 
    if ($numero>0):
        echo "<p>3·El numero es positivo</p>";
    else:
        echo "<p>3·El numero NO es positivo</p>";
    endif;

*/
/*
    //HAY 3 FORMAS de implementar el ELSEif
    if ($numero>0){
        echo "<p>1·El numero es positivo</p>";
    }elseif ($numero==0){
        echo "<p>1·El numero es cero</p>";
    }else{
        echo "<p>1·El numero NO es positivo</p>";
    }
   
   
    if ($numero>0) echo "<p>2·El numero es positivo</p>";
    elseif ($numero==0) echo "<p>2·El numero es cero</p>";
    else echo "<p>2·El numero NO es positivo</p>";
    
    
    if ($numero>0):
        echo "<p>3·El numero es positivo</p>";
    elseif ($numero==0):
            echo "<p>3·El numero es cero</p>";
    else:
        echo "<p>3·El numero NO es positivo</p>";
    endif;
*/
/*
    /*
    IDENTIFICAR SI EL NUMERO SE ENCUENTRA EN ALGUN VALOR
    */
    $numero =13;
    #   Rangos:[-10,0), [0,10],(10,20]
/*
    if($numero>=-10 && $numero<0){
        echo "El numero $numero esta en el rango [-10,0)";        
    }elseif($numero>=0 and $numero<=10){
        echo "El numero $numero esta en el rango [0,10]";  
    }elseif($numero>10 and $numero<=20){
        echo "El numero $numero esta en el rango (10,20]";  
    }else{
        echo"El numero $numero NO esta en ningun rango";
    }

    echo"<br>";

    if($numero>=-10 && $numero<0):
        echo "El numero $numero esta en el rango [-10,0)";        
    elseif($numero>=0 and $numero<=10):
        echo "El numero $numero esta en el rango [0,10]";  
    elseif($numero>10 and $numero<=20):
        echo "El numero $numero esta en el rango (10,20]";  
    else:
        echo"El numero $numero NO esta en ningun rango";
    endif;
*/
    /*
    IDENTIFICAR CON UN IF QUE DECIDA QUE NUMERO ES MAYOR, MENOR O SI ES IGUAL 
    hacerlo de dos formas diferentes
    */
    echo"<br>";
    $numero1=4;
    $numero2=4;

    if($numero1 > $numero2){
        echo "<p>El numero $numero1 es MAYOR a $numero2</p>";        
    }elseif($numero1 < $numero2){
        echo "<p>El numero $numero1 es MENOR a $numero2</p>"; 
    }else{
        echo "<p>El numero $numero1 es IGUAL a $numero2</p>";  
    }

    if($numero1 > $numero2) echo "<p>El numero $numero1 es MAYOR a $numero2</p>";        
    elseif($numero1 < $numero2) echo "<p>El numero $numero1 es MENOR a $numero2</p>"; 
    else echo "<p>El numero $numero1 es IGUAL a $numero2</p>";  
    

    if($numero1 > $numero2):
        echo "<p>El numero $numero1 es MAYOR a $numero2</p>";        
    elseif($numero1 < $numero2):
        echo "<p>El numero $numero1 es MENOR a $numero2</p>"; 
    else:
        echo "<p>El numero $numero1 es IGUAL a $numero2</p>";  
    endif;

    ?>
</body>
</html>