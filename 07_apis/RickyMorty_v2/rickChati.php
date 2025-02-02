<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rick and Morty Characters</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .table-primary {
            --bs-table-color-state: green;
            --bs-table-bg: beige;
        }
    </style>
</head>
<body>
    <div class="container">
        <br>
        <h1>Rick and Morty Characters</h1>
        <br>
        <!-- Formulario -->
        <form action="" method="get">
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad de personajes</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" >
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género</label>
                <select class="form-select" id="genero" name="genero">
                    <option value="" selected hidden>---Elige---</option>
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="especie" class="form-label">Especie</label>
                <select class="form-select" id="especie" name="especie">
                    <option value="" selected hidden>---Elige---</option>
                    <option value="human">Human</option>
                    <option value="alien">Alien</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <?php
        // Procesar el formulario
        if ($_SERVER["REQUEST_METHOD"] == "GET" && (!empty($_GET["cantidad"]) || !empty($_GET["genero"]) || !empty($_GET["especie"]))) {
            // Parámetros del formulario
            $cantidad = $_GET["cantidad"] ?? 20; // Valor por defecto si no se especifica
            $genero = $_GET["genero"] ?? "";
            $especie = $_GET["especie"] ?? "";

            // Construir la URL de la API
            $url = "https://rickandmortyapi.com/api/character/?";
            $params = [];
            if (!empty($genero)) {
                $params['gender'] = $genero;
            }
            if (!empty($especie)) {
                $params['species'] = $especie;
            }
            $url .= http_build_query($params);

            // Hacer la solicitud a la API
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $respuesta = curl_exec($curl);
            curl_close($curl);

            // Decodificar la respuesta JSON
            $datos = json_decode($respuesta, true);

            // Verificar si hay resultados
            if (isset($datos["results"])) {
                $personajes = $datos["results"];
                $total_personajes = count($personajes);
                $cantidad = min($cantidad, $total_personajes); // Asegurarse de no exceder el límite
                echo "<h2>Resultados:</h2>";
                echo "<table class='table table-striped'>";
                echo "<thead class='table-primary'><tr><th>Nombre</th><th>Género</th><th>Especie</th><th>Origen</th></tr></thead>";
                echo "<tbody>";
                for ($i = 0; $i < $cantidad; $i++) {
                    echo "<tr>";
                    echo "<td>" . $personajes[$i]["name"] . "</td>";
                    echo "<td>" . $personajes[$i]["gender"] . "</td>";
                    echo "<td>" . $personajes[$i]["species"] . "</td>";
                    echo "<td>" . $personajes[$i]["origin"]["name"] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>No se encontraron personajes con los filtros seleccionados.</p>";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>