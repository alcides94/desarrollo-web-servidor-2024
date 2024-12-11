<?php
    $_servidor ="localhost"; //o 127.0.0.1 (loopback)
    $_usuario="estudiante"; //usuario de la bases de datos
    $_contrasena ="estudiante"; //cantraseña de la bases de datos
    $_base_de_datos="tienda_bd"; //bases de datos que vamos a usar

    $_conexion=new Mysqli($_servidor,$_usuario,$_contrasena,$_base_de_datos)
        or die ("Error de conexion");

?>