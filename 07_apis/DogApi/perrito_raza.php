<!--/**

La Dog API nos ofrece imágenes aleatorias de diferentes perritos.

Ejercicio 2: Crea una página llamada perrito_raza.php que nos muestre un
perrito al azar de la raza escogida. La raza se escogerá mediante un campo
de tipo select. ¡Ten cuidado con la forma de mostrar las razas en el
desplegable, tiene truco!

*/-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
    ?>
    <style>
        img{
            width: 200px;
            height: 200px;
        }
    </style>
</head>
<body>
   
    <?php
        
        $url="https://dog.ceo/api/breeds/list/all";
            
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        $datos=json_decode($respuesta,true);
        $perros=$datos["message"];

        //con esto saco las claves que estan dentro del array
        $claves_perro=array_keys($perros);
        //print_r($claves_perro);
        
        if (!empty($_GET["firulais"])) {
            
            $firu=$_GET["firulais"];
            $img_url="https://dog.ceo/api/breed/". $firu ."/images/random";
   
            print_r($img_url);
            $curl=curl_init();
            curl_setopt($curl, CURLOPT_URL, $img_url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

            $datos_perro=json_decode($respuesta,true);
            $perros_raza=$datos_perro["message"];
            print_r($perros_raza);
        }

    ?>
    <h1>Perritos de Raza Random</h1>
    <form action="" method="get">
        <select name="firulais" id="">
            <?php foreach ($claves_perro as $perro) { ?>
                <option value="<?php echo $perro ?>" > <?php echo $perro ?> </option>
            <?php } ?>
        </select>
        <input type="submit" value="Buscar Raza">
    </form>
    <?php 
        if(!empty($perros_raza)) { ?>
        <br>
        <p><?php echo $perros_raza ?></p>
        <br>
            <img src="<?php echo $perros_raza ?>" alt="">
        <?php } else { ?>
            <p>NO HAY IMAGEN</p>
        <?php }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>