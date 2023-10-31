<?php //todos producen 01-01-1998
echo date("m-d-Y", mktime(0, 0, 0, 12, 32, 1997));
echo "</br>";
echo date("M-d-Y", mktime(0, 0, 0, 13, 1, 1997));
echo "</br>";
echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 1998));
echo "</br>";
echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 98));
echo "</br>";
echo "</br>";
$fecha = date_create('2023-10-10'); // Crear un objeto DateTime para la fecha '2023-10-10'

if ($fecha !== false) {
    echo "Fecha creada con éxito: " . date_format($fecha, 'Y-m-d'); // Formatear y mostrar la fecha
} else {
    echo "Error al crear la fecha."; // Mostrar un mensaje de error si la fecha no se pudo crear
}
?>