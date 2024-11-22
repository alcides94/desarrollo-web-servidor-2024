<?php
    $_servidor ="localhost"; //o 127.0.0.1 (loopback)
    $_usuario="estudiante"; //usuario de la bases de datos
    $_contrasena ="estudiante"; //cantraseña de la bases de datos
    $_base_de_datos="animes_bd"; //bases de datos que vamos a usar



    //tenemos dos opciones para conectarnos a una bd
    //Mysqli (libreria mas simple) o PDO (libreria mas compleja)

    $_conexion=new Mysqli($_servidor,$_usuario,$_contrasena,$_base_de_datos)
        or die ("Error de conexion");


    /**
     * Errores: 
     * Change arraou -> 
     * 
     * 
    */

?>