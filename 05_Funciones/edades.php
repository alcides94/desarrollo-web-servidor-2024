<?php 
    function comprobarEdad ($nombre, $edad){
        if ($nombre!="" && $edad!="") {
            echo "<p>$nombre tiene $edad</p>";
        }else{
            echo "<p>falta campos a completar</p>";
        }
    }



?>