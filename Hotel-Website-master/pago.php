<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Pago</title>
    <link rel="stylesheet" href="css/pago.css">
</head>
<body>
    <div class="container">
        <h1>Detalles de Pago</h1>
        <!-- Formulario de PayPal -->
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" target="_top">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="sb-m43tqh31071564@business.example.com">
            <input type="hidden" name="item_name" value="Reserva de Hotel">
            <input type="hidden" name="amount" value="240.00">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="return" value="pago.php">
            <input type="hidden" name="cancel_return" value="index.php">
            <input type="submit" class="btn" value="Pagar con PayPal">
        </form>

        <a href="fpdf/PruebaV.php" class="btn"><i class="fas fa-file-pdf"></i>Generar tiket</a>
        
    </div>
</body>
</html>