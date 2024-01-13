<?php

// Se define la conexión a la base de datos
$conexion = 'mysql:dbname=Examen;host=127.0.0.1';
$usuario = 'root';
$contrasena = '';

try {
    // Intentar establecer la conexión
    $pdo = new PDO($conexion, $usuario, $contrasena);
    // Configurar el manejo de errores
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado a la base de datos con éxito!";
} catch (PDOException $e) {
    // Manejar el error
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}

$sql = "SELECT * FROM agents";
$result = $pdo->query($sql);

$data = array();

while ($row = $result->fetch()) {
    $data[] = $row;
}

$pdo = null;

echo "<table border='1'>";
echo "<tr>";
echo "<th>Agent Code</th>";
echo "<th>Agent Name</th>";
echo "<th>Working Area</th>";
echo "<th>Commission</th>";
echo "<th>Phone No</th>";
echo "<th>Country</th>";
echo "</tr>";

foreach ($data as $row) {
    echo "<tr>";
    echo "<td>" . $row['AGENT_CODE'] . "</td>";
    echo "<td>" . $row['AGENT_NAME'] . "</td>";
    echo "<td>" . $row['WORKING_AREA'] . "</td>";
    echo "<td>" . $row['COMMISSION'] . "</td>";
    echo "<td>" . $row['PHONE_NO'] . "</td>";
    echo "<td>" . $row['COUNTRY'] . "</td>";
    echo "</tr>";
}

echo "</table>";

echo "<p>Se han seleccionado " . count($data) . " filas.</p>";

?>