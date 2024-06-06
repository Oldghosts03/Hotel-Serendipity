<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Habitación</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

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

        form {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
        }

        form label {
            margin-bottom: 8px;
            font-weight: bold;
        }

        form input[type="text"] {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }

        form button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        form button[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-top: 10px;
        }

        .return-button {
            margin-top: 20px;
            text-align: center;
        }

        .return-button a {
            text-decoration: none;
            background-color: #3498db;
            color: black;
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
    <div class="contenedor">
        <div class="box">
            <?php
            // Verificar si se han enviado los datos del formulario
            if($_SERVER["REQUEST_METHOD"] == "POST") {
                // Verificar si se han proporcionado los datos necesarios
                if(isset($_POST['id']) && isset($_POST['tipo']) && isset($_POST['precio']) && isset($_POST['disponible'])) {
                    // Obtener los datos del formulario
                    $id = $_POST['id'];
                    $tipo = $_POST['tipo'];
                    $precio = $_POST['precio'];
                    $disponible = $_POST['disponible'];

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

                    // Consulta SQL para actualizar los datos de la habitación
                    $sql = "UPDATE habitaciones SET tipo='$tipo', precio='$precio', Disponible='$disponible' WHERE id=$id";

                    if ($conn->query($sql) === TRUE) {
                        echo "Datos de la habitación actualizados correctamente";
                    } else {
                        echo "Error al actualizar los datos de la habitación: " . $conn->error;
                    }

                    $conn->close();
                } else {
                    echo "No se proporcionaron todos los datos necesarios";
                }
            } else {
                echo "Acceso no permitido";
            }
            ?>
            <div class="return-button">
                <a href="admin_dashboard.php">Regresar a Admin Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>