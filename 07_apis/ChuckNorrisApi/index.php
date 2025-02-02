<!-- API Chistes de Chuck Norris

Tiempo estimado: 30 minutos

La API chucknorris.io cuenta con una base de datos de chistes sobre Chuck
Norris

Ejercicio 1:. Crear un formulario que cuente con un campo de selección
donde se muestren todas las categorías de chistes sobre Chuck Norris,
extraídas en tiempo real desde la API REST. Cuando se envíe el formulario
se mostrará un chiste aleatorio de la categoría seleccionada.
Enlace a la API: https://api.chucknorris.io

-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
 
    ?>
    <style>
        .table-primary{
            --bs-table-color-state:green;
            --bs-table-bg:beige;
        }
    </style>
</head>
<body>

    <?php
        $url="https://api.chucknorris.io/jokes/categories";

      
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
      //  print_r($datos);

        if (!empty($_GET["categoria"])){

            $categoria=$_GET["categoria"];

            $url_random="https://api.chucknorris.io/jokes/random?category=". $categoria;

            print_r($url_random);
            $curl=curl_init();
            curl_setopt($curl, CURLOPT_URL, $url_random);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);
    
            $datos_chiste=json_decode($respuesta,true);
            $chiste=$datos_chiste["value"];

        }

    ?>


    <div class="container">
        <br>
        <h1>Chistes Chuck Norris</h1>
        <br>
        <form action="" method="get" enctype="">
            
            <div class="mb-3">
                <label for="" class="form-label">Categoria</label>
                <select name="categoria" id="" class="form-select">

                <option value="" selected hidden >---Elige---</option>
                    <?php foreach ($datos as $categoria) { ?>
                        <option value="<?php echo $categoria?>"  ><?php echo $categoria?></option>
                    <?php } ?>
                    
                   
                 
                </select>
            </div>
            
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Buscar">
            </div>

        </form>
        
        <?php if (isset($chiste)) {
            ?>  <p><?php echo $chiste ?></p>  <?php
        } ?>
                   
        
         
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>