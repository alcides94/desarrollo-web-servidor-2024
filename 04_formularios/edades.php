<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDADES</title>
</head>
<body>
    <form action="" method="POST" >
        <input type="text" name="nombre" id="">
        <input type="text" name="edad" id="">
        <input type="submit" value="ENVIAR">
    </form>



    <?php
    
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $nombre=$_POST["nombre"];
        $edad=$_POST["edad"];
   
    
    $resultado = match (true) {
        $edad >=0 && $edad <=17 => "tiene $edad años Es un MENOR DE EDAD",
        $edad >=18 && $edad <65 => "tiene $edad años Es un ADULTO",
        $edad >=66 => "tiene $edad años Es un JUBILADO",
        default => "ERROR"
   };
  
   echo $resultado;
     }
    ?>
</body>
</html>