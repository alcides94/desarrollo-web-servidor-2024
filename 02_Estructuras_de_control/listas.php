<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LISTAS</title>
</head>
<body>
    <h3>Lista 1 WHILE</h3>
    <?php
    echo "<ul>";
    $i=1;
    while ($i < 10) {
        # code...
        echo ("<li>$i</li>");
        $i++;
    }
    echo "</ul>";
    ?>


    <h3>Lista 2 WHILE</h3>
    <?php
    echo "<ul>";
        $i=1;
        while ($i < 10):
            echo ("<li>$i</li>");
            $i++;
        endwhile;


    echo "</ul>"
    ?>

    <!--CON WHILE Y LAS ESTRUCTURAS DE CONTROL MUESTRA UNA LISTA SIN ORDENAR TODOS LO MULTIPLOS DE 3 ENTR E1 Y 30-->
    <h3>Lista 3 WHILE e IF</h3>
    
    <?php
    
    echo "<ul>";
        $a=1;
        while ($a <= 30) {
            if ($a%3==0)
            echo "<li>$a</li>";
        $a++;
        }

    echo "</ul>";
    ?>

    <h3>Lista DO </h3>
    
    <?php
    
    echo "<ul>";
        $a=1;
        do{
            echo "<li>$a</li>";
        $a++;
        } while ($a<=10);

    echo "</ul>";
    ?>

    <h3>Lista FOR</h3>

    <?php
        echo "<ul>";
        for ($i=1; $i<=10;$i++){
            echo"<li>$i</li>";
    

        }
        echo "</ul>";
    ?>

    <h3>Lista FOR 2</h3>
        <?php
            echo "<ul>";
            for ($i=1; ;$i++){
                if($i >10) break;
                echo "<li>$i</li>";
            }
            echo "</ul>";
        ?>


</body>
</html>