<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
    <link rel="stylesheet" href="style.css">
    <!--Indica los errores-->
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $numeros=[1,2,3,4,5];
        $numeros2=["1","2","3","4","5"];
        if ($numeros === $numeros2) {
            echo "<h2>los NUMEROS son IGUALES</h2>";
        }else {
            echo "<h2>los NUMEROS son NO IGUALES</h2>";
        }



        $frutas = array(
            "Naranaja",
            "Manzana",
            "Cereza"

        );
        $frutas1 = array(
            "Cereza",
            "Naranaja",
            "Manzana",

        );
        $frutas2 = array(
            0 => "Manzana",
            1 => "Naranaja",
            2 => "Cereza",

        );
        $frutas3 = array(
            
            1 => "Naranaja",
            0 => "Manzana",
            2 => "Cereza",

        );
        /**PARA QUE TE DIGAN QUE SON IGUALES SIEMPRE TIENE QUE TENER EL MISMO CLAVE => VALOR */
        if ($frutas == $frutas2) {
            echo "<h2>los array son IGUALES</h2>";
        }else {
            echo "<h2>los array son NO IGUALES</h2>";
        }

        echo $frutas[1];
        echo "<br>";

        $frutas = array(
            "Clave 1" => "Manzana",
            "Clave 2" => "Naranaja",
            "Clave 3" => "Cereza",

        );
        echo $frutas["Clave 3"];
        echo "<br>";

        $frutas = array(
            "Manzana",
            "Naranaja",
            "Cereza",

        );
        echo "<h2>Mis Frutas con FOR</h2>";
        echo "<ol>";
        for($i=0; $i<count($frutas);$i++){
            echo "<li>".$frutas[$i]."</li>";
        }
        echo "</ol>";

        echo "<h2>Mis Frutas con WHILE</h2>";
        echo "<ol>";
        $i=0;
        while ($i<count($frutas)) {
            echo "<li>".$frutas[$i]."</li>";
            $i++;
        }
        echo "</ol>";

        echo "<h2>Mis Frutas con FOREACH</h2>";
        echo "<ol>";
        foreach ($frutas as $clave => $fruta) {
            echo "<li>$clave, $fruta</li>";
        }
        echo "</ol>";

        

        array_push($frutas, "Mango", "Melocoton");
        $frutas[]="Melon";
        $frutas[7]="Uva";
        $frutas[]="Sandia";
        print_r($frutas);
        /**
         * el array values machaca las claves y las vuelve asignar de 0
         */
        $frutas=array_values($frutas);

        /**
         * para eliminar se utiliza la funcion unset($array)
         */

        unset($frutas[1]);

        echo "<br>";
        print_r($frutas);

    /** 
     * CREAR UN ARRAY CON LA LISTA DE PERSONAS ONDE LA CCLAVE SEA
     * EL DENI Y EL VALOIRE EL NOMBRE
     * 
     * MINIMO 3 PEROSNAS
     * 
     * MOSTRAR EL ARRAY COMPLETO  CON PRINT_R Y A ALGUNA PERSONA 
     * INDIVIDUAL
     * 
     * AÑADIR ELEMENTOS CON Y SIN CLAVE
     * 
     * BORRARR ALGUN ELEMNTO
     * 
     * PROBAR RESETEAR LAS CLAVES
     * 
    */
    $personas = array(
        "Z1545844F" => "Alejandro Quinteros",
        "W7846565V" => "Jose Cortez",
        "S7887855E" => "Ana Gomez",

    );
    echo "<br>";
    echo "<h3>Muestra las personas con FOREACH</h3>";
    echo "<ol>";
        foreach ($personas as $clave => $persona){
            echo "<li>$clave , $persona</li>";
        };
    echo "</ol>";
    echo "<br>";
    print_r($personas);
    echo "<br>";
    echo $personas["Z1545844F"];
    /**AÑADIR CON CLAVE */
    $personas["A8989898A"]= "Oscar Gomez";
    /**AÑADIR SIN CLAVE */
    $personas [] ="Jorge Lopez";
    array_push($personas,"Alfredo Zuan");
    print_r($personas);
    /**ELIMINACION DE LUGAR */
    unset($personas["Z1545844F"]);
    /**RESETEO DE CLAVE */
    $personas=array_values($personas);

    echo "<br>";
    print_r($personas);
    
    $tamano = count ($personas);
    echo "<h3>Cantidad de personas: $tamano</h3>";





    ?>
    <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
            </tr>
        </thead>
        <tbody>
            <?php
                /*
                    foreach($personas as $clave => $persona){
                        echo "<tr>";
                        echo "<td>$clave</td>";
                        echo "<td>$persona</td>";
                        echo "</tr>";
                    }
                */
            ?>
    
            <?php foreach ($personas as $dni=>$persona){?>
            <tr>
                <td><?php echo $dni;?></td>
                <td><?php echo $persona;?></td>
            </tr>

            <?php } ?>



        </tbody>
    </table>
