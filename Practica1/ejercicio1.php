<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    


<?php

    //1.1
    $array=[
        ["Alejandro", "Fuego"],
        ["Jorge", "Agua"],
        ["Leandro", "Electricidad"],
        ["David", "Aire"],
        ["Maria", "Fuego"],
    ];

    //1.1
    array_push($array, ["Ayoub", "Agua"]);
    array_push($array, ["Luis", "Fuego"]);

    $ultimo=count($array)-1;
    
    //1.2
    unset($array[$ultimo]);
    
    //1.3
    for ($i=0; $i < count($array); $i++) { 
        $array[$i][2]=rand(500,2000);
    }

    //1.4
    for ($i=0; $i < count($array); $i++) { 
        $array[$i][3]=rand(10000,30000);
    }

    //1.5
    for ($i=0; $i < count($array); $i++) { 
        if ($array[$i][3]>=20000) {
            $array[$i][4]="Tanque";
        }else if(($array[$i][2]>=1500)&&($array[$i][3]<20000)){
            $array[$i][4]="Ataque";
        }else{
            $array[$i][4]="Soporte";
        }
    }


    $_nombre=array_column($array,0);
    $_elemento=array_column($array,1);
    $_ataque=array_column($array,2);
    $_vida=array_column($array,3);
   //$_tipo_personaje=array_column($array,4);

    array_multisort($_ataque,SORT_ASC,$_vida,SORT_ASC,$_elemento,SORT_ASC,$_nombre,SORT_ASC,$array);

?>
    <table border="1px solid black">
        <caption>Personajes</caption>
        <thead>
            <tr>
                <td>Nombre</td>
                <td>Elemento</td>
                <td>Ataque</td>
                <td>Salud</td>
                <td>Tipo</td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($array as $jugadores) {
                list($nombre,$elemento,$ataque,$vida,$tipo_personaje)=$jugadores ?>
                <tr>
                    <td> <?php echo $nombre ?></td>
                    <td> <?php echo $elemento ?></td>
                    <td> <?php echo $ataque ?></td>
                    <td> <?php echo $vida ?></td>
                    <td> <?php echo $tipo_personaje ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>




</body>
</html>