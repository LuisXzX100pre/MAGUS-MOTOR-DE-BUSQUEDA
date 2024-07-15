<?php
if(isset($_GET["Servicio"]) && $_GET["Servicio"] != '') {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "magus";
    $conn = new mysqli($servername, $username, $password, $database);

    if($conn->connect_error) {
        die("Error en la conexión: " . $conn->connect_error);
    }

    $Servicio = $_GET['Servicio'];

    $stmt = $conn->prepare("SELECT * FROM Servicios WHERE Nombre LIKE ?");
    $searchTerm = "%" . $Servicio . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>";
            echo "<div>";
            echo "<h3>" . $row["Nombre"] . "</h3>";
            echo "<p>Tiene un precio de $" . $row["Costo"] . ". Ubicación: " . $row["Ubicacion_Servicio"] . "</p>";
            echo "</div>";
            echo "<img src='".$row["imagen_url"]."' alt='Imagen del servicio'>";
            echo "</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron resultados para el servicio buscado.";
    }

    $stmt->close();
    $conn->close();
}
?>
