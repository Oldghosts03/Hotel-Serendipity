<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "formulario";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
   
    // Verificar conexión
    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $arrival_fecha = $_POST['arrival_fecha'];
        $departure_fecha = $_POST['departure_fecha'];
        $huespedes = $_POST['huespedes'];
        $tipo_cuarto = $_POST['tipo_cuarto'];
        $cuarto1 = range(1, 5);
        $cuarto2 = range(6, 10);
        $cuarto3 = range(11, 15);
        shuffle($cuarto1);
        shuffle($cuarto2);
        shuffle($cuarto3);

        function obtenerNumeroAleatorio(&$numeros) {
            if (empty($numeros)) {
                return null; // Todos los números ya han sido utilizados
            }
            return array_shift($numeros); // Obtener y eliminar el primer elemento del array
        }

        $disponible = false;

        while (!$disponible) {
            if ($tipo_cuarto == "Cuarto Superior") {
                $cuarto = obtenerNumeroAleatorio($cuarto1);
                if ($cuarto === null) {
                    echo "No hay habitaciones disponibles en Cuarto Superior";
                    break;
                }
                $sqlcuarto1 = "SELECT disponible FROM habitaciones WHERE id = '$cuarto'";
                $result = $conn->query($sqlcuarto1);
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['disponible'] == 1) {
                        $sql = "INSERT INTO reservations (nombre, apellido, email, arrival_fecha, departure_fecha, huespedes, tipo_cuarto, id_cuarto)
                                VALUES ('$nombre', '$apellido', '$email', '$arrival_fecha', '$departure_fecha', '$huespedes', '$tipo_cuarto', '$cuarto')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Cliente registrado exitosamente";
                            $disponible = true;
                            $conn->query("UPDATE habitaciones SET disponible = 0 WHERE id = '$cuarto'");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }

            if ($tipo_cuarto == "Cuarto Inferior" && !$disponible) {
                $cuarto = obtenerNumeroAleatorio($cuarto2);
                if ($cuarto === null) {
                    echo "No hay habitaciones disponibles en Cuarto Inferior";
                    break;
                }
                $sqlcuarto2 = "SELECT disponible FROM habitaciones WHERE id = '$cuarto'";
                $result = $conn->query($sqlcuarto2);
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['disponible'] == 1) {
                        $sql = "INSERT INTO reservations (nombre, apellido, email, arrival_fecha, departure_fecha, huespedes, tipo_cuarto, id_cuarto)
                                VALUES ('$nombre', '$apellido', '$email', '$arrival_fecha', '$departure_fecha', '$huespedes', '$tipo_cuarto', '$cuarto')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Cliente registrado exitosamente";
                            $disponible = true;
                            $conn->query("UPDATE habitaciones SET disponible = 0 WHERE id = '$cuarto'");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }

            if ($tipo_cuarto == "Cuarto Máximo" && !$disponible) {
                $cuarto = obtenerNumeroAleatorio($cuarto3);
                if ($cuarto === null) {
                    echo "No hay habitaciones disponibles en Cuarto Máximo";
                    break;
                }
                $sqlcuarto3 = "SELECT disponible FROM habitaciones WHERE id = '$cuarto'";
                $result = $conn->query($sqlcuarto3);
                if ($result && $result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    if ($row['disponible'] == 1) {
                        $sql = "INSERT INTO reservations (nombre, apellido, email, arrival_fecha, departure_fecha, huespedes, tipo_cuarto, id_cuarto)
                                VALUES ('$nombre', '$apellido', '$email', '$arrival_fecha', '$departure_fecha', '$huespedes', '$tipo_cuarto', '$cuarto')";
                        if ($conn->query($sql) === TRUE) {
                            echo "Cliente registrado exitosamente";
                            $disponible = true;
                            $conn->query("UPDATE habitaciones SET disponible = 0 WHERE id = '$cuarto'");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }
                    }
                }
            }
        }

        $conn->close();
    }
?>