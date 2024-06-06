<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Inicio Sesión</title>
</head>
<body>
    <div class="contenedor">
        <div class="box form-box">

            <?php

                include("config.php");

                if(isset($_POST['login']))
                {
                    $email = mysqli_real_escape_string($con,$_POST['email']);
                    $password = mysqli_real_escape_string($con,$_POST['password']);

                    $resul = mysqli_query($con, "SELECT * FROM usuarios WHERE email='$email' AND password = '$password'") or die("Select Error");
                    $row = mysqli_fetch_assoc($resul);

                    if(is_array($row) && !empty($row))
                    {
                        $_SESSION['valid'] = $row['email'];
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['id'] = $row['id'];
                    }

                    else{
                        echo "<div class = 'message'>
                                <p>Usuario o Contraseña Incorrectos</p>
                              </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Atrás</button>";
                    }

                    if(isset($_SESSION['valid'])){
                        header("Location: index.php");
                    }
                }

                else{
            ?>
            <header>Inicio Sesión</header>
            <form action="" method="post">
                
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="login" value="Iniciar Sesión como Cliente">
                </div>

                <!-- Sección para registrarse -->
                <div class="links">
                    <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
                </div>

            </form>

        </div>

        <?php }?>
    </div>
</body>
</html>