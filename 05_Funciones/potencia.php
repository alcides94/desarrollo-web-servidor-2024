<?php
    function comprobarPotencia($base, $exponente){
        if ($base!="" && $exponente!="") {

            $resultado=1;
            for ($i=0; $i < $exponente; $i++) { 
                $resultado= $resultado*$base;
            }
            
            echo "<p>El resultado de elevar $base a $exponente es de $resultado</p>";
        }else{
            echo "falta campos a completar";
        }
    }

?>