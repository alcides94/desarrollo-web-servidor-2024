<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VARIOS FORMULARIOS</title>
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );

        //llamar a una funcion
   
        require('../05_Funciones/edades.php');

        require('../05_Funciones/potencia.php');
    ?>
</head>
<body>
    <h2>FORMULARIOS EDAD</h2>
    <form action="" method="POST" >
        <input type="text" name="nombre" id="" placeholder="Nombre">
        <br>
        <input type="text" name="edad" id="" placeholder="Edad">
        <br>
        <input type="hidden" name="accion" value="formulario_edad">
        <br>
        <input type="submit" value="Comprobar">
        <br>
        <br>
    </form>
    <?php
    
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if($_POST["accion"]=="formulario_edad"){
            
             $nombre=$_POST["nombre"];
                $edad=$_POST["edad"];
            /*
                if ($nombre!="" && $edad!="") {
                    echo "<p>$nombre tiene $edad</p>";
                }else{
                    echo "<p>falta campos a completar</p>";
                }
            */
                comprobarEdad($nombre,$edad);
            }
        }
    ?>
    <h2>FORMULARIOS POTENCIA</h2>
    <form action="" method="POST" >
        <input type="text" name="base" id="" placeholder="Base">
        <br>
        <input type="text" name="exponente" id="" placeholder="Exponente">
        <br>
        <input type="hidden" name="accion" value="formulario_potencia">
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
    
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            if($_POST["accion"]=="formulario_potencia"){
                $base= (int) $_POST["base"];
                $exponente= (int) $_POST["exponente"];
            /*
                if ($base!="" && $exponente!="") {

                    $resultado=1;
                    for ($i=0; $i < $exponente; $i++) { 
                        $resultado= $resultado*$base;
                    }
                    
                    echo "<p>El resultado de elevar $base a $exponente es de $resultado</p>";
                }else{
                    echo "falta campos a completar";
                }
            
            */
             comprobarPotencia($base, $exponente);   
            }
        };
  
    ?>
</body>
</html>