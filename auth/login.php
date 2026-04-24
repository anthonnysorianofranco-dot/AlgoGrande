<?php
// Incluye la conexión a la base de datos
include "../config/database.php";

// Inicia la sesión para poder guardar datos del usuario logueado
session_start();

// Verifica si se envió el formulario de login
if(isset($_POST["submit_login"])){

    // =========================
    // OBTENER DATOS DEL FORMULARIO
    // =========================
    // Se limpia el nombre de usuario (quita espacios)
    $Nombre_usuario = trim($_POST["nombre_usuario_login"]);

    // Se limpia la contraseña ingresada
    $Contrasena = trim($_POST["contrasena_login"]);

    // =========================
    // VALIDACIÓN BÁSICA
    // =========================
    // Verifica que no estén vacíos los campos
    if (empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit();
    }

    // =========================
    // CONSULTA A LA BASE DE DATOS
    // =========================
    // Busca el usuario por nombre de usuario
    $sql = "SELECT id_usuario, contrasena FROM usuario WHERE nombre_usuario = ?";

    // Prepara la consulta (seguridad contra SQL Injection)
    $stmt = $conn->prepare($sql);

    // Si hay error en la preparación
    if (!$stmt) {
        die("Error prepare: " . $conn->error);
    }

    // Asigna el parámetro (nombre de usuario)
    $stmt->bind_param("s", $Nombre_usuario);

    // Ejecuta la consulta
    $stmt->execute();

    // Guarda los resultados en variables
    $stmt->bind_result($id_usuario, $passwordHash);

    // Intenta obtener el usuario
    if (!$stmt->fetch()) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    // =========================
    // VALIDACIÓN DE CONTRASEÑA
    // =========================
    // Verifica que la contraseña no sea NULL
    if ($passwordHash === null) {
        echo "Error: contraseña NULL en BD";
        exit();
    }

    // Compara contraseña ingresada con la hasheada en la BD
    if (!password_verify($Contrasena, $passwordHash)) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    // =========================
    // LOGIN EXITOSO
    // =========================
    // Guarda el ID del usuario en la sesión
    $_SESSION["user_id"] = $id_usuario;

    // Cierra recursos
    $stmt->close();
    $conn->close();

    // Redirige al panel principal
    header("Location: ../pages/main.php");
    exit();
}
?>