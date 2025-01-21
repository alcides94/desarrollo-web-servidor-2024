<?php

/**CODIGO DE ERROR */
    error_reporting( E_ALL );
    ini_set( "display_errors", 1 );


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
        if (isset($_GET["ciudad"]) && isset($_GET["anno_fundacion"])) {
            $sql="SELECT * FROM estudios WHERE ciudad = :ciudad and anno_fundacion = :anno_fundacion";
            $stmt=$_conexion->prepare($sql);
            $stmt->execute([
                "ciudad" => $_GET["ciudad"],
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        }elseif (isset($_GET["anno_fundacion"])) {
            $sql="SELECT * FROM estudios WHERE anno_fundacion = :anno_fundacion";
            $stmt=$_conexion->prepare($sql);
            $stmt->execute([
                "anno_fundacion" => $_GET["anno_fundacion"]
            ]);
        }elseif (isset($_GET["ciudad"])) {
            $sql="SELECT * FROM estudios WHERE ciudad = :ciudad";
            $stmt=$_conexion->prepare($sql);
            $stmt->execute([
                "ciudad" => $_GET["ciudad"]
            ]);
        }else{
            $sql="SELECT * FROM estudios";
            $stmt =$_conexion -> prepare($sql);
            $stmt -> execute();
        }
        /*
        $sql="SELECT * FROM estudios";
        $stmt =$_conexion -> prepare($sql);
        $stmt -> execute();
        $resultado = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($resultado);*/
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
        /**
         * 
 
         * 
         */

    }


    function manejarDelete($_conexion, $entrada){
  //      echo json_encode(["metodo" => "put"]);
        $sql="DELETE FROM estudios WHERE nombre_estudio=:nombre_estudio";
        $stmt=$_conexion -> prepare($sql);
        $stmt->execute(
            ["nombre_estudio"=>$entrada["nombre_estudio"]]
        );
        if ($stmt) {
            echo json_encode(["mensaje"=>"el estudio se ha borrado"]);
        }else{
            echo json_encode(["mensaje"=>"error al borrar"]);
        }
    }
    function manejarPut($_conexion, $entrada){
        echo json_encode(["metodo" => "delete"]);
    }
    

?>