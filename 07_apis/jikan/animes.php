<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img{
            width: 100px;
            height: 100px
        }
    </style>
 <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
    ?>
</head>
<body>
    <?php
        $url="https://api.jikan.moe/v4/anime";
        if (!empty($_GET["mal_id"])) {
            $id=$_GET["mal_id"];
            $url=$url . "/$id";
        }else{
            header("location: top_animes.php");
        }
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        $datos=json_decode($respuesta,true);
        $animes=$datos["data"];
        //se muestra todo el contenido que tenga data
         // print_r($animes);
            
    ?>

<br><br>
<h1>TABLA DE ANIMES</h1>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Sinopsis</th>
                <th>Imagen</th>
                <th>Año</th>
                <th>Productora</th>
                <th>Genero</th>
                <th>Relacionados</th>
                <th>Video</th>
            </tr>
        </thead>
        <?php  foreach ($datos as $anime) { ?>
            <tr>
                <td> <?php echo $anime["title"] ?>  </td>
                <td>  <?php echo $anime["synopsis"] ?>  </td>
                <td> <img src="<?php echo $anime["images"]["webp"]["image_url"] ?>" alt="">  </td>
                <td> 
                <?php foreach ($anime["producers"] as $productora) { ?>
                    <?php echo $productora["name"] ?> 
                <?php } ?>
                </td>
                <td> 
                <?php foreach ($anime["genres"] as $genero) { ?>
                    <?php echo $genero["name"] ?> 
                <?php } ?>
                </td>

                <td> 
                    <?php $relacionados = $anime["type"] ?>
                    
                </td>

                <td>  <?php echo $anime["year"] ?>  </td>
                <td> <iframe src=" <?php echo $anime["trailer"]["embed_url"] ?> " frameborder="0"></iframe> </td>   
            </tr>

        <?php } ?>

    </table>
</body>
</html>