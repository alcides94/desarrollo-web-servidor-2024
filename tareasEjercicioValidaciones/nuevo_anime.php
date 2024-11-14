<!--
Vamos a crear dos formularios: uno para animes y otro para los estudios de animación de la base de datos proporcionada 
en clase.
El formulario de los animes lo crearemos en un fichero llamado “nuevo_anime.php” y tendrá los siguientes campos:
titulo: Es obligatorio y tendrá como máximo 80 caracteres. Admite cualquier tipo de carácter.
nombre_estudio: Es obligatorio y se elegirá mediante un campo de tipo select. Para crear este select primero haremos un array unidimensional con nombres de estudios de anime (al menos 5, puedes coger los nombres de la base de datos). Los option del select se crearán de manera dinámica en un bucle recorriendo dicho array y creando un option por cada valor del mismo. 
anno_estreno: Es opcional y se elegirá mediante un campo de texto. Sólo aceptará valores numéricos entre 1960 y dentro de 5 años (inclusive). 
num_temporadas: Es obligatorio y será un valor numérico entre 1 y 99.


-->
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
    /**funcion que no sirve para eliminar etiquetas HTML, espacios fuera de las palabras y espacios dentro */
        function depurar(string $entrada) : string {
            $salida = htmlspecialchars($entrada);
            $salida = trim($salida);
            $salida = preg_replace('/\s+/', ' ', $salida);
            return $salida;
        }


        $nombre_estudios=[
            "Sony",
            "Pictures",
            "Universal",
            "ACA",
            "2C-DAW"
        ];

    ?>

    <?php
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            /**llamamos a la funcion enviando lo recibido mediante POST */
            $tmp_titulo=depurar($_POST["titulo"]);
            //verifico si el select tiene seleccionado algo y en caso que no la variable queda en ""
            if(isset($_POST["nombre_estudio"])) $tmp_nombre_estudio=depurar($_POST["nombre_estudio"]);
            else $tmp_nombre_estudio="";
            $tmp_anno_estreno=depurar($_POST["anno_estreno"]);
            $tmp_num_temporadas=depurar($_POST["num_temporadas"]);

            if ($tmp_titulo==""){
                $err_titulo="El titulo es obligatorio";
            }else{
                //strlen se utiliza para contar una cadena de texto
                if (strlen($tmp_titulo)<80){
                    $titulo=$tmp_titulo;
                }else{
                    $err_titulo="El titulo debe ser menor a 80 caracteres"; 
                }
            }

            if ($tmp_nombre_estudio=='') {
                $err_nombre_estudio="Ingrese el nombre del estudio";
            }else{
                if(!in_array($tmp_nombre_estudio, $nombre_estudios)) {
                    $err_nombre_estudio = "Elige un nombre de estudio válido";
                } else {
                    $nombre_estudio=$tmp_nombre_estudio;
                }

            }

            if ($tmp_anno_estreno==''){
                $anno_estreno=$tmp_anno_estreno;
            }else{
                $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if (!preg_match($patron,$tmp_anno_estreno)) {
                    $err_anno_estreno="debe ingresar un año con formato correcto";
                }else{
                    list($anno, $mes, $dia)=explode('-',$tmp_anno_estreno);
                    if ($anno<1960) {
                        $err_anno_estreno="el año no puede ser anterior a 1960";
                    }else{
                        $anno_actual=date("Y");
                        $mes_actual=date("m");
                        $dia_actual=date("d");
                        if($anno-$anno_actual>5){
                            $err_anno_estreno="no puede lanzarse dentro de mas de 5 años";
                        }elseif($anno-$anno_actual<5){
                            $anno_estreno=$tmp_anno_estreno;
                        }else{
                            if ($mes-$mes_actual<0) {
                                $anno_estreno=$tmp_anno_estreno;
                            }elseif($mes-$mes_actual>0){
                                $err_anno_estreno="no puede lanzase dentro de mas de 5 años";
                            }else{
                                if ($dia-$dia_actual<=0) {
                                    $anno_estreno=$tmp_anno_estreno;
                                }else{
                                    $err_anno_estreno="no puede lanzarse dentro de mas de 5 años";  
                                }
                            }
                        }
                    }
                }
            }

            if ($tmp_num_temporadas==''){
                $err_num_temporadas="el numero de temporadas es obligatorio";
            }else{
                if(filter_var($tmp_num_temporadas, FILTER_VALIDATE_INT) === FALSE) {
                    $err_num_temporadas = "El numero de temporadas debe ser un número entero";
                } else {
                    if($tmp_num_temporadas < 1) {
                        $err_num_temporadas = "El numero de temporadas no puede ser un número NEGATIVO o 0";
                    } elseif ($tmp_num_temporadas > 99) {
                        $err_num_temporadas = "El numero de temporadas no puede ser SUPERRIOR A 99";
                    }else{
                        $num_temporadas=$tmp_num_temporadas;
                    }
                }
            }
        }    
    
    ?>
    <form action="" method="post">
        <input type="text" name="titulo" id="" class="titulo" placeholder="Titulo">
        <?php if(isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?>
        <br><br>
        
        <select name="nombre_estudio" >
            <option disabled selected hidden>--- ELIGE EL ESTUDIO ---</option>
            <?php foreach ($nombre_estudios as $op) { ?>
                    <option value="<?php echo $op; ?>"><?php echo $op; ?></option>
            <?php } ?>
        </select>

        <?php if(isset($err_nombre_estudio)) echo "<span class='error'>$err_nombre_estudio</span>" ?>
        <br><br>
        <input type="date" name="anno_estreno" id="" class="anno_estreno" placeholder="Año de Estreno">
        <?php if(isset($err_anno_estreno)) echo "<span class='error'>$err_anno_estreno</span>" ?>
        <br><br>
        <input type="text" name="num_temporadas" id="" class="num_temporadas" placeholder="Num Temporadas">
        <?php if(isset($err_num_temporadas)) echo "<span class='error'>$err_num_temporadas</span>" ?>
        <br><br>
        <input type="submit" value="Enviar">
    </form>

    

    

</body>
</html>