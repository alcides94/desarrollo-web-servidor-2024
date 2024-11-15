<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );
    ?>
    <style>
        span{
            color:red;
        }
    </style>
</head>
<body>
    <?php
        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('/\s+/', ' ', $salida);
            return $salida;
        }
    ?>

    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $tmp_nombre=depurar($_POST["nombre"]);
            $tmp_peso=depurar($_POST["peso"]);
            
            if(isset($_POST["genero"])) $tmp_genero=depurar($_POST["genero"]);
            else $tmp_consola = "Desconocido";
            
            if(isset($_POST["tipo"])) $tmp_tipo=depurar($_POST["tipo"]);
            else $tmp_consola = "";
           
            $tmp_fecha_captura=depurar($_POST["fecha_captura"]);
            $tmp_descripcion=depurar($_POST["descripcion"]);

            if($tmp_nombre==''){
                $err_nombre="El nombre no puede ser Vacio";
            }else{
                $patron="/^[a-zA-ZÀÈÌÒÙàèìòùñÑ]{3,30}$/";
                if (preg_match($patron,$tmp_nombre)) {
                    $nombre=$tmp_nombre;
                }elseif (strlen($tmp_nombre) < 3 || strlen($tmp_nombre) > 30) {
                    $err_nombre= "El nombre tiene que tener entre 3 y 30 caracteres.";
                } else {
                    $err_nombre= "El titulo no puede tener caracteres especiales. SOLO letras y con o sin tilde"; 
                }
            }

            if($tmp_peso == '') {
                $err_peso="El peso no puede ser Vacio";
            } else {
                if(filter_var($tmp_peso, FILTER_VALIDATE_FLOAT) === FALSE) {
                    $err_peso="El peso debe ser numero";
                } else {
                    if(($tmp_peso < 0.1) || ($tmp_peso > 999.99)) {
                        $err_peso="El peso debe ser mayor a 0,1 y menor a 999,99";
                    } else {
                        $peso = $tmp_peso;
                    }
                }
            }

            if($tmp_genero == "Desconocido") {
                $genero=$tmp_genero;
            }else{
                $genero_validas=["hembra","macho"];
                if(!in_array($tmp_genero,$genero_validas)){
                    $err_genero="el genero elejido no es valido";
                }else{
                    $genero=$tmp_genero;
                }
            }

            if($tmp_tipo == '') {
                $err_tipo = "El tipo es obligatorio";
            } else {
                $tipos_validos = ["agua","fuego","volador","planta","electrico"];
                if(!in_array($tmp_tipo, $tipos_validos)) {
                    $err_tipo = "El tipo no es válido";
                } else {
                    $tipo = $tmp_tipo;
                }
            }

            if($tmp_fecha_captura == '') {
                $err_fecha_captura = "La fecha de captura es obligatoria";
            } else {
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_fecha_captura)) {
                    $err_fecha_captura = "El formato de la fecha es incorrecto";
                } else {
                    $fecha_actual = date("Y-m-d");  
                    list($anno_actual,$mes_actual,$dia_actual) = 
                        explode('-',$fecha_actual);
                    
                    list($anno_captura,$mes_captura,$dia_captura) = 
                        explode('-',$tmp_fecha_captura);
                    

                    if($anno_actual - $anno_captura <= 30 
                            and $anno_actual - $anno_captura > 0) {
                       
                        $fecha_captura = $tmp_fecha_captura;
                    } elseif($anno_actual - $anno_captura > 31) {
                        
                        $err_fecha_captura = "No puedes tener más de 30 años";
                        
                    } elseif($anno_actual - $anno_captura < 0) {
                        $err_fecha_captura = "No puedes tener menos de 0 años";
                       
                    } elseif($anno_actual - $anno_captura == 31) {
                        if($mes_actual - $mes_captura < 0) {
                            
                            $fecha_captura = $tmp_fecha_captura;
                        } elseif($mes_actual - $mes_captura > 0) {
                            
                            $err_fecha_captura = "No puedes tener más de 30 años";
                        
                        } elseif($mes_actual - $mes_captura == 0) {
                            if($dia_actual - $dia_captura < 0) {
                               
                                $fecha_captura = $tmp_fecha_captura;
                            } elseif($dia_actual - $dia_captura >= 0) {
                              
                                $err_fecha_captura = "No puedes tener más de 30 años";
                               
                            }
                        }
                    } elseif($anno_actual - $anno_captura == 0) {
                        if($mes_actual - $mes_captura < 0) {
                          
                            $err_fecha_captura = "No puede ser posterior a la fecha actual";
                            
                        } elseif($mes_actual - $mes_captura < 0) {
                           
                            $fecha_captura = $tmp_fecha_captura;
                        } elseif($mes_actual - $mes_captura == 0) {
                            if($dia_actual - $dia_captura < 0) {
                              
                                $err_fecha_captura = "No puede ser posterior a la fecha actual";
                               
                            } elseif($dia_actual - $dia_captura >= 0) {
                               
                                $fecha_captura = $tmp_fecha_captura;
                            }
                        }
                    }
    
                }
            }

            if(strlen($tmp_descripcion) > 200) {
                $err_descripcion = "La descripción no puede tener más de 200 caracteres";
            } else {
                $patron = "/^[a-zA-Z ÀÈÌÒÙàèìòùÑñ]+$/";
                if(!preg_match($patron, $tmp_descripcion)) {
                    $err_descripcion = "La descripción solo puede contener 
                        letras, números, espacios en blanco, y vocales con tilde";
                } else {
                    $descripcion = $tmp_descripcion;
                }
            }

        }
    ?>

    <form action="" method="post">
        <input type="text" name="nombre" id="" placeholder="Nombre">
            <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        <br><br>
        <input type="text" name="peso" id="" placeholder="Peso">
            <?php if(isset($err_peso)) echo "<span class='error'>$err_peso</span>"; ?>
        <br><br>
        <label for="genero">Genero</label>
        <br>
        <input type="radio" name="genero" id="" value="hembra">
        <label for="hembra">Hembra</label>
        <input type="radio" name="genero" id="" value="macho">
        <label for="macho">Macho</label>
            <?php if(isset($err_genero)) echo "<span class='error'>$err_genero</span>"; ?>
        <br><br>
        <select name="tipo" id="tipo">
            <option value="fuego">Agua</option>
            <option value="fuego">Fuego</option>
            <option value="volador">Volador</option>
            <option value="planta">Planta</option>
            <option value="electrico">Electrico</option>
        </select>
        <?php if(isset($err_tipo)) echo "<span class='error'>$err_tipo</span>"; ?>
        <br><br>
        <label for="">Fecha de Captura</label>
            <input type="date" name="fecha_captura" id="">
            <?php if(isset($err_fecha_captura)) echo "<span class='error'>$err_fecha_captura</span>"; ?>
        <br><br>
        <label for="descripcion">Descripción (opcional, máximo 200 letras):</label><br>
        <textarea name="descripcion" id="descripcion" placeholder="Escribe una descripción..."></textarea><br>
            <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?><br><br>
        <br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>