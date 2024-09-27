<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    
    <!--Indica los errores-->
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $frutas = array(
            1 => "Manzana",
            2 => "Naranaja",
            3 => "Cereza",

        );
        echo $frutas[1];
        echo "<br>";

        $frutas = array(
            "Clave 1" => "Manzana",
            "Clave 2" => "Naranaja",
            "Clave 3" => "Cereza",

        );
        echo $frutas["Clave 3"];
        echo "<br>";

        $frutas = array(
            "Manzana",
            "Naranaja",
            "Cereza",

        );
        
        array_push($frutas, "Mango", "Melocoton");
        $frutas[]="Melon";
        $frutas[7]="Uva";
        $frutas[]="Sandia";
        print_r($frutas);
        /**
         * el array values machaca las claves y las vuelve asignar de 0
         */
        $frutas=array_values($frutas);

        /**
         * para eliminar se utiliza la funcion unset($array)
         */

        unset($frutas[1]);

        echo "<br>";
        print_r($frutas);

    /** 
     * CREAR UN ARRAY CON LA LISTA DE PERSONAS ONDE LA CCLAVE SEA
     * EL DENI Y EL VALOIRE EL NOMBRE
     * 
     * MINIMO 3 PEROSNAS
     * 
     * MOSTRAR EL ARRAY COMPLETO  CON PRINT_R Y A ALGUNA PERSONA 
     * INDIVIDUAL
     * 
     * AÑADIR ELEMENTOS CON Y SIN CLAVE
     * 
     * BORRARR ALGUN ELEMNTO
     * 
     * PROBAR RESETEAR LAS CLAVES
     * 
    */
    $personas = array(
        "Z1545844F" => "Alejandro Quinteros",
        "W7846565V" => "Jose Cortez",
        "S7887855E" => "Ana Gomez",

    );
    echo "<br>";
    print_r($personas);
    echo "<br>";
    echo $personas["Z1545844F"];
    /**AÑADIR CON CLAVE */
    $personas["A8989898A"]= "Oscar Gomez";
    /**AÑADIR SIN CLAVE */
    $personas [] ="Jorge Lopez";
    array_push($personas,"Alfredo Zuan");
    print_r($personas);
    /**ELIMINACION DE LUGAR */
    unset($personas["Z1545844F"]);
    /**RESETEO DE CLAVE */
    $personas=array_values($personas);

    echo "<br>";
    print_r($personas);
 

    ?>
    
</body>
</html>