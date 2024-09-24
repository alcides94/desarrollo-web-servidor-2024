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

    ?>
</body>
</html>