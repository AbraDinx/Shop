<?php
session_start();

$host = 'localhost';
$usuario_db = 'root';
$contraseña_db = '';
$base_de_datos = 'bdh';

// Crear conexión
$conn = new mysqli($host, $usuario_db, $contraseña_db, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verifica que los datos vengan por POST para evitar errores
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario con seguridad
    $nombre = trim($_POST['nombre']);
    $password = $_POST['contraseña'];

    // Buscar usuario por nombre
    $sql = "SELECT * FROM usuario WHERE Nombre = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $nombre);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        // Aquí verifica la contraseña
        // Si usas password_hash en DB:
        // if (password_verify($password, $usuario['Contraseña'])) {
        // Para texto plano (no recomendado):
        if ($password === $usuario['Contraseña']) {
            $_SESSION['Nombre'] = $usuario['Nombre'];
            header("Location: index.php");  // Redirige al inicio
            exit();
        } else {
            echo "<p style='color:red;'>Contraseña incorrecta.</p>";
        }
    } else {
        echo "<p style='color:red;'>Usuario no registrado.</p>";
    }

    $stmt->close();
}

$conn->close();
?>
