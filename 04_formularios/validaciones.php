 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <?php   
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );    
    ?>
    <style>
        .error {
            color:red;
        }
    </style>
</head>
<body> 
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $tmp_titulo = $_POST["titulo"];
    $tmp_consola = $_POST["consola"];
    $tmp_descripcion= $_POST["descripcion"];
    $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];  // recojemos en el formulario 4 variables distintas 

  //titulo
    if ($tmp_titulo != '') {
        $patron = "/^[A-Za-z0-9]{1,60}$/";
        if (preg_match($patron, $tmp_titulo)) { // Verificar si coincide con el patrón
            $titulo = ucwords(strtolower($tmp_titulo)); // Si es válido, formatea el título
        } else if (strlen($tmp_titulo) < 1 || strlen($tmp_titulo) > 60) { // Si no cumple la longitud
            $err_titulo= "El titulo tiene que tener entre uno y 60 caracteres.";
        } else {
            $err_titulo= "El titulo no puede tener caracteres especiales."; // Si tiene caracteres no permitidos
        }
    } else {
        $err_titulo = "El titulo es obligatorio."; // Si el título está vacío
    }

    //fecha_lanzamiento // 
    if ($tmp_fecha_lanzamiento != '') {
        $patron = "/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
        if (preg_match($patron, $tmp_fecha_lanzamiento)) {
            $fecha_minima = "1947-01-01";// 
            $fecha_maxima = date("Y-m-d", strtotime("+10 years"));  //Aquí se calcula la fecha actual más 10 años

            list($anno_lanzamiento, $mes_lanzamiento, $dia_lanzamiento) = explode('-', $tmp_fecha_lanzamiento);
            list($anno_min, $mes_min, $dia_min) = explode('-', $fecha_minima);
            list($anno_max, $mes_max, $dia_max) = explode('-', $fecha_maxima);

            if (($anno_lanzamiento > $anno_min) || //Se evalúa si el año es mayor que el mínimo. Si el año es igual al mínimo, 
                ($anno_lanzamiento == $anno_min && $mes_lanzamiento > $mes_min) || 
                ($anno_lanzamiento == $anno_min && $mes_lanzamiento == $mes_min && $dia_lanzamiento >= $dia_min)) {
                
                if (($anno_lanzamiento < $anno_max) || 
                    ($anno_lanzamiento == $anno_max && $mes_lanzamiento < $mes_max) || 
                    ($anno_lanzamiento == $anno_max && $mes_lanzamiento == $mes_max && $dia_lanzamiento <= $dia_max)) {
                    
                    $fecha_lanzamiento = $tmp_fecha_lanzamiento;
                } else {
                    $err_fecha_lanzamiento = "La fecha de lanzamiento debe ser dentro de los próximos 10 años.";
                }
            } else {
                $err_fecha_lanzamiento = "La fecha de lanzamiento debe ser posterior al 1 de enero de 1947.";
            }
        } else {
            $err_fecha_lanzamiento = "Fecha de lanzamiento no válida (formato YYYY-MM-DD).";
        }
    } else {
        $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria.";
    }
}
?>

<form action="" method="post">
    <label>Título</label><br>
    <input type="text" name="titulo" placeholder="Título"><br>
    <?php if (isset($err_titulo)) echo "<span class='error'>$err_titulo</span>" ?><br><br>

    <label>Consola</label><br>
    <input type="radio" name="consola" value="pc"> PC<br>
    <input type="radio" name="consola" value="nintendo switch"> Nintendo Switch<br>
  <input type="radio" name="consola" value="ps4"> <label>PS4</label> <br>
   
  <input type="radio" name="consola" value="ps5">  <label>PS5</label> <br>
 
    <input type="radio" name="consola" value="xbox series x"> Xbox Series X<br>
    <input type="radio" name="consola" value="xbox series s"> Xbox Series S<br>
    <?php if (isset($err_consola)) echo "<span class='error'>$err_consola</span>"; ?><br><br>

    <label for="descripcion">Descripción (opcional, máximo 255 caracteres):</label><br>
    <textarea name="descripcion" id="descripcion" placeholder="Escribe una descripción..."></textarea><br>
    <?php if (isset($err_descripcion)) echo "<span class='error'>$err_descripcion</span>"; ?><br><br>

    <label>Fecha de lanzamiento</label><br>
    <input type="date" name="fecha_lanzamiento"><br>
    <?php if (isset($err_fecha_lanzamiento)) echo "<span class='error'>$err_fecha_lanzamiento</span>"; ?><br><br><!--está definida y no es null. La función isset() devuelve true si la variable existe.-->

    <input type="submit" value="Enviar">
</form>
</body>
</html>