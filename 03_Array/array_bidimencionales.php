<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arrays Bidimencionales</title>
    <link rel="stylesheet" href="style.css">
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
</head>
<body>
    <?php
        $videojuegos=[
            ["FIFA", "Deporte", 70],
            ["Dark Souls", "Soulslike", 50],
            ["Hollow Knight", "PLataformas", 30],
        ];

        foreach ($videojuegos as $videojuego){
            list($titulo, $categoria,$precio)=$videojuego;
            echo "<p>$titulo, $categoria,$precio</p>";
        }


        
        $nuevo_videojuego=["Throne and Liberty", "MMO", 0];
        array_push($videojuegos,$nuevo_videojuego);
        

        /*ORDENAR POR TITULO*/

        $_titulo=array_column($videojuegos,0);
        array_multisort($_titulo,SORT_DESC,$videojuegos);
        


        /**sSORT_SASC para orden ascendente
         * SORT_DESC para orden descendiente
         * 
         * Ordena por el precio de barato a mas caro
         * Ordenar por la categoria en orden alfabetico
         */

         


        $_precio=array_column($videojuegos,2);
        array_multisort($_precio,SORT_ASC,$videojuegos);

        

        $_categoria=array_column($videojuegos,1);
        array_multisort($_categoria,SORT_ASC,$videojuegos);

        array_push($videojuegos,["Warcraft", "Estrategia", 0]);
        array_push($videojuegos,["LOL", "Estrategia", 10]);
        array_push($videojuegos,["Call of duty", "Estrategia", 0]);

    ?>

    <table>
        <thead>
            <tr>
                <th>TITULO</th>
            
                <th>CATEGORIA</th>
           
                <th>PRECIO</th>
            </tr>
        </thead>
        <tbody>
           <?php

                foreach ($videojuegos as $videojuego){
                list($titulo, $categoria,$precio)=$videojuego;?>
                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $precio ?></td>
                    
                </tr>
                
            <?php  }?>

        </tbody>

    </table>


    <table>
        <caption>IMPLEMENTACION DE COLUMNAS Y ARRAY PUSH</caption>
        <thead>
            <tr>
                <th>TITULO</th>
            
                <th>CATEGORIA</th>
           
                <th>PRECIO</th>

                <th>TIPO</th>
            </tr>
        </thead>
        <tbody>
           <?php

                for ($i=0; $i<count($videojuegos);$i++){
                    if ($videojuegos[$i][2]<1){
                        $videojuegos[$i][3]="Gratis";
                    }
                    elseif($videojuegos[$i][2]>0){
                        $videojuegos[$i][3]="Pago";
                    }
                }
            ?>
            <?php
                foreach ($videojuegos as $videojuego){
                list($titulo, $categoria,$precio,$tipo)=$videojuego;?>
                <tr>
                    <td><?php echo $titulo ?></td>
                    <td><?php echo $categoria ?></td>
                    <td><?php echo $precio ?></td>
                    <td><?php echo $tipo ?></td>
                </tr>
                
            <?php  }?>

        </tbody>

    </table>
    

</body>
</html>