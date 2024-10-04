<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autobuses</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php

    #ORIGEN, DESTINO,DURACION Y PRECIO
    $autobuses = [
        ["Malaga","Ronda",90,10],
        ["Churriana","Malaga",20,3],
        ["Malaga","Granada",120,15],
        ["Torremolinos","Malaga",30,3.5]
    ];
    #AÑADIR DOS LINEAS DE AUTOBUS

    $nuevo_auto=["Mijas", "Sevilla", 60,5];
    array_push($autobuses,$nuevo_auto);

    array_push($autobuses,["Algeciras", "Malaga", 180,20]);

    #ORDENAR POR DURACION DE MAS DURACION A MENOS
/*
    $_duracion=array_column($autobuses,2);
    array_multisort($_duracion,SORT_DESC,$autobuses);

    $_origen=array_column($autobuses,0);
    $_duracion=array_column($autobuses,2);

    array_multisort($_origen,SORT_ASC,$_duracion,SORT_ASC,$autobuses);
*/
    /**
     * 4-insertar 3 autobuses
     * 5-ordenar primero por el origen, luego por el destino
     * 6-ordenar primero por la duracion y luego el precio
     */
    array_push($autobuses,["Sevilla","Pais Vasco", 360,90]);
    array_push($autobuses,["Malaga","Madrid", 280,50.5]);
    array_push($autobuses,["Barcelona","Malaga", 200,50]);

    $_origen=array_column($autobuses,0);
    $_destino = array_column($autobuses,1);
    $_precio = array_column($autobuses,3);
    $_duracion=array_column($autobuses,2);

    /*
     * 5-ordenar primero por el origen, luego por el destino
     
    array_multisort($_origen,SORT_ASC,$_destino,SORT_ASC,$autobuses);
    */
    /**
     * 6-ordenar primero por la duracion y luego el precio
     */
    array_multisort($_duracion,SORT_ASC,$_precio,SORT_ASC,$autobuses);

    //Eliminar una fila el miltisort reordena y reasgina las claves
    //unset($autobuses[0])
    ?>

    <!--MOSTRAR LAS LINEAS EN  UNA TABLA-->
    <table>
        <thead>
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>DURACION</th>
                <th>PRECIO</th>
            </tr>
        </thead>

        <tbody>
            <?php
                

                foreach ($autobuses as $autobus){
                    list($origen,$destino,$duracion,$precio)=$autobus;?>
                <tr>
                    <td><?php echo $origen?></td>
                    <td><?php echo $destino?></td>
                    <td><?php echo $duracion?></td>
                    <td><?php echo $precio?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    
    <?php


        for ($i=0; $i < count($autobuses); $i++){
            //en este instante se agrega la columna
            if ($autobuses[$i][2] <= 30){
                $autobuses[$i][4]="Corta Distancia";
            }elseif($autobuses[$i][2] > 30 && $autobuses[$i][2] <= 120){
                $autobuses[$i][4]="Media Distancia";
            }elseif($autobuses[$i][2]>120){
                $autobuses[$i][4]="Larga Distancia";
            }
            
        }
        //print_r($autobuses);
    ?>

    <table>
        <thead>
            <tr>
                <th>ORIGEN</th>
                <th>DESTINO</th>
                <th>DURACION</th>
                <th>PRECIO</th>
                <th>TIPO</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($autobuses as $autobus){
                    list($origen,$destino,$duracion,$precio,$tipo)=$autobus;
                    ?>
                    <tr>
                        <td><?php echo $origen ?></td>
                        <td><?php echo $destino ?></td>
                        <td><?php echo $duracion ?></td>
                        <td><?php echo $precio ?></td>
                        <td><?php echo $tipo ?></td>
                    </tr>
               <?php }
            ?>
        </tbody>
    </table>
    
</body>
</html>