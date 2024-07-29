<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd_agencia";

// Crear la conexión
$conectar = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conectar->connect_error) {
    die("Conexión fallida: " . $conectar->connect_error);
}

// Obtener los datos del formulario
$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];

// Realizar la consulta a la base de datos
$sql = "SELECT * FROM VUELO WHERE origen='$origen' AND destino='$destino' AND fecha='$fecha'";
$result = $conectar->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados de Búsqueda de Vuelos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Resultados de Búsqueda de Vuelos</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID Vuelo</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas Disponibles</th><th>Precio</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['id_vuelo'] . "</td><td>" . $row['origen'] . "</td><td>" . $row['destino'] . "</td><td>" . $row['fecha'] . "</td><td>" . $row['plazas_disponibles'] . "</td><td>" . $row['precio'] . "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No se encontraron vuelos que coincidan con los criterios de búsqueda.";
    }
    $conectar->close();
    ?>
    <br><br>
    <a href="buscar_vuelo.html">Regresar a la búsqueda</a>
    <br><br>
    <a href="index.html">Regresar al Inicio</a>
</body>
</html>
