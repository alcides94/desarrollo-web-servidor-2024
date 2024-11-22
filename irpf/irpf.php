<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        //llamar a una funcion

        require('./functionIrpf.php'); //NUEVO

    
    ?>
</head>
<body>
    <form action="" method="post">
        <input type="number" name="salario" placeholder="Salario">
        <input type="hidden" name="accion" value="formulario_irpf">
        <input type="submit" value="Calcular salario bruto">
    </form>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($_POST["accion"]=="formulario_irpf"){
            $tmp_salario =$_POST["salario"];
            
            if($tmp_salario == '') {
                echo "<p>El salario es obligatorio</p>";
            } else {
                    if($tmp_salario < 0) {
                        echo "<p>La base debe ser mayor que 0</p>";
                    } else {
                        $salario = $tmp_salario;
                }
            }
            
            if(isset($salario)) {
                $resultado = comprobarIrpf($salario);
                echo "<h1>$resultado</h1>";
            }
        
        }
    }
    
    ?>
</body>
</html>