<?php

require('./fpdf.php');

class PDF extends FPDF
{
    // Propiedades para los detalles del cliente y la habitación
    public $nombre;
    public $id_reserva;
    public $fecha_reserva;
    public $fecha_estancia;
    public $num_habitacion;
    public $tipo_habitacion;
    public $num_huespedes;
    public $precio_habitacion;
    public $num_noches;
    public $total;

    // Método para establecer los detalles del cliente y la habitación
    public function setDetalles($nombre, $id_reserva, $fecha_reserva, $fecha_estancia, $num_habitacion, $tipo_habitacion, $num_huespedes, $precio_habitacion, $num_noches, $total)
    {
        $this->nombre = $nombre;
        $this->id_reserva = $id_reserva;
        $this->fecha_reserva = $fecha_reserva;
        $this->fecha_estancia = $fecha_estancia;
        $this->num_habitacion = $num_habitacion;
        $this->tipo_habitacion = $tipo_habitacion;
        $this->num_huespedes = $num_huespedes;
        $this->precio_habitacion = $precio_habitacion;
        $this->num_noches = $num_noches;
        $this->total = $total;
    }

    // Cabecera de página
    function Header()
    {
        // Logo de la empresa
        $this->Image('logo.png', 15, 5, 30); // (archivo, x, y, ancho)
        $this->Ln(10);

        // Información del hotel
        $this->SetFont('Helvetica', '', 10);
        $this->Cell(120);
        $this->Cell(96, 10, utf8_decode("Hotel Serendipity CA. de CV"), 0, 0, '', 0);
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(96, 10, utf8_decode("Ubicación: Av Abasolo 901, 27000 Torreón"), 0, 0, '', 0);
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(59, 10, utf8_decode("Teléfono: 871-139-0136"), 0, 0, '', 0);
        $this->Ln(5);
        $this->Cell(120);
        $this->Cell(85, 10, utf8_decode("Correo: alu.21131365@correo.itlalaguna.edu.mx"), 0, 0, '', 0);
        $this->Ln(15);

        // Detalles del cliente
        $this->SetFont('Helvetica', 'B', 10);
        $this->Cell(85, 10, utf8_decode("Nombre del Huésped: ") . $this->nombre, 0, 1);
        $this->Cell(85, 10, utf8_decode("ID de la Reserva: ") . $this->id_reserva, 0, 1);
        $this->Cell(85, 10, utf8_decode("Fecha de la Reserva: ") . $this->fecha_reserva, 0, 1);
        $this->Cell(85, 10, utf8_decode("Fecha de Estancia: ") . $this->fecha_estancia, 0, 1);
        $this->Ln(15);

        // Título de la tabla
        $this->SetTextColor(0, 0, 0);
        $this->Cell(50);
        $this->SetFont('Helvetica', 'B', 15);
        $this->Cell(100, 10, utf8_decode("DETALLES DE HABITACION"), 0, 1, 'C', 0);
        $this->Ln(10);

        // Encabezados de la tabla
        $this->SetFillColor(225, 173, 130);
        $this->SetTextColor(255, 255, 255);
        $this->SetDrawColor(163, 163, 163);
        $this->SetFont('Helvetica', 'B', 11);
        $this->Cell(20, 10, utf8_decode('NO.'), 1, 0, 'C', 1);
        $this->Cell(53, 10, utf8_decode('TIPO'), 1, 0, 'C', 1);
        $this->Cell(35, 10, utf8_decode('NO. HUÉSPEDES'), 1, 0, 'C', 1);
        $this->Cell(36, 10, utf8_decode('PRECIO P/NOCHE'), 1, 0, 'C', 1);
        $this->Cell(28, 10, utf8_decode('NO. NOCHES'), 1, 0, 'C', 1);
        $this->Cell(25, 10, utf8_decode('TOTAL'), 1, 1, 'C', 1);
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');

        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $hoy = date('d/m/Y');
        $this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 12);
$pdf->SetDrawColor(163, 163, 163);

date_default_timezone_set('America/Mexico_City'); // Establece la zona horaria

// Conexión a la base de datos
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "formulario";

$conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos);

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Consulta SQL para obtener el último cliente registrado y los detalles de su habitación
$query = "SELECT r.*, h.tipo, h.precio, DATEDIFF(r.arrival_fecha, r.departure_fecha) AS num_noches 
          FROM reservations r 
          JOIN habitaciones h ON r.id_cuarto = h.id 
          ORDER BY r.id DESC 
          LIMIT 1";
$resultado = mysqli_query($conexion, $query);

if ($resultado && mysqli_num_rows($resultado) > 0) {
    $reservation = mysqli_fetch_assoc($resultado);
    $nombre = $reservation['nombre'] . ' ' . $reservation['apellido'];
    $id_reserva = $reservation['id'];
    $fecha_reserva = $reservation['reservation_date'];
    $fecha_estancia = $reservation['arrival_fecha'] . ' - ' . $reservation['departure_fecha'];
    $num_habitacion = $reservation['id_cuarto'];
    $tipo_habitacion = $reservation['tipo'];
    $num_huespedes = $reservation['huespedes'];
    $precio_habitacion = $reservation['precio'];
    $num_noches = $reservation['num_noches'];
    $total = $precio_habitacion * $num_noches;
} else {
    $nombre = "No se encontró información del cliente.";
    $id_reserva = "";
    $fecha_reserva = "";
    $fecha_estancia = "";
    $num_habitacion = "";
    $tipo_habitacion = "";
    $num_huespedes = "";
    $precio_habitacion = "";
    $num_noches = 0;
    $total = 0;
}

$pdf->setDetalles($nombre, $id_reserva, $fecha_reserva, $fecha_estancia, $num_habitacion, $tipo_habitacion, $num_huespedes, $precio_habitacion, $num_noches, $total);
$pdf->AddPage();

$pdf->Cell(20, 10, $pdf->num_habitacion, 1, 0, 'C', 0);
$pdf->Cell(53, 10, $pdf->tipo_habitacion, 1, 0, 'C', 0);
$pdf->Cell(35, 10, $pdf->num_huespedes, 1, 0, 'C', 0);
$pdf->Cell(36, 10, $pdf->precio_habitacion.' USD', 1, 0, 'C', 0);
$pdf->Cell(28, 10, $pdf->num_noches, 1, 0, 'C', 0);
$pdf->Cell(25, 10, $pdf->total.' USD', 1, 1, 'C', 0);

mysqli_close($conexion);

$pdf->Output('Tiket_de_Reserva.pdf', 'I');
?>