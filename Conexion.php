<?php
$host = "localhost";      
$nombre = "root";  
$contraseña = "";  
$base_de_datos = "bdh";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

echo "Conexión exitosa a la base de datos 'bdh'";
?>
