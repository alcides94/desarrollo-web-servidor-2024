<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Multiplicar</title>
</head>
<body>
    <table border="solid 1px solid">
        <tbody>
            <?php
                for ($i=1; $i <=10 ; $i++) { ?> 
                <tr> 
                    <td><?php echo "Tabla de $i"; ?></td> 
                    <?php
                    for ($j=1; $j <=10 ; $j++) { 
                    ?>
                        
                            <td>
                                <?php echo ($i ." x ". $j ." = ".$resultado=$i*$j);?>
                            </td>
                    <?php       
                        }
                    ?>
                </tr>
            <?php 
                }
            ?>
        </tbody>
    </table>
</body>
</html>