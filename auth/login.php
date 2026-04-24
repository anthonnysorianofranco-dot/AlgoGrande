<?php
include "../config/database.php";
session_start();

if(isset($_POST["submit_login"])){

    $Nombre_usuario = trim($_POST["nombre_usuario_login"]);
    $Contrasena = trim($_POST["contrasena_login"]);

    if (empty($Nombre_usuario) || empty($Contrasena)) {
        echo "Todos los campos son obligatorios";
        exit();
    }

    $sql = "SELECT id_usuario, contrasena FROM usuario WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error prepare: " . $conn->error);
    }

    $stmt->bind_param("s", $Nombre_usuario);
    $stmt->execute();
    $stmt->bind_result($id_usuario, $passwordHash);

    if (!$stmt->fetch()) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    if ($passwordHash === null) {
        echo "Error: contraseña NULL en BD";
        exit();
    }

    if (!password_verify($Contrasena, $passwordHash)) {
        echo "Usuario o contraseña incorrecta";
        exit();
    }

    $_SESSION["user_id"] = $id_usuario;

    $stmt->close();
    $conn->close();

    header("Location: ../pages/main.php");
    exit();
}
?>