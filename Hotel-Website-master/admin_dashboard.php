<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Tabla de Habitaciones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 6px 10px;
            font-size: 14px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }
        .btn-editar {
            background-color: #4CAF50;
            color: white;
        }
        .btn-eliminar {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>

<?php
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

// Función para editar habitación
function editarHabitacion($id) {
    // Aquí podrías redirigir a otra página con un formulario prellenado para editar la habitación
    // Por simplicidad, solo retornamos el ID en este ejemplo
    return $id;
}

// Función para eliminar habitación
function eliminarHabitacion($conn, $id) {
    // Consulta SQL para eliminar la habitación con el ID proporcionado
    $sql = "DELETE FROM habitaciones WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
}

// Consulta SQL para obtener los datos de la tabla "habitaciones"
$sql = "SELECT id, tipo, precio, Disponible FROM habitaciones";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Imprimir los datos en una tabla
    echo "<div class='contenedor'>";
    echo "<div class='box'>";
    echo "<header>Tabla de Habitaciones</header>";
    echo "<table>";
    echo "<tr><th>ID</th><th>Tipo</th><th>Precio</th><th>Disponible</th><th>Acciones</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>".$row["id"]."</td>";
        echo "<td>".$row["tipo"]."</td>";
        echo "<td>".$row["precio"]."</td>";
        echo "<td>".$row["Disponible"]."</td>";
        echo "<td>";
        echo "<button class='btn btn-editar' onclick='editarHabitacion(".$row["id"].")'>Editar</button>";
        echo "<button class='btn btn-eliminar' onclick='eliminarHabitacion(".$row["id"].")'>Eliminar</button>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo    "<a href='agregar.php'><button class='btn btn-agregar'>Agregar Nueva Habitación</button></a>";
    echo "<a href='logout.php'><button class='btn btn-logout'>Cerrar Sesión</button></a>";
    echo "</div>";
    echo "</div>";


} else {
    echo "No se encontraron resultados";
}
$conn->close();
?>

<!-- Scripts para editar y eliminar habitaciones -->
<script>
    function editarHabitacion(id) {
        // Aquí puedes implementar la lógica para editar una habitación con el ID proporcionado
        // Por ejemplo, podrías redirigir a otra página con un formulario prellenado para editar la habitación
        window.location.href = 'editar.php?id=' + id;
    }

    function eliminarHabitacion(id) {
        // Confirmar la eliminación
        if (confirm('¿Estás seguro de que deseas eliminar esta habitación?')) {
            // Llamar a PHP para eliminar la habitación
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Recargar la página después de eliminar
                    window.location.reload();
                }
            };
            xmlhttp.open('GET', 'eliminar.php?id=' + id, true);
            xmlhttp.send();
        }
    }
</script>

</body>
</html>