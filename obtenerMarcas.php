<?php
include 'conexion.php';
$clienteId = $_POST['clienteId'];

$query = "SELECT * FROM marcas WHERE id_cliente = '$clienteId'";

$result = $conn->query($query);

$marcas = array();

while ($row = $result->fetch_assoc()) {
  $marcas[] = $row;
}

$json = json_encode($marcas);

echo $json;

// Cerrar la conexión a la base de datos
$conn->close();
?>