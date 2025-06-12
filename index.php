<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diseño</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body>

    <!-- ✅ ALERTA DE CIERRE DE SESIÓN -->
    <?php if (isset($_GET['logout']) && $_GET['logout'] == '1'): ?>
        <div class="logout-alert">
            ✅ Sesión cerrada correctamente.
        </div>
    <?php endif; ?>

    <!-- Botón flotante para iniciar sesión o mostrar nombre -->
    <div id="login-float">
        <?php if (isset($_SESSION['Nombre'])): ?>
            👤 <?php echo htmlspecialchars($_SESSION['Nombre']); ?> | <a href="logout.php">Cerrar sesión</a>
        <?php else: ?>
            <div class="login-btn" onclick="document.getElementById('loginModal').style.display='block'">
                Iniciar Sesión
            </div>
        <?php endif; ?>
    </div>

    <h1>HERREJON SHOOP</h1>

    <div id="header">
        <ul class="nav">
            <li><a href="#">Ropa</a>
                <ul>
                    <li><a href="Hombre.html">Hombre</a></li>
                    <li><a href="Mujer.html">Mujer</a></li>
                    <li><a href="niño.html">Niño(a)</a></li>
                </ul>
            </li>

            <li><a href="#">Soporte</a>
                <ul>
                    <li><a href="#">Tel: 4451571709 / 4451455476</a></li>
                    <li><a href="Ubicacion.html">Sucursal</a></li>
                </ul>
            </li>
        </ul>
    </div>

    <!-- Modal de Iniciar Sesión -->
    <?php if (!isset($_SESSION['Nombre'])): ?>
    <div id="loginModal" class="modal">
        <div class="modal-content" id="loginContent">
            <span class="close" onclick="document.getElementById('loginModal').style.display='none'">&times;</span>
            <h2>Iniciar Sesión</h2>
            <form action="ini.php" method="post">
                <input type="text" name="nombre" placeholder="Nombre" required>
                <input type="password" name="contraseña" placeholder="Contraseña" required>
                <button type="submit">Enviar</button>
            </form>
            <p>¿No tienes cuenta? <a href="Registro.html">Regístrate aquí</a></p>
        </div>
    </div>
    <?php endif; ?>

  <div class="image-carousel">
    <h1>Novedades</h1>
    <img id="carousel-image" src="CSS/ima1.jpg" width="500" height="500" style="border: 5px solid #000;">
</div>

<script>
    const images = [
        "CSS/ima1.jpg",
        "CSS/ima2.jpg",
        "CSS/ima3.jpg",
        "CSS/ima4.jpg"
    ];
    let currentIndex = 0;

    function rotateImage() {
        currentIndex = (currentIndex + 1) % images.length;
        document.getElementById("carousel-image").src = images[currentIndex];
    }

    // Cambiar imagen cada 3 segundos (3000 ms)
    setInterval(rotateImage, 3000);
</script>

    <script>
        window.onclick = function(event) {
            const modal = document.getElementById('loginModal');
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Quitar alerta después de unos segundos
        setTimeout(() => {
            const alert = document.querySelector('.logout-alert');
            if (alert) {
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500);
            }
        }, 3000);
    </script>

    <script>
  window.addEventListener('beforeunload', function (e) {
    // Enviar petición síncrona para cerrar sesión al cerrar o recargar
    navigator.sendBeacon('logout.php');
    // Nota: sendBeacon es mejor que AJAX síncrono, evita retrasos en unload
  });
</script>


</body>
</html>
