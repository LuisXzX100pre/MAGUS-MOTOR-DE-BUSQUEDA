<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilos.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Buscador de servicios</title>
</head>
<body>
    <h1>Buscador de servicios</h1>

    <input type="text" id="search" placeholder="Ingresa el nombre del servicio">

    <div id="resultados">
    </div>

    <script>
        $(document).ready(function() {
            $("#search").on("keyup", function() {
                let query = $(this).val();
                if (query !== "") {
                    $.ajax({
                        url: 'buscador.php',
                        method: 'GET',
                        data: { Servicio: query },
                        success: function(data) {
                            $("#resultados").html(data);
                        }
                    });
                } else {
                    $("#resultados").html("");
                }
            });
        });
    </script>
</body>
</html>
