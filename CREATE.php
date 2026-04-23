<?php
// Incluye la conexión a la base de datos
include "connection.php";

// Verifica si se envió el formulario de registro
if(isset($_POST["submit_sign_up"])){

    // Obtiene y limpia los datos del formulario
    $Nombre = trim($_POST["nombre_completo_sign_up"]);
    $Email = trim($_POST["email_sign_up"]);
    $Nombre_usuario = trim($_POST["nombre_usuario_sign_up"]);
    $Contrasena = trim($_POST["contrasena_sign_up"]);

    // Valida que ningún campo esté vacío
    if (empty($Nombre) || empty($Email) || empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit(); // Detiene la ejecución si hay error
    }

    // =========================
    // VALIDAR EMAIL DUPLICADO
    // =========================

    // Consulta para verificar si el email ya existe
    $sqlEmail = "SELECT id_usuario FROM usuario WHERE email = ?";
    $stmtEmail = $conn->prepare($sqlEmail);

    // Asocia el email a la consulta
    $stmtEmail->bind_param("s", $Email);
    $stmtEmail->execute();

    // Guarda el resultado para poder contar filas
    $stmtEmail->store_result();

    // Si ya existe un usuario con ese email
    if ($stmtEmail->num_rows > 0) {
        echo "Ese email ya tiene una cuenta";
        exit();
    }

    // Cierra el statement
    $stmtEmail->close();

    // =========================
    // VALIDAR USUARIO DUPLICADO
    // =========================

    // Consulta para verificar si el nombre de usuario ya existe
    $sqlUserName = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ?";
    $stmtUserName = $conn->prepare($sqlUserName);

    // Asocia el nombre de usuario
    $stmtUserName->bind_param("s", $Nombre_usuario);
    $stmtUserName->execute();

    // Guarda resultado
    $stmtUserName->store_result();

    // Si ya existe ese usuario
    if ($stmtUserName->num_rows > 0) {
        echo "Ese usuario ya existe";
        exit();
    }

    // Cierra el statement
    $stmtUserName->close();

    // =========================
    // ENCRIPTAR CONTRASEÑA
    // =========================

    // Genera un hash seguro de la contraseña
    $ContrasenaHash = password_hash($Contrasena, PASSWORD_DEFAULT);

    // =========================
    // INSERTAR USUARIO
    // =========================

    // Consulta para insertar el nuevo usuario
    $sql = "INSERT INTO usuario (nombre, email, nombre_usuario, contrasena) VALUES (?, ?, ?, ?)";

    // Prepara la consulta
    $stmt = $conn->prepare($sql);

    // Asocia los valores a la consulta
    $stmt->bind_param("ssss", $Nombre, $Email, $Nombre_usuario, $ContrasenaHash);

    // Ejecuta la inserción
    if ($stmt->execute()) {
        // Si todo sale bien, redirige al login
        header("Location: index.php");
        exit();
    } else {
        // Si hay error, lo muestra
        echo "Error: " . $stmt->error;
    }

    // Cierra la consulta y la conexión
    $stmt->close();
    $conn->close();
}
?>