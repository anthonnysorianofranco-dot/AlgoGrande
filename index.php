<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Define el tipo de documento HTML5 -->
    <meta charset="UTF-8">

    <!-- Hace la página responsive en móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título que aparece en la pestaña del navegador -->
    <title>Gruppy</title>

    <!-- Enlace al archivo CSS principal del proyecto -->
    <link rel="stylesheet" href="public/css/styles.css">
</head>

<body>

    <!-- ========================= -->
    <!-- SECCIÓN DE LOGIN -->
    <!-- ========================= -->
    <div class="Log_in" id="Log_in">

        <!-- Formulario que envía datos al backend (login.php) -->
        <form action="auth/login.php" method="POST">

            <!-- Título del formulario -->
            <label>Log in</label>

            <!-- Input para nombre de usuario -->
            <input type="text" name="nombre_usuario_login" placeholder="Nombre de Usuario" required>

            <!-- Input para contraseña -->
            <input type="password" name="contrasena_login" placeholder="Contraseña" required>

            <!-- Botón de envío del formulario -->
            <input type="submit" name="submit_login" value="Log in">

            <!-- Enlace para ir al registro -->
            <p>Si no tienes cuenta, <a href="#Sign_up">Sign up</a></p>
        </form>
    </div>

    <!-- ========================= -->
    <!-- SECCIÓN DE REGISTRO -->
    <!-- ========================= -->
    <div class="Sign_up" id="Sign_up">

        <!-- Formulario de registro -->
        <form action="auth/register.php" method="POST">

            <!-- Título del formulario -->
            <label>Sign up</label>

            <!-- Nombre completo -->
            <input type="text" name="nombre_completo_sign_up" placeholder="Nombre Completo" required>

            <!-- Correo electrónico -->
            <input type="email" name="email_sign_up" placeholder="Correo" required>

            <!-- Nombre de usuario -->
            <input type="text" name="nombre_usuario_sign_up" placeholder="Nombre de Usuario" required>

            <!-- Contraseña -->
            <input type="text" name="contrasena_sign_up" placeholder="Contraseña" required>

            <!-- Botón de registro -->
            <input type="submit" name="submit_sign_up" value="Sign up">

            <!-- Enlace para volver al login -->
            <p>Si ya tienes cuenta, <a href="#Log_in">Log in</a></p>
        </form>
    </div>

    <!-- ========================= -->
    <!-- ARCHIVO JAVASCRIPT -->
    <!-- ========================= -->
    <!-- Controla la lógica del frontend (interacciones, eventos, etc.) -->
    <script src="public/js/app.js"></script>

</body>
</html>