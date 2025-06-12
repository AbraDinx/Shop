<?php
$host = 'localhost';
$usuario_db = 'root';         // Cambia esto por tu usuario de MySQL
$contrasena_db = '';   // Cambia esto por tu contraseña de MySQL
$base_de_datos = 'bdh';

// Crear conexión
$conn = new mysqli($host, $usuario_db, $contrasena_db, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener y limpiar datos del formulario
$nombre = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['contraseña'];

// Cifrar la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Preparar e insertar
$stmt = $conn->prepare("INSERT INTO usuario (Nombre, Contraseña, Correo) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $password_hash, $email);

if ($stmt->execute()) {
    echo "Registro exitoso. <a href='index.php'>Inicia sesión aquí</a>.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
