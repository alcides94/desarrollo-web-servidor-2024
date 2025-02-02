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

      
        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        if(isset($_GET["pagina"])){
            $page=$_GET["pagina"];
        }else{
            $page=1;
        }

        if (isset($_GET["tipo"])){
            $tipo = $_GET["tipo"];
            $url="https://api.jikan.moe/v4/top/anime?type=". $tipo."&page=".$page;
        }else{
            $tipo="";
            $url="https://api.jikan.moe/v4/top/anime&page=".$page;
        }

        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
        $animes=$datos["data"];

        $pagination = $datos["pagination"];
        $current_page = $pagination["current_page"];
        $last_page = $pagination["last_visible_page"];
        //se muestra todo el contenido que tenga data
            //print_r($animes);
        
    ?>
    
<h1>ANIMES</h1>
    
<!--Tabla con titulo nota imagen-->

<br><br>
<form action="" method="get">
    <input type="radio" name="tipo" id="" value=""  <?php if ($tipo == "") echo "checked" ?> > Todos <br>
    <input type="radio" name="tipo" id="" value="tv" <?php if ($tipo == "tv") echo "checked" ?>> Series de TV <br>
    <input type="radio" name="tipo" id="" value="movie" <?php if ($tipo == "movie") echo "checked" ?>> Peliculas <br>
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
    <br>
    <!-- Botón Anterior -->
    <?php if ($current_page > 1) { ?>
        <a href="?pagina=<?php echo $current_page - 1; ?>&tipo=<?php echo $tipo; ?>"><button>Anterior</button></a>
    <?php } ?>

    <!-- Botón Siguiente -->
    <?php if ($current_page < $last_page) { ?>
        <a href="?pagina=<?php echo $current_page + 1; ?>&tipo=<?php echo $tipo; ?>"><button>Siguiente</button></a>
    <?php } ?>
    <p>Página <?php echo $current_page; ?> de <?php echo $last_page; ?></p>
    
    
</body>
</html>