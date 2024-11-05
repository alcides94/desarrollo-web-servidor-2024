<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videojuegos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php
        error_reporting( E_ALL );
        ini_set( "display_errors", 1 );
        
    ?>
    <style>
        .error{
            color:red;
        }
    </style>
</head>
<body>
    
    
    <div class="container">
    <?php
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $tmp_titulo = $_POST["titulo"];
            if(isset($_POST["consola"])) $tmp_consola = $_POST["consola"];
            else $tmp_consola = "";
            $tmp_descripcion = $_POST["descripcion"];
            $tmp_fecha_lanzamiento = $_POST["fecha_lanzamiento"];

            if($tmp_titulo == '') {
                $err_titulo = "El título es obligatorio";
            }else{
                if(strlen($tmp_titulo)>60){
                    $err_titulo="el titulo debe tener entre 1 y 60 caracteres";
                }else{
                    $patron="/^[a-zA-Z0-9 ]+$/";
                    if(!preg_match($patron,$tmp_titulo)){
                        $err_titulo="el titulo solo puede contener letras nuemeros y espacion en blanco";
                    }else{
                        $titulo=$tmp_titulo;
                    }
                }
            }

            if($tmp_consola == '') {
                $err_consola = "La consola es obligatoria";
            }else{
                $consolas_validas=["ps4","ps5", "switch","xboxsx","pc"];
                if(!in_array($tmp_consola,$consolas_validas)){
                    $err_consola="la consola elejida no es valida";
                }else{

                }
            }
            if($tmp_descripcion > 255) {
                $err_descripcion = "La desxcripcion no puede tebner mas de 255 caracteres";
            }else{
                $patron="/^[a-zA-Z0-9 .,]+$/";
                if(!preg_match($patron,$tmp_descripcion)){
                    $err_descripcion="la descripcion solo puede tener palabras, punto coma y espacions en blanco";
                }else{
                    $descripcion=$tmp_descripcion;
                }
            }
            if($tmp_fecha_lanzamiento == '') {
                $err_fecha_lanzamiento = "La fecha de lanzamiento es obligatoria";
            }else{
                $patron ="/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}$/";
                if(!preg_match($patron,$tmp_fecha_lanzamiento)){
                    $err_fecha_lanzamiento="el formato esta mal";
                }else{
                    //se genera un array con el dia mes y año y el explode hace que se gener
                    list($anno,$mes,$dia)=explode('-',$tmp_fecha_lanzamiento);
                    //comprobam,os que año no sea menor a 1947
                    if($anno<1947){
                        $err_fecha_lanzamiento="el año no puede ser menor a 1947";
                    }else{
                        $anno_actual=date("Y");
                        $mes_actual=date("m");
                        $dia_actual=date("d");

                        if($anno-$anno_actual>10){
                            $err_fecha_lanzamiento="el video juego no puede lanzarce dentro de mas de 10 años";
                        }elseif ($anno-$anno_actual<10){
                            //AÑO VALIDO
                            $fecha_lanzamiento=$tmp_fecha_lanzamiento;
                        }else{
                            if($mes-$mes_actual<0){
                                    //AÑO VALIDO
                                    $fecha_lanzamiento=$tmp_fecha_lanzamiento;
                            }elseif($mes-$mes_actual>0){
                                $err_fecha_lanzamiento="el video juego no puede lanzarce dentro de mas de 10 años ERROR EN MES";
                            }else{
                                if($dia-$dia_actual>0){
                                    $err_fecha_lanzamiento="el video juego no puede lanzarce dentro de mas de 10 años ERROR EN DIAS";
                                }elseif($dia-$dia_actual<=0){
                                    $fecha_lanzamiento=$tmp_fecha_lanzamiento;
                                }
                            }
                        }
                    }
                }
            }
        }
        ?>


        <!-- Content here -->
        <h1>Formulario de Videojuegos</h1>  
        <form class="col-4" action="" method="post">
            <div class="mb-3">
                <label for="" class="form-label">Titulo</label>
                <input type="text" name="titulo" id="" class="form-control">
                <?php if(isset($err_titulo))echo"<span class='error'>Error en: $err_titulo</span>"?>
            </div>
            
            <div class="mb-3">
                <label for="" class="form-label">Consola</label>
                <div class="form-check" value="ps4">
                    <input type="radio" name="consola" id="" class="form-check-input">
                    <label for="" class="form-check-label">Play 4</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="consola" id="" class="form-check-input" value="ps5">
                    <label for="" class="form-check-label">Play 5</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="consola" id="" class="form-check-input"  value="switch">
                    <label for="" class="form-check-label">Nintendo Switch</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="consola" id="" class="form-check-input"  value="pc">
                    <label for="" class="form-check-label">PC</label>
                </div>
                <div class="form-check">
                    <input type="radio" name="consola" id="" class="form-check-input"  value="xboxsc">
                    <label for="" class="form-check-label">XBox Series X/S</label>
                </div>
                <?php if(isset($err_consola))echo"<span class='error'>Error en: $err_consola</span>"?>
            </div>
            <div  class="mb-3">
                <label for="" class="form-label">Descripcion</label>
                <textarea type="text" name="descripcion" class="form-control"> </textarea>
                <?php if(isset($err_descripcion))echo"<span class='error'>Error en: $err_descripcion</span>"?>
            </div>
            <div  class="mb-3">
                <label for="" class="form-label">Fecha de lanzamiento</label>
                <input type="date" name="fecha_lanzamiento" class="form-control">
                <?php if(isset($err_fecha_lanzamiento))echo"<span class='error'>Error en: $err_fecha_lanzamiento</span>"?>
                </div>
            <div class="mb-3">
                <input type="submit" value="Enviar" class="btn btn-primary">
            </div>

        </form>


    </div>
      


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
      
</body>
</html>