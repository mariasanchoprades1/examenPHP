<?php

// Añadido ',' para separar los elementos del array correctamente.
$notas = array("Jose Garcia" => 10, "Jorge Navarro" => 8, "Hector Peralta" => 9, "Marc Julian" => 7, "Jaime Mateo" => 5);

// Inicializado $sum en 0 para sumar correctamente las notas.
$sum = 0;

// Ajustado el bucle foreach para usar la sintaxis correcta.
foreach ($notas as $apellido => $nota) {
    echo "Alumno <b>$apellido</b> nota <b>$nota</b> </br>";
    // Corregido: Acumular la suma de las notas.
    $sum += $nota;
}

// Dividir la suma total por el número de notas para obtener la media.
echo "Nota media <b>" . $sum / count($notas);
echo "</b>";
?>



