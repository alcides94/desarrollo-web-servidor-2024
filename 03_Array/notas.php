<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NOTAS</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <?php
    $notas = [
        ["Paco","Desarrollo web servidor"],
        ["Paco","Desarrollo web cliente"],
        ["Manu","Desarrollo web servidor"],
        ["Manu","Desarrollo web cliente"],
    ];
    
    /**
     * Ejercicio 1 : Añadir al array 4 estudia ntes con asignaturas
     */
        array_push($notas,["Ana","Interfacez"]);
        array_push($notas,["Emiliano","Redes"]);
        array_push($notas,["Jose","Despliegue"]);
        array_push($notas,["Fran","Ingles"]);


    /*
     * Ejercicio 2 : Eliminar 1 estudiante y su asignatura a libre eleccion
     * */

     unset($notas[1]);

     $notas=array_values($notas);

     /*
     
     * Ejercicio 3: Añadir una tercera columna que sera la nota, obtenida aleatoriamente entre 1 y 10
     
     */

     for($i=0;$i<count($notas);$i++){
        $notas[$i][2]=rand(1,10);
     };

     /*

     * Ejercicio 4: Añadir una cuarta columna que indique apto o no apto dependiendo de si lanota es igual o superior a 5 o no
     * */

    for($i=0;$i<count($notas);$i++){
        if ($notas[$i][2]<5){
            $notas[$i][3]="NO APTO";
        }elseif($notas[$i][2]>=5){
            $notas[$i][3]="APTO";
        }
     };

      /*
     * Ejercicio 5: Ordenar alfabeticamente por los alumnos, luego por nota. si hay varias filas con el mismo nombre y la misma nota ordenar por la asignatura alfabeticamente
     * 
     * */

    $_alumno=array_column($notas,0);
    $_nota=array_column($notas,2);
    $_asignatura=array_column($notas,1);
    //print_r($_nota);

    array_multisort($_alumno, SORT_ASC, $_nota, SORT_ASC, $_asignatura, SORT_ASC,$notas);
    

     /*
     * Ejercicio 6: mostrarlo todo en una tabla
     
     */
    ?>


    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Asignatura</th>
                <th>Nota</th>
                <th>Apto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($notas as $nota){
                list($nombre,$asignatura,$n,$apto)=$nota;
            ?>
            <tr>
                <td><?php echo $nombre?></td>
                <td><?php echo $asignatura?></td>
                <td><?php echo $n?></td>
                <td><?php echo $apto?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>


</body>
</html>