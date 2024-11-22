<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Formulario</title>
</head>
<body>
    <?php
    /**
     * 
     * SINGLE PAGE FORM -> TODA LA INFORMACION SE PROCESA EN LA MISMA PAGINA
     * 
     * MULTI PAGE FORM -> REENVIAN A OTRA PAGINA
     * 
     */
    
    
    ?>

    <form action="" method="POST">
        <input type="text" name="mensaje" id="">
        <input type="text" name="numero" id="">
        <input type="submit" value="Enviar">
    </form>

    <?php
    /*

        EL SERVIDOR EJECUTARA ESTE BLOQUE DE CODIGO CUANDO RECIBA 
        UNA PATICION A TRAVES DEL METODO POST

        if ($_SERVER["REQUEST_METHOD"]=="POST"){
        /**
        
            
            $mensaje = $_POST["mensaje"];
            echo "<h1>$mensaje</h1>";
        }

    */


    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        /**
         * EL SERVIDOR EJECUTARA ESTE BLOQUE DE CODIGO CUANDO RECIBA 
         * UNA PATICION A TRAVES DEL METODO POST
         */
            $numero = (int)$_POST["numero"];
            $mensaje = $_POST["mensaje"];

            for ($i=0; $i < $numero ; $i++) { 
                echo "<h1>$mensaje</h1>";
            }
            
        }
    



    ?>


</body>
</html>