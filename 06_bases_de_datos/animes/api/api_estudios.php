<?php

    header("Content-type: application/json");
    include("conexion_pdo.php");

    $metodo = $_SERVER["REQUEST_METHOD"];

    $entrada =json_decode(file_get_contents('php://input'),true);

    switch ($metodo) {
        case 'GET':
            manejarGet($_conexion);
            break;
        case 'POST':
            manejarPost($_conexion, $entrada);
            break;
        case 'PUT':
            manejarPut($_conexion, $entrada);
            break;
        case 'DELETE':
            manejarDelete($_conexion, $entrada);
            break;
        default:
            echo json_encode(["mensaje" => "Peticion no valida"]);
            break;
    }

    function manejarGet($_conexion){
        //echo json_encode(["metodo" => "get"]);
        $sql="SELECT * FROM estudios";
        $stmt =$_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);
    }
    function manejarPost($_conexion, $entrada){
        //echo json_encode(["metodo" => "post"]);
        $sql ="INSERT INTO estudios VALUES(:nombre_estudio, :ciudad, :anno_fundacion)";
        $stmt =$_conexion -> prepare($sql);
        
        $stmt -> execute([
            "nombre_estudio" => $entrada["nombre_estudio"],
            "ciudad" => $entrada["ciudad"],
            "anno_fundacion" => $entrada["anno_fundacion"]
        ]);
        
        if ($stmt) {
            echo json_encode(["mensaje"=>"el estudio se ha creado"]);
        }else{
            echo json_encode(["mensaje"=>"error al crear"]);
        }


    }
    
    function manejarPut($_conexion, $entrada){
        echo json_encode(["metodo" => "put"]);
    }
    function manejarDelete($_conexion, $entrada){
        echo json_encode(["metodo" => "delete"]);
    }
    

?>