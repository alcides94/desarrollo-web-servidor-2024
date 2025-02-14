<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('consolas.store') }}" method="post">
        @csrf
        <label for="">Nombre: </label>
        <input type="text" name="nombre" id=""> <br><br>
        <label for="">Año lanzamiento</label>
        <input type="number" name="ano_lanzamiento" id=""><br><br>
        <input type="submit" value="Crear">
    </form>
</body>
</html>