<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de IVA</title>
    <?php
    /**CODIGO DE ERROR */
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    
    //CONSTANTES
    define("gen", 1.21);
    define("red", 1.10);
    define("superred", 1.04);
    ?>
</head>
<body>
    <form action="" method = "get">
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
        <br><br>
        <label for="iva"></label>
        <select name="iva" id="iva">
            <option value="general">General</option>
            <option value="reducido">Reducido</option>
            <option value="superreducido">Superreducido</option>
        </select><br><br>
        <input type="submit" value="Calcular PVP">
    </form>

    <?php 
       //isset sirve para comprobar que alla puesto un numerom o seleccionado algo
        if (isset($_GET["precio"]) and isset($_GET["iva"])){
            $precio=$_GET["precio"];
            $iva=$_GET["iva"];
            /*
            if ($iva=="general"){
                $precio=$precio*gen;
                echo "<p> el precio General es $precio</p>";
            }elseif($iva=="reducido"){
                $precio=$precio*red;
                echo "<p> el precio Reducido es $precio</p>";
            }else{
                $precio=$precio*superred;
                echo "<p> el precio Superreducido es $precio</p>";
            }
            */
            if ($precio!='' and $iva!='') {
                # code...
                
                $pvp = match($iva){
                    "general" => $precio *gen,
                    "reducido" => $precio *red ,
                    "superreducido" => $precio *superred ,
                };

                echo "<p> el precio es de $pvp</p>";
            }else{
                echo "<p> Rellena todos los campos</p>";
            }
        }
    ?>


</body>
</html>