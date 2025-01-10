<?php
    $_servidor ="localhost"; //o 127.0.0.1 (loopback)
    $_usuario="estudiante"; //usuario de la bases de datos
    $_contrasena ="estudiante"; //cantraseña de la bases de datos
    $_base_de_datos="animes_bd"; //bases de datos que vamos a usar

    try{
        $_conexion = new PDO("mysql:host=$_servidor;dbname=$_base_de_datos,
        $_usuario,$_contrasena");

        $_conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    }catch(PDOException $e){
        die("conexion fallida: " . $e -> getMessage());
    }




?>