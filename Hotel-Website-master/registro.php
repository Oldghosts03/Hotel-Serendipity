<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Registro</title>
</head>
<body>
    <div class="contenedor">
        <div class="box form-box">

            <?php
                
                include("php/config.php");

                if(isset($_POST['signup'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    //Verificar el email unico
                    $verify_query = mysqli_query($con, "SELECT email FROM usuarios WHERE email='$email'");

                    if(mysqli_num_rows($verify_query) !=0 )
                    {
                        echo "<div class = 'message'>
                                <p>Este email ya está en uso, intenta con uno diferente</p>
                             </div> <br>";
                        echo "<a href='javascript:self.history.back()'><button class='btn'>Atrás</button>";
                    }

                    else{
                        mysqli_query($con, "INSERT INTO usuarios(username, email, password) VALUES ('$username', '$email', '$password')") or die("Ocurrió un error");

                        echo "<div class = 'message'>
                                <p>Registo con éxito</p>
                             </div> <br>";
                        echo "<a href='login.php'><button class='btn'>Inicia Sesión</button>";
                    }
                }

                else{
             ?>   
            <header>Registro - Cliente</header>
            <form action="" method="post">

                <div class="field input">
                    <label for="username">Usuario</label>
                    <input type="text" id="username" name="username" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>

                <div class="field input">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="signup" value="Registrarse" required>
                </div>

                <!-- Sección para registrarse -->
                <div class="links">
                    <p>¿Ya tienes cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
                </div>
            </form>
        </div>
        
        <?php } ?>

    </div>
</body>
</html>