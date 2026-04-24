<?php
#index.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gruppy</title>
</head>
<body>
    <div class="Log_in" id="Log_in">
        <form action="auth/login.php" method="POST">
            <label>Log in</label>

            <input type="text" name="nombre_usuario_login" placeholder="Nombre de Usuario" required>
            <input type="password" name="contrasena_login" placeholder="Contraseña" required>
            <input type="submit" name="submit_login" value="Log in">
            <p>Si no tienes cuenta, <a href="#Sign_up">Sign up</a></p>
        </form>
    </div>

    <div class="Sign_up" id="Sign_up">
        <form action="auth/register.php" method="POST">
            <label>Sign up</label>

            <input type="text" name="nombre_completo_sign_up" placeholder="Nombre Completo" required>
            <input type="email" name="email_sign_up" placeholder="Correo" required>
            <input type="text" name="nombre_usuario_sign_up" placeholder="Nombre de Usuario" required>
            <input type="text" name="contrasena_sign_up" placeholder="Contraseña" required>
            <input type="submit" name="submit_sign_up" value="Sign up">
            <p>Si ya tienes cuenta, <a href="#Log_in">Log in</a></p>
        </form>
    </div>
</body>
</html>