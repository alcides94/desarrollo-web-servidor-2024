<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            $tmp_usuario=$_POST["usuario"];
            $tmp_nombre=$_POST["nombre"];
            $tmp_apellido=$_POST["nombre"];
            $tmp_apellido=$_POST["apellido"];
        

            if($tmp_usuario==''){
                $err_usuario="El usuario es obligatorio";
            }else{
                $patron="/^[a-zA-Z0-9_]{4,12}+$/";
                if (!preg_match($patron,$tmp_usuario)) {
                    $err_usuario="El usuario debe tener de 4 a 12 caracteres. letras numeros y barrabaja";
                }else{
                    $usuario=$tmp_usuario;
                }
            }

            if($tmp_nombre==''){
                $err_nombre="El nombre es obligatio";
            }else{
                if(strlen($tmp_nombre)<2 || strlen($tmp_nombre)>30 ){
                    $err_nombre="el nombre debe ser entre 2 a 30 caracteres";
                }else{
                    $patron="/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                    if(!preg_match($patron, $tmp_nombre)){
                        $erro_nombre="El nombre solo puede tener leytras o espacios en blancos";
                    }else{
                        $nombre=$tmp_nombre;
                    }
                }

            }
            if($tmp_apellido==''){
                $err_apellido="El apellido es obligatio";
            }else{
                if(strlen($tmp_apellido)<2 || strlen($tmp_apellido)>30 ){
                    $err_apellido="el apellido debe ser entre 2 a 30 caracteres";
                }else{
                    $patron="/^[a-zA-Z\ áéíóúÁÉÍÓÚ]+$/";
                    if(!preg_match($patron, $tmp_apellido)){
                        $err_apellido="El apellido solo puede tener letras o espacios en blancos";
                    }else{
                        $apellido=$tmp_apellido;
                    }
                }

            }

            if ($tmp_fecha_nacimiento=='') {
                $err_fecha_nacimiento="la fecha de nacimeinto es obligatiriuo";
            }else{
                $patron="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron, $tmp_fecha_nacimiento)) {
                    $err_fecha_nacimiento="El formato es incorecto";
                }else{
                    $fecha_actual=date("Y-m-d");
                    list($anno_actual, $mes_actual, $dia_actual) = explode('-', $fecha_actual);

                    list($anno, $mes, $dia)=explode('-', $tmp_fecha_nacimiento);
                
                    $a=$anno_actual-$anno;

                    if($a<=121){
                        if($mes_actual<=$mes){
                            if ($dia_actual<$dia) {
                                echo "fecha valida";
                            }else{
                                echo "supero la fecha";
                            }
                            
                        }else{
                            echo "supero la fecha";
                        }
                        
                    }else{
                        echo "supero la fecha";
                    }

                }
            }


        }

    ?>

    <form action="" method="post">
        <input type="text" name="usuario" id="" placeholder="Nombre">
        <?php if(isset($err_usuario)) echo "<span class='error'>$err_usuario</span>"; ?>
        <br><br>
        <input type="text" name="nombre" id="" placeholder="Nombre">
        <?php if(isset($err_nombre)) echo "<span class='error'>$err_nombre</span>"; ?>
        <br><br>
        <input type="text" name="apellido" id="" placeholder="Apellido">
        <?php if(isset($err_apellido)) echo "<span class='error'>$err_apellido</span>"; ?>
        <br><br>
        <label for="">Fecha de Nacimiento</label>
        <input type="date" name="fecha_nacimiento" id="">
        <br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>