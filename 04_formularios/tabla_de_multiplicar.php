<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabla de multiplicar</title>
</head>
<body>
    <form action="" method="POST" >

    <label for="numero">Ingrese el numero</label>
    <input type="text" name="numero" id="">
    <input type="submit" value="OK">

    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST"){
            $numero = $_POST["numero"];
        }    
    ?>
    <table>
        <thead>
            <tr>
                <th>Numero</th>
                <th>Resultado</th>
            </tr>
        </thead>
        <tbody>
            <?php
                for ($i=1 ; $i<=10;$i++){
            ?>
            <tr>
                    <td><?php echo "$i x $numero "?></td>
                    <td><?php echo ($i*$numero)?></td>
            </tr>

            <?php } ?>
        </tbody>
    </table>

</body>
</html>