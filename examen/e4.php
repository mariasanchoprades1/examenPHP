<?php
$conexion = 'mysql:dbname=Examen;host=127.0.0.1';
$usuarioDB = 'root';
$contrasenaDB = '';

try {
    $pdo = new PDO($conexion, $usuarioDB, $contrasenaDB);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['name'], $_POST['title'], $_POST['class'], $_POST['section'], $_POST['rollid'])) {
            $nombre = $_POST['name'];
            $titulo = $_POST['title'];
            $clase = $_POST['class'];
            $seccion = $_POST['section'];
            $rollid = $_POST['rollid'];

            $stmt = $pdo->prepare("INSERT INTO Student (Name, Title, Class, Section, Rollid) VALUES (:name, :title, :class, :section, :rollid)");
            $stmt->bindParam(':name', $nombre);
            $stmt->bindParam(':title', $titulo);
            $stmt->bindParam(':class', $clase);
            $stmt->bindParam(':section', $seccion);
            $stmt->bindParam(':rollid', $rollid);
            $stmt->execute();

            echo "Usuario creado con éxito!";
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }
} catch (PDOException $e) {
    echo "Error al conectar a la base de datos: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Student</title>
</head>
<body>
    <form action="" method="POST">
        <h1>Formulario de Registro</h1>
        <label for="name">Nombre: </label>
        <input type="text" name="name" id="name">
        <label for="title">Title: </label>
        <input type="text" name="title" id="title">
        <label for="class">Class: </label>
        <input type="text" name="class" id="class">
        <label for="section">Sección:</label>
        <input type="text" name="section" id="section">
        <label for="rollid">Rollid:</label>
        <input type="text" name="rollid" id="rollid">
        <input type="submit" value="Crear Estudiante">
    </form>
</body>
</html>