<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Guardar Habitación</title>
    <style>
        /* Tus estilos CSS aquí */
        body {
            background: #e4e9f7;
        }

        .contenedor {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 90vh;
        }

        .box {
            background: #fdfdfd;
            display: flex;
            flex-direction: column;
            padding: 25px 25px;
            border-radius: 20px;
            box-shadow: 0 0 128px 0 rgba(0, 0, 0, 0.1),
                        0 32px 64px -48px rgba(0, 0, 0, 0.5);
        }

        header {
            font-size: 25px;
            font-weight: 600;
            padding-bottom: 10px;
            border-bottom: 1px solid #e6e6e6;
            margin-bottom: 10px;
        }

        .message {
            text-align: center;
            background: #f9eded;
            padding: 15px 0px;
            border: 1px solid #699053;
            border-radius: 5px;
            margin-bottom: 10px;
            color: red;
        }

        .return-button {
            text-align: center;
            margin-top: 20px;
        }

        .return-button a {
            text-decoration: none;
            background-color: #3498db;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .return-button a:hover {
            background-color: #2980b9;
        }
    </style>
</head>
<body>

<?php
// Verificar si se han enviado los datos del formulario
if($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Chequear la conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener los datos del formulario
    $tipo = $_POST['tipo'];
    $precio = $_POST['precio'];
    $disponible = $_POST['disponible'];

    // Consulta SQL para insertar una nueva habitación en la tabla "habitaciones"
    $sql = "INSERT INTO habitaciones (tipo, precio, Disponible) VALUES ('$tipo', '$precio', '$disponible')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='contenedor'>";
        echo "<div class='box'>";
        echo "<header>Nueva Habitación Agregada</header>";
        echo "<p>La nueva habitación se ha agregado correctamente.</p>";
        echo "<div class='return-button'>";
        echo "<a href='admin_dashboard.php'>Regresar al Admin Dashboard</a>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<div class='message'>Error al agregar la habitación: " . $conn->error . "</div>";
    }

    $conn->close();
} else {
    // Si no se ha enviado el formulario correctamente, mostrar un mensaje de error
    echo "<div class='message'>Error: No se han recibido datos del formulario</div>";
}
?>

</body>
</html>
