<?php
// Inicia la sesión para poder acceder a las variables de sesión
session_start();

// Verifica si el usuario NO ha iniciado sesión
if (!isset($_SESSION["user_id"])) {
    // Si no hay sesión activa, redirige al usuario al login (index.php)
    header("Location: index.php");
    exit(); // Detiene la ejecución del script
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Permite que la página sea responsive (adaptable a móviles) -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRUPPY</title>
</head>
<body>

    <!-- Formulario para cerrar sesión -->
    <!-- Envía una petición POST al archivo DELETE.php -->
    <form action="DELETE.php" method="POST">
        <!-- Botón que activa el cierre de sesión -->
        <button type="submit" name="log_out">Log out</button>
    </form>

    <!-- Título principal de la página -->
    <h1>GRUPPY</h1>

</body>
</html>