<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consolas</title>
</head>
<body>
    <h1>Vistas de consolas</h1>
    <ul>
        @foreach($consolas as $consola)
            <li>{{$consola->nombre}}</li>
        @endforeach
    </ul>
</body>
</html>