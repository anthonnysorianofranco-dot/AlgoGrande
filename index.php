<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica del documento -->
    <meta charset="UTF-8">

    <!-- Hace que la página sea responsive (se adapte a móviles) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título que aparece en la pestaña del navegador -->
    <title>Gruppy</title>

    <!-- Enlace al archivo CSS donde están los estilos -->
    <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>

    <!-- ========================= -->
    <!-- LOGIN -->
    <!-- ========================= -->
    <!-- Contenedor del formulario de inicio de sesión -->
    <div class="Log_in" id="Log_in">

        <!-- Formulario que envía los datos al archivo login.php -->
        <form action="auth/login.php" method="POST">

            <!-- Título del formulario -->
            <label>Log in</label>

            <!-- Input para el nombre de usuario -->
            <input 
                type="text" 
                name="nombre_usuario_login" 
                placeholder="Nombre de Usuario" 
                required
            >

            <!-- Input para la contraseña -->
            <input 
                type="password" 
                name="contrasena_login" 
                placeholder="Contraseña" 
                required
            >

            <!-- Botón para enviar el formulario -->
            <input 
                type="submit" 
                name="submit_login" 
                value="Log in"
            >

            <!-- Enlace para ir al formulario de registro -->
            <p>
                Si no tienes cuenta, 
                <a href="#Sign_up">Sign up</a>
            </p>

        </form>
    </div>

    <!-- ========================= -->
    <!-- SIGN UP -->
    <!-- ========================= -->
    <!-- Contenedor del formulario de registro -->
    <div class="Sign_up" id="Sign_up">

        <!-- Formulario que envía los datos a register.php -->
        <form action="auth/register.php" method="POST">

            <!-- Título del formulario -->
            <label>Sign up</label>

            <!-- Input nombre completo -->
            <input 
                type="text" 
                name="nombre_completo_sign_up" 
                placeholder="Nombre Completo" 
                required
            >

            <!-- Input correo -->
            <input 
                type="email" 
                name="email_sign_up" 
                placeholder="Correo" 
                required
            >

            <!-- Input nombre de usuario -->
            <input 
                type="text" 
                name="nombre_usuario_sign_up" 
                placeholder="Nombre de Usuario" 
                required
            >

            <!-- Input contraseña -->
            <input 
                type="password" 
                name="contrasena_sign_up" 
                placeholder="Contraseña" 
                required
            >

            <!-- Botón para registrar -->
            <input 
                type="submit" 
                name="submit_sign_up" 
                value="Sign up"
            >

            <!-- Enlace para volver al login -->
            <p>
                Si ya tienes cuenta, 
                <a href="#Log_in">Log in</a>
            </p>

        </form>
    </div>

    <!-- ========================= -->
    <!-- JAVASCRIPT -->
    <!-- ========================= -->
    <!-- Archivo JS donde puedes manejar interacciones -->
    <script src="public/js/app.js"></script>

</body>
</html>