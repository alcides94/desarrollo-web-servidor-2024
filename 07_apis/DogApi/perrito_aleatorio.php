<!--/**
 La Dog API nos ofrece imágenes aleatorias de diferentes perritos.
 
Ejercicio 1: Crea una página llamada perrito_aleatorio.php que nos muestre
un perrito al azar.

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
        
        $url="https://dog.ceo/api/breeds/image/random";
            
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        $datos=json_decode($respuesta,true);
        $animes=$datos["message"];
        
    ?>
    

    <button type="button" onclick="location.reload();">Random</button>

    <div class="container">
                
        
        <img src="<?php echo $animes ?>" alt="">
    
    
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>