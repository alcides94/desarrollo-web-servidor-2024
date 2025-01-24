<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    /**CODIGO DE ERROR */
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
       
    ?>

</head>
<body>
    <form action="" method="get">
        <input type="text" name="ciudad" id="">
        <input type="submit" value="Buscar">
    </form>


    <?php

        $url="http://localhost/Ejercicios/06_bases_de_datos/animes/api/api_estudios.php";
        if (!empty($_GET["ciudad"])) {
            $ciudad=$_GET["ciudad"];
            $url=$url . "?ciudad=$ciudad";
        }
        
        $curl=curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $respuesta = curl_exec($curl);
        curl_close($curl);

        //SI NOS DA ERROR PUEDE SER QUE TENGAMOS QUE REINICIAR EL SERVIDOR

        $estudios=json_decode($respuesta,true);

        print_r($estudios);

       
        
    ?>

    <table border="1px solid black">
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Ciudad</td>
                <td>Año</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($estudios as $estudio) { ?>
            <tr>

                <td><?php echo $estudio["nombre_estudio"]?></td>
                <td><?php echo $estudio["ciudad"]?></td>
                <td><?php echo $estudio["anno_fundacion"]?></td>

            </tr>
                
            <?php } ?>
        </tbody>
    </table>

</body>
</html>