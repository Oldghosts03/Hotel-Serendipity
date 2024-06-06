<?php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <title>Cerrar Sesión</title>
</head>

<body>
    <div class="contenedor">
      <div class="box form-box">
        <header>Cerrar Sesión</header>
        <p>Haz cerrado sesión exitosamente.</p>
        <br>
        <a href="index.php">Volver al inicio</a>
      </div>
    </div>
</body>
</html>