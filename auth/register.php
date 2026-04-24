<?php

// =========================
// CONEXIÓN A BASE DE DATOS
// =========================
// Incluye el archivo donde está la conexión MySQL
include "../config/database.php";

// =========================
// VERIFICAR ENVÍO DEL FORMULARIO
// =========================
// Solo ejecuta el código si se presionó "Sign up"
if(isset($_POST["submit_sign_up"])){

    // =========================
    // OBTENER DATOS DEL FORMULARIO
    // =========================
    $Nombre = trim($_POST["nombre_completo_sign_up"]);
    $Email = trim($_POST["email_sign_up"]);
    $Nombre_usuario = trim($_POST["nombre_usuario_sign_up"]);
    $Contrasena = trim($_POST["contrasena_sign_up"]);

    // =========================
    // VALIDACIÓN DE CAMPOS VACÍOS
    // =========================
    if (empty($Nombre) || empty($Email) || empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit();
    }

    // =========================
    // VALIDAR EMAIL EXISTENTE
    // =========================
    $sqlEmail = "SELECT id_usuario FROM usuario WHERE email = ?";
    $stmtEmail = $conn->prepare($sqlEmail);

    // Asigna el email a la consulta
    $stmtEmail->bind_param("s", $Email);

    // Ejecuta la consulta
    $stmtEmail->execute();

    // Guarda el resultado para contar filas
    $stmtEmail->store_result();

    // Si existe el email
    if ($stmtEmail->num_rows > 0) {
        echo "Ese email ya tiene una cuenta";
        exit();
    }
    $stmtEmail->close();

    // =========================
    // VALIDAR USUARIO EXISTENTE
    // =========================
    $sqlUserName = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ?";
    $stmtUserName = $conn->prepare($sqlUserName);

    // Asigna el nombre de usuario
    $stmtUserName->bind_param("s", $Nombre_usuario);

    // Ejecuta consulta
    $stmtUserName->execute();

    // Guarda resultado
    $stmtUserName->store_result();

    // Si el usuario ya existe
    if ($stmtUserName->num_rows > 0) {
        echo "Ese usuario ya existe";
        exit();
    }
    $stmtUserName->close();

    // =========================
    // ENCRIPTAR CONTRASEÑA
    // =========================
    // Convierte la contraseña en hash seguro
    $ContrasenaHash = password_hash($Contrasena, PASSWORD_DEFAULT);

    // =========================
    // INSERTAR USUARIO EN BD
    // =========================
    $sql = "INSERT INTO usuario (nombre, email, nombre_usuario, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Asigna valores a la consulta
    $stmt->bind_param("ssss", $Nombre, $Email, $Nombre_usuario, $ContrasenaHash);

    // Ejecuta inserción
    if ($stmt->execute()) {

        // Si todo sale bien, vuelve al login
        header("Location: ../index.php");
        exit();

    } else {
        // Si hay error en la BD
        echo "Error: " . $stmt->error;
    }

    // =========================
    // CERRAR CONEXIONES
    // =========================
    $stmt->close();
    $conn->close();
}
?>