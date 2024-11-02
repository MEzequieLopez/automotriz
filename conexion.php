<?php
$host = 'obelix.tgnorte.com.ar';
$puerto = '5737';
$usuario = 'root';
$contraseña = '';
$base_de_datos = 'automotriz';

$conn = new mysqli($host. ':'. $puerto, $usuario, $contraseña, $base_de_datos);

function conexion ($a) {
    return $a ? true : false;
}

conexion($conn);

Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: ". $conn->connect_error);
}
?>