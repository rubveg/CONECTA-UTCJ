<?php
$host = "localhost";       // Servidor
$usuario = "conecta";         // Usuario de phpMyAdmin
$clave = "";               // Contraseña (vacía en XAMPP)
$bd = "kiosco_utcj";       // Nombre de tu base de datos

$conexion = new mysqli($host, $usuario, $clave, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>