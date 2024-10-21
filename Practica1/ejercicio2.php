<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 2</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php 
        $barrios=[
            ["Centro", 2543],
            ["Huelin", 1109],
            ["Malaga Este", 890],
            ["Palma/Palmilla", 49]
        ]
    ?>

    <table border="1px solid black">
        <caption>Barrios</caption>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Pisos Turisticos</td>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($barrios as $barrio) {
                list($nombre,$num_pisos)=$barrio ?>
                <tr>
                    <td> <?php echo $nombre ?></td>
                    <td> <?php echo $num_pisos ?></td>
               
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <form action="" method="post">
        <br>
        <input type="text" name="nombreBarrio" id="nombreBarrio">
        <br><br>
        <input type="submit" value="COMPROBAR">
        <br>
    </form>
    <br>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $nombreBarrio=$_POST["nombreBarrio"];

        $i = 0;
        $fila_barrio = null;
        $encontrado = false;
        while($i < count($barrios) && !$encontrado) {
            if($barrios[$i][0] == $nombreBarrio) {
                $encontrado = true;
                $fila_barrio = $i;
            }
            $i++;
        }
        
        if($encontrado && $barrios[$fila_barrio][1] == 0) {
            echo ($nombreBarrio." ".$barrios[$fila_barrio][1] . " No hay viviendas turisticas");
        } elseif($encontrado && $barrios[$fila_barrio][1] > 0 && $barrios[$fila_barrio][1] <= 50) {
            echo ($nombreBarrio." ".$barrios[$fila_barrio][1] .  " Hay pocas viviendas turisticas");
        } elseif($encontrado && $barrios[$fila_barrio][1] > 50 && $barrios[$fila_barrio][1] <= 1000) {
            echo ($nombreBarrio." ".$barrios[$fila_barrio][1] .  " Hay bastantes viviendas turisticas");
        } elseif($encontrado && $barrios[$fila_barrio][1] > 1000 ) {
            echo ($nombreBarrio." ".$barrios[$fila_barrio][1] . " Hay demasiadas viviendas turisticas");
        }else {
            echo "<p>El barrio $nombreBarrio no existe</p>";
        }

        }
    ?>

</body>
</html>