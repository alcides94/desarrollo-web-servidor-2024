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

</head>
<body>
    <?php
        $url="https://api.jikan.moe/v4/top/anime";
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        $datos=json_decode($respuesta,true);
        $animes=$datos["data"];
        //se muestra todo el contenido que tenga data
            //print_r($animes);
        
    ?>
    
<h1>ANIMES</h1>
    <ol>
        <?php foreach ($animes as $anime) { ?>
            <li> <?php echo $anime["title"] ?> </li>



        <?php } ?>

    </ol>
<!--Tabla con titulo nota imagen-->

<br><br>

<input type="radio" name="tipo" id="" value="series"> Todos <br>
<input type="radio" name="tipo" id="" value="todos"> Series de TV <br>
<input type="radio" name="tipo" id="" value="peliculas"> Peliculas <br>

<h1>TABLA DE ANIMES</h1>
    <table border="1px solid black">
        <thead>
            <tr>
                <th>Ranking</th>
                <th>Titulo</th>
                <th>Nota</th>
                <th>Imagen</th>

            </tr>
        </thead>
        <?php  foreach ($animes as $anime) { ?>
            <tr>
                <td> <?php echo $anime["rank"] ?> </td>
                <td> <a href="animes.php?mal_id=<?php echo $anime["mal_id"] ?>" > <?php echo $anime["title"] ?> </a>  </td>
                <td> <?php echo $anime["score"] ?> </td>
                <td> <img src="<?php echo $anime["images"]["webp"]["image_url"] ?>" alt="">  </td>
            </tr>

        <?php } ?>

    </table>
    <input type="button" value="Atras">
    <?php $anim=$datos["pagination"];

    
    ?>
    <input href="top_animes.php?paginacion=<?php echo $anime["current_page"] ?> type="button" value="Siguiente">
</body>
</html>