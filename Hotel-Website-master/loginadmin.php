<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Administrador</title>
</head>
<body>
    <div class="contenedor">
        <div class="box form-box">
            <header>Administrador</header>

            <?php
                if (isset($_POST['login'])) {
                    $user = $_POST['user'];
                    $password = $_POST['password'];

                    // Verificar credenciales de administrador
                    if ($user == 'admin' && $password == 'admin') {
                        $_SESSION['user'] = $user;
                        echo "<p>Inicio de sesión exitoso. Bienvenido, administrador.</p>";
                        // Redirigir a la página de administración
                        header("Location: admin_dashboard.php");
                        exit();
                    } else {
                        echo "<p>Usuario o contraseña incorrectos.</p>";
                    }
                }
            ?>

            <form action="" method="post">
                <div class="field input">
                    <label for="user">Usuario</label>
                    <input type="text" id="user" name="user" required>
                </div>

                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="login" value="Iniciar Sesión">
                </div>
            </form>
        </div>
    </div>
</body>
</html>