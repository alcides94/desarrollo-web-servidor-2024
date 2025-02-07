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
        img{
            width: 90px;
            height: 150px;
        }
    </style>
</head>
<body>

    <?php
        $url="https://dragonball-api.com/api/characters";
      
        if (!empty($_GET["page"])){
            $pagina=$_GET["page"];
            $url.="?page=".$pagina;
        }else{
            $err="no puede ir mas lejos";
        }

        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
        $dragonball=$datos["items"];

        $paginacion=$datos["meta"];
        $paginaActual=$paginacion["currentPage"];
        $paginaTotal=$paginacion["totalPages"];
   

    ?>


    <div class="container">
        <br>
        <h1>Dragon Ball</h1>
        <br>
        <a href="buscar.php" class="btn btn-warning">Buscar Personaje</a>
        <a href="buscar.php" class="btn btn-warning">Buscar Personaje</a>
        <h1>Personajes</h1>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Genero</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
         
                foreach ($dragonball as $dz) {
                   
                ?>
                    <tr>
                        <td><a href="personaje.php?id=<?php  echo $dz["id"] ?> "> <?php  echo $dz["name"] ?> </a></td>
                        <td> <?php  echo $dz["race"] ?> </td>
                        <td> <?php  echo $dz["gender"] ?> </td>
                        <td> <?php  echo $dz["description"] ?> </td>
                        <td> <img src="<?php  echo $dz["image"] ?>" alt=""> </td>
                    </tr>
                
                <?php   
                 
                }
                ?>
               
            </tbody>
        </table>

        <?php 
            if ($paginaActual>1) { ?>
                <a href="?page=<?php echo $paginaActual - 1 ?>" class="btn btn-primary">Atras</a>
        <?php
           }
        ?>

        <?php 
            
            if ($paginaActual<=$paginaTotal) { ?>
                <a href="?page=<?php echo $paginaActual + 1 ?>" class="btn btn-primary">Siguiente</a>
        <?php
           }
        ?>
       

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>