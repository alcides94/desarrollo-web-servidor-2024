<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clases de la semana</title>
</head>
<body>
    <?php
    $dia = date("l");
    echo "<h1>hoy es dia $dia</h1>";
    
    #1 ra forma

    /*switch($dia){
        case "Tuesday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        case "Wenesday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        case "Friday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        case "Monday":
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
            break;
        case "Thrusday":
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
            break;
        case "Sunday":
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
            break;
        case "Saturday":
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
            break;
    }
*/


# 3 ER FORMA
/*
    switch($dia){
        case "Tuesday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        case "Wenesday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        case "Friday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
            
        default:
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
    }
*/
# 3 ER FORMA
/*
    switch($dia){
        case "Tuesday":
        case "Wenesday":
        case "Friday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
        case "Monday":
        case "Thrusday":
        case "Sunday":
        case "Saturday":
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
            break;
    }
*/

/*
    # 4 forma y optimizada
    switch($dia){
        case "Tuesday":
        case "Wenesday":            
        case "Friday":
            echo "<p>Hoy hay clases de DW ENTORNO SERVIDOR</p>";
            break;
        default:
            echo "<p>Hoy NO hay clases de DW ENTORNO SERVIDOR</p>";
    }
*/


    # 4 TRANSFORMAR LOS DIAS EN ESPAÑOL
    $dia = date("l");
     # 4 forma y optimizada
     switch($dia){
        case "Tuesday":
            $dia="Martes";
            break;
        case "Wenesday": 
            $dia="Miercoles";
            break;           
        case "Friday":
            $dia="Viernes";
            break;
        case "Monday":
            $dia="Lunes";
            break;
        case "Thrusday":
            $dia="Jueves";
            break;
        case "Sunday":
            $dia="Sabado";
            break;
        case "Saturday":
            $dia="Domingo";
            break;
    }


    echo "<h1>hoy es dia $dia</h1>";
    switch($dia){
        case "Martes":
        case "Miercoles":            
        case "Viernes":
            echo "<p>Hoy es $dia hay clases de DW ENTORNO SERVIDOR</p>";
            break; 
        default:
            echo "<p>Hoy $dia NO hay clases de DW ENTORNO SERVIDOR</p>";
    }
/*
# forma de hacer con MATCH

    $resultado  = match ($dia) {
         "Martes"=> "<p>Hoy es $dia hay clases de DW ENTORNO SERVIDOR MATCH</p>",
         "Miercoles"=> "<p>Hoy es $dia hay clases de DW ENTORNO SERVIDOR</p>",
         "Viernes"=> "<p>Hoy es $dia hay clases de DW ENTORNO SERVIDOR</p>",
         default=> "<p>Hoy $dia NO hay clases de DW ENTORNO SERVIDOR</p>"
    };
*/
    $resultado  = match ($dia) {
        "Martes",
        "Miercoles",
        "Viernes"=> "<p>Hoy es $dia hay clases de DW ENTORNO SERVIDOR MATCH</p>",
        default=> "<p>Hoy $dia NO hay clases de DW ENTORNO SERVIDOR</p>"
    };
    echo $resultado;

    ?>
</body>
</html>