<br><br><br>
        <h1>TABLA BUENA</h1>
        <?php
            $personas["S3213233E"]="Juan carlos";
            $personas["Z32199999"]="Alberto";
            //sort($personas); ordena por valor pero se carga las claves
            //rsort($personas); ordena por valor en sentido descendente  pero se carga las claves
            //asort($personas); ordena por valor NO se carga las claves
            //arsort($personas); ordena de reversa NO se carga las claves
            //ksort($personas): ordena por clave
            //krsort($persona): ordena por clave de forma reveresa

        ?>

                <table>
        <thead>
            <tr>
                <th>DNI</th>
                <th>NOMBRE</th>
            </tr>
        </thead>
        <tbody>
        
            <?php foreach ($personas as $dni=>$persona){?>
            <tr>
                <td><?php echo $dni;?></td>
                <td><?php echo $persona;?></td>
            </tr>

            <?php } ?>



        </tbody>
    </table>


            <!--
            Desarrollo web servidor - Alejandra
            Desarrollo web cliente - jaime
            Diseño de interfacez - jose
            Despliegue de aplicaciones - alejandro
            Empresa  e iniciativa emprendedora - gloria
            Ingles - cristina


            MOSTRAR UNA TABLA CON LA ASISGNATURA Y SUS RTESPECTUIVOS PROFESORES

            MOSTRAR UNA TABLA ORDENADO POR LA ASIGNATURA

            MOSTRAR UNA TABLA EN ORDEN DE LOS PROFESORES EN ALFAVETICO INVERSO
            -->

<br><br><br>
<h1>Lista de Materias y Profesor</h1>
            <?php
                $asignaturas["Desarrollo web servidor"]= "Alejandra";
                $asignaturas["Desarrollo web cliente"] = "Jaime";
                $asignaturas["Ingles"]="Cristina";
                $asignaturas["Diseño de interfacez"]="Jose";
                $asignaturas["Despliegue de aplicaciones"]= "Alejandro";
                $asignaturas["Empresa  e iniciativa emprendedora"] = "Gloria";
                
            ?>

                <table>
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($asignaturas as $materia=>$profesor){
                                echo"<tr>";
                                    echo "<td>$materia</td>";
                                    echo "<td>$profesor</td>";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>

                </table>
                <h3>ORDENADO POR ASIGNATURA EN ORDEN ALFABETICO </h3>
                <?php
                    ksort($asignaturas);
                ?>

                <table>
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($asignaturas as $materia=>$profesor){
                                echo"<tr>";
                                    echo "<td>$materia</td>";
                                    echo "<td>$profesor</td>";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>

                </table>
                            <h3>ORDENADO POR PRODFESOR EN ORDEN ALFABETICO INVERSO</h3>
                <?php
                    arsort($asignaturas);
                ?>

                <table>
                    <thead>
                        <tr>
                            <th>Asignatura</th>
                            <th>Profesor</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($asignaturas as $materia=>$profesor){
                                echo"<tr>";
                                    echo "<td>$materia</td>";
                                    echo "<td>$profesor</td>";
                                echo"</tr>";
                            }
                        ?>
                    </tbody>

                </table>
                <h3>Hacer tabla con alumno nota y si aprobo o no</h3>

                <?php
                    $alumnos=array(
                        "Daniana"=>10,
                        "Guillermo"=>4,
                        "Angel"=>9,
                        "Ayyub"=>3,
                        "Mateo"=>9,
                    );
                
                ?>

                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota</th>
                            <th>Aprobo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($alumnos as $alumno=>$nota){?>
                                <tr>
                                    <td><?php echo $alumno?></td>
                                    <td><?php echo $nota?></td>
                                    <?php if ($nota>4) {?>
                                        <td class="aprobado">Aprobado</td>
                                    <?php }else {?>
                                        <td class='suspenso'>Desaprobado</td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        
                    </tbody>

                </table>

                <br><br>
                <table>
                    <thead>
                        <tr>
                            <th>Alumno</th>
                            <th>Nota</th>
                            <th>Aprobo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($alumnos as $alumno=>$nota){
                                echo"<tr>";
                                    echo "<td>$alumno</td>";
                                    echo "<td>$nota</td>";
                                    if ($nota>4) {
                                        echo "<td>Aprobado</td>";
                                    }else {
                                        echo "<td>Desaprobado</td>";
                                    }
                                echo"</tr>";
                            }
                        ?>
                    </tbody>

                </table>




</body>
</html>