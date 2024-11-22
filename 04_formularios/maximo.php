<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAXIMO</title>
</head>
<body>
    <?php
    $numeros =[1,5,4,8,98,22,11];
    
    for ($i=0; $i<count($numeros);$i++){
        echo "$numeros[$i] ";
    }
    
    ?>

    <form action="" method="POST" >
        <label for="numero">Nro Maximo</label>
        <input type="text" name="numero" id="numero" placeholder="Introduce el Maximo">
        <input type="submit" value="PRECIONE">
    </form>

    <?php
    
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $numero = $_POST["numero"];
        $candidato = $numeros[0];

        for ($i=0; $i<count($numeros);$i++){
            if ($numeros[$i]>$candidato) { $candidato=$numeros[$i];
        };

        }
        $maximo = $candidato;

        if ($numero==$maximo){
        
            echo "<h1> haz acertado</h1>";
        
        }else{
                echo "<h1> FALLASTE EL MAXIMO ES $maximo</h1>";
        }
        

    }
    
    ?>

</body>
</html>