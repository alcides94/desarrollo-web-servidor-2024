<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar</title>
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

        if (!empty($_GET["name"])&&!empty($_GET["race"])&&!empty($_GET["gender"])){
            $name=urlencode($_GET["name"]);
            $race=urlencode($_GET["race"]);
            $gender=urlencode($_GET["gender"]);
            $url.="/?name=".$name."&race=".$race."&gender=".$gender;
        }else if (!empty($_GET["name"])&&!empty($_GET["race"])){
            $name=urlencode($_GET["name"]);
            $race=urlencode($_GET["race"]);
           
            $url.="/?name=".$name."&race=".$race;
        }else if (!empty($_GET["name"])&&!empty($_GET["gender"])){
            $name=urlencode($_GET["name"]);
            $gender=urlencode($_GET["gender"]);
            $url.="/?name=".$name."&gender=".$gender;
        }else if (!empty($_GET["name"])){
            $name=urlencode($_GET["name"]);
            $url.="/?name=".$name;
        }else if (!empty($_GET["race"])&&!empty($_GET["gender"])){
            $race=urlencode($_GET["race"]);
            $gender=urlencode($_GET["gender"]);
            $url.="/?race=".$race."&gender=".$gender;
        }else if (!empty($_GET["race"])){
            $race=urlencode($_GET["race"]);
            $url.="/?race=".$race;
        }else if (!empty($_GET["gender"])){
            $gender=urlencode($_GET["gender"]);
            $url.="/?gender=".$gender;
        }else{
            $erro="Noy hay busquedas";
        }
    

        if($url=="https://dragonball-api.com/api/characters"){
            print_r($url);
            $curl=curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $datos=json_decode($respuesta,true);
            $dragon=$datos["items"];
        }else{
            print_r($url);
            $curl=curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            $dragon=json_decode($respuesta,true);
        }
        /*
        if (isset($_GET['busqueda'])) {
            $busqueda = trim($_GET['busqueda']);
            
            foreach ($personajes as $personaje) {
                if (strcasecmp($personaje['name'], $busqueda) === 0) { // Comparación sin distinción entre mayúsculas y minúsculas
                    $personaje_encontrado = $personaje;
                    break;
                }
          */  
       // $dragon=$datos[];
       // print_r($datos);
        
    ?>


    <div class="container">
        <br>
        <h1>Buscar Personaje Favorito de Dragon Ball</h1>
        <form action="" method="get">
            <label for="">Nombre</label>
            <input type="text" name="name" id="" >
            <br>
            <label for="">Genero</label>
            <select name="gender" id="">
                <option value="" selected hidden>---Elige----</option>
                <option value="Male">Masculino</option>
                <option value="Female">Femenino</option>
                <option value="Unknown">Unknown</option>
            </select>
            <br>
            <label for="">Raza</label>
            <select name="race" id="">
                <option value="" selected hidden>---Elige----</option>
                <option value="Human">Humano</option>
                <option value="Saiyan">Saiyan</option>
                <option value="Namekian Majin">Namekian Majin</option>
                <option value="Frieza Race Android">Frieza Race Android</option>
                <option value="Jiren Race">Jiren Race</option>
                <option value="God Angel">God Angel</option>
                <option value="Evil">Evil</option>
                <option value="Nucleico">Nucleico</option>
                <option value="Nucleico benigno">Nucleico benigno</option>
                <option value="Unknown">Unknown</option>
            </select>
            <input type="submit" value="Buscar">

        </form>
        <br>
        
        <table class="table table-striped">
            <thead class="table-primary">
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Ki</th>
                    <th>Genero</th>
                   
                    <th>Descripcion</th>
                    <th>Imagen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dragon as $dz) { ?>
                <tr>
                    <td><a href="personaje.php?id=<?php  echo $dz["id"] ?> "> <?php  echo $dz["name"] ?> </a></td>
                    <td> <?php  echo $dz["race"] ?> </td>
                    <td> <?php  echo $dz["ki"] ?> </td>
                    <td> <?php  echo $dz["gender"] ?> </td>
               
                    <td> <?php  echo $dz["description"] ?> </td>
                    <td> <img src="<?php  echo $dz["image"] ?>" alt=""> </td>
                </tr>
               <?php  } ?>
            </tbody>
        </table>

         
            
        <a href="index.php" class="btn btn-primary">Inicio</a>
        

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>