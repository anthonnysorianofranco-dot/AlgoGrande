<?php
include "../config/database.php";

if(isset($_POST["submit_sign_up"])){

    $Nombre = trim($_POST["nombre_completo_sign_up"]);
    $Email = trim($_POST["email_sign_up"]);
    $Nombre_usuario = trim($_POST["nombre_usuario_sign_up"]);
    $Contrasena = trim($_POST["contrasena_sign_up"]);

    if (empty($Nombre) || empty($Email) || empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit();
    }

    $sqlEmail = "SELECT id_usuario FROM usuario WHERE email = ?";
    $stmtEmail = $conn->prepare($sqlEmail);
    $stmtEmail->bind_param("s", $Email);
    $stmtEmail->execute();
    $stmtEmail->store_result();

    if ($stmtEmail->num_rows > 0) {
        echo "Ese email ya tiene una cuenta";
        exit();
    }
    $stmtEmail->close();

    $sqlUserName = "SELECT id_usuario FROM usuario WHERE nombre_usuario = ?";
    $stmtUserName = $conn->prepare($sqlUserName);
    $stmtUserName->bind_param("s", $Nombre_usuario);
    $stmtUserName->execute();
    $stmtUserName->store_result();

    if ($stmtUserName->num_rows > 0) {
        echo "Ese usuario ya existe";
        exit();
    }
    $stmtUserName->close();

    $ContrasenaHash = password_hash($Contrasena, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuario (nombre, email, nombre_usuario, contrasena) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $Nombre, $Email, $Nombre_usuario, $ContrasenaHash);

    if ($stmt->execute()) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>