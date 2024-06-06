<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Habitación</title>
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
    </style>
</head>
<body>
    <div class="contenedor">
        <div class="box">
            <?php
            // Verificar si se ha proporcionado un ID válido
            if(isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
                echo "Editando habitación con ID: " . $id;
            ?>
                
                <form action="actualizar.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <label for="tipo">Tipo:</label>
                    <input type="text" id="tipo" name="tipo" placeholder="Tipo de habitación"><br>
                    <label for="precio">Precio:</label>
                    <input type="text" id="precio" name="precio" placeholder="Precio"><br>
                    <label for="disponible">Disponible:</label>
                    <input type="text" id="disponible" name="disponible" placeholder="Disponible"><br>
                    <button type="submit">Guardar cambios</button>
                </form>

            <?php
            } else {
                echo "ID de habitación inválido";
            }
            ?>
        </div>
    </div>
</body>
</html>