<?php
// Verificar si se ha proporcionado un ID válido
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
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

    // Obtener el ID de la habitación desde la URL
    $id = $_GET['id'];

    // Consulta SQL para eliminar la habitación con el ID proporcionado
    $sql = "DELETE FROM habitaciones WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "Habitación eliminada exitosamente";
    } else {
        echo "Error al eliminar la habitación: " . $conn->error;
    }

    $conn->close();
} else {
    echo "ID de habitación inválido";
}
?>