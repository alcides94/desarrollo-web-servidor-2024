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

        if ($_SERVER["REQUEST_METHOD"]=="GET"){
        
            $tipo = $_GET["tipo"];
            
            if(!empty($tipo)){
                $url="https://api.jikan.moe/v4/top/anime?type=". $tipo;
                print_r($url);
                $curl=curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);
            }else{
                $url="https://api.jikan.moe/v4/top/anime";
                $curl=curl_init();
                curl_setopt($curl, CURLOPT_URL, $url);
                curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                $respuesta = curl_exec($curl);
                curl_close($curl);
            }


        }

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
<form action="" method="get">
    <input type="radio" name="tipo" id="" value="" > Todos <br>
    <input type="radio" name="tipo" id="" value="tv"> Series de TV <br>
    <input type="radio" name="tipo" id="" value="movie"> Peliculas <br>
    <input type="submit" value="Filtrar">
</form>
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

</body>
</html>