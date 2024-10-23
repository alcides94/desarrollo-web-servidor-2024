<?php
//NUEVO
define("GENERAL", 1.21);
define("REDUCIDO", 1.10);
define("SUPERREDUCIDO", 1.04);
    function comprobarIva($precio, $iva){
        if ($precio!="" && $iva!=""){ //NUEVO
            $pvp = match($iva) {
                "general" => $precio * GENERAL,
                "reducido" => $precio * REDUCIDO,
                "superreducido" => $precio * SUPERREDUCIDO
            };

                echo "El PVP es $pvp";
        }else{
            echo "<p>faltan completear campos</p>";
        }

    }
?>