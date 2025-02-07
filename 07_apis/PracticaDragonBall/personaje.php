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
      
        if (!empty($_GET["id"])){
            $id=$_GET["id"];
            $url.="/".$id;
        }else{
            header("location: index.php");
        }

        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        $datos=json_decode($respuesta,true);
        
    ?>


    <div class="container">
        <br>
        <h1>Personaje</h1>
        <br>
        <h1><?php  echo $datos["name"] ?> </h1>
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Genero</th>
                    <th>Imagen</th>
                    <th>Descripcion</th>
                    <th>Transformaciones</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td><?php  echo $datos["name"] ?> </td>
                    <td> <?php  echo $datos["race"] ?> </td>
                    <td> <?php  echo $datos["gender"] ?> </td>
                    <td> <img src="<?php  echo $datos["image"] ?>" alt=""> </td>
                    <td> <?php  echo $datos["description"] ?> </td>
                    <td>
                        <ol>
                        <?php 
                            if (count($datos["transformations"])>0) {
                                foreach ($datos["transformations"] as $dz) { ?>
                                    <li><?php echo $dz["name"] ?> </li>
                                    <img src="<?php echo $dz["image"] ?>" alt=""> 
                        <?php } 
                            }else{ ?>
                            <h3>No hay transformaciones</h3>
                        <?php    }   ?>
                        </ol>
                    </td>
                </tr>
               
            </tbody>
        </table>

         
            
        <a href="index.php" class="btn btn-primary">Inicio</a>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>