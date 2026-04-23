<?php
// Incluye la conexión a la base de datos
include "connection.php";

// Inicia la sesión para poder usar $_SESSION
session_start();

// Verifica si se presionó el botón de login
if(isset($_POST["submit_login"])){

    // Obtiene y limpia los datos del formulario
    $Nombre_usuario = trim($_POST["nombre_usuario_login"]);
    $Contrasena = trim($_POST["contrasena_login"]);

    // Valida que los campos no estén vacíos
    if (empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit(); // Detiene la ejecución si hay error
    }

    // Consulta SQL para buscar el usuario en la base de datos
    $sql = "SELECT id_usuario, contrasena FROM usuario WHERE nombre_usuario = ?";
    
    // Prepara la consulta para evitar inyección SQL
    $stmt = $conn->prepare($sql);

    // Verifica si hubo error al preparar la consulta
    if (!$stmt) {
        die("Error prepare: " . $conn->error);
    }

    // Asocia el parámetro (nombre de usuario) a la consulta
    $stmt->bind_param("s", $Nombre_usuario);

    // Ejecuta la consulta
    $stmt->execute();

    // Vincula los resultados a variables PHP
    $stmt->bind_result($id_usuario, $passwordHash);

    // Si no encuentra el usuario en la base de datos
    if (!$stmt->fetch()) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    // Verifica si la contraseña en la BD es NULL (error inesperado)
    if ($passwordHash === null) {
        echo "Error: contraseña NULL en BD";
        exit();
    }

    // Verifica la contraseña ingresada con el hash almacenado
    if (!password_verify($Contrasena, $passwordHash)) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    // Guarda el ID del usuario en la sesión (usuario autenticado)
    $_SESSION["user_id"] = $id_usuario;

    // Cierra la consulta y la conexión a la base de datos
    $stmt->close();
    $conn->close();

    // Redirige al usuario a la página principal
    header("Location: main.php");
    exit();
}
?>