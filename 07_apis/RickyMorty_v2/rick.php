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
        $url="https://rickandmortyapi.com/api/character/?";

        if (!empty($_GET["genero"]) && !empty($_GET["especie"])){
            $genero=$_GET["genero"];
            $especie=$_GET["especie"];
            $url.="gender=".$genero."&species=".$especie;
        }else if (!empty($_GET["especie"])){
            
            $especie=$_GET["especie"];
            $url.="species=".$especie;
        }else if (!empty($_GET["genero"])){
            
            $genero=$_GET["genero"];
            $url.="gender=".$genero;
        }else{
            $url="https://rickandmortyapi.com/api/character";
            $err="debe completar los campos";
        }
      
        print_r($url);
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
        $rym=$datos["results"];

   

        if (!empty($_GET["cantidad"])) {
            $cantidad=$_GET["cantidad"];
        }else{
            $cantidad=count($rym);
            print_r($cantidad);
        };

    ?>


    <div class="container">
        <br>
        <h1>Rick y Morty</h1>
        <br>
        <form action="" method="get" enctype="">
            
            <div class="mb-3">
                <label for="" class="form-label">Cantidad</label>
                <input type="text" class="form-control" name="cantidad">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Genero</label>
                <select name="genero" id="" class="form-select">
                    <option value="" selected hidden >---Elige---</option>
                    <option value="female"  >Femenino</option>
                    <option value="male"  >Masculino</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Especie</label>
                <select name="especie" id="" class="form-select">
                <option value="" selected hidden>---Elige---</option>
                    <option value="human" >Humano</option>
                    <option value="alien" >Alien</option>
                </select>
            </div>
            <div class="mb-3">
                <input class="btn btn-primary" type="submit" value="Buscar">
            </div>

        </form>
        <?php if(isset($err)) echo "<span class='error'>$err</span>"; ?>

        <h1>Tabla</h1>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Genero</th>
                    <th>Especie</th>
                    <th>Origen</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=0;
                //fetch tatra a resultado como un array
                foreach ($rym as $datos_rym) {
                   
                ?>
                    <tr>
                        <td> <?php  echo $datos_rym["name"] ?> </td>
                        <td> <?php  echo $datos_rym["gender"] ?> </td>
                        <td> <?php  echo $datos_rym["species"] ?> </td>
                        <td> <?php  echo $datos_rym["origin"]["name"] ?> </td>
                        <td> <img src="<?php  echo $datos_rym["image"] ?>" alt=""> </td>
                    </tr>
                
                <?php   
                    $i++;
                    if ($i>=$cantidad) {
                        break;
                    }
                }
                ?>
               
            </tbody>
        </table>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>