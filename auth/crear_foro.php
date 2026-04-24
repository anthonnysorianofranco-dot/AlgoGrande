<?php
// Incluye el archivo de conexión a la base de datos
include "../config/database.php";

// Inicia la sesión para poder usar variables como el usuario logueado
session_start();

// Verifica si el formulario fue enviado con el botón "crear_foro"
if (isset($_POST["crear_foro"])) {

    // =========================
    // OBTENER USUARIO LOGUEADO
    // =========================
    // Se obtiene el ID del usuario desde la sesión
    $id_usuario = $_SESSION["user_id"];

    // =========================
    // DATOS DEL FORMULARIO
    // =========================
    // Temática del foro enviada por el usuario
    $tematica = $_POST["tematica_crear_foro"];

    // Contenido del foro enviado por el usuario
    $contenido = $_POST["texto_crear_foro"];

    // =========================
    // VALIDACIÓN BÁSICA
    // =========================
    // Se asegura de que no estén vacíos los campos
    if (!empty($tematica) && !empty($contenido)) {

        // =========================
        // INSERT EN BASE DE DATOS
        // =========================
        // Se usa prepared statement para evitar SQL Injection
        $stmt = $conn->prepare("INSERT INTO foro (id_usuario, tematica, contenido) VALUES (?, ?, ?)");

        // Se asignan los valores a la consulta
        $stmt->bind_param("iss", $id_usuario, $tematica, $contenido);

        // Ejecuta la consulta
        if ($stmt->execute()) {

            // Si todo sale bien, redirige a main.php
            header("Location: ../pages/main.php");
            exit();

        } else {
            // Si ocurre un error en la base de datos
            echo "Error al crear el foro";
        }

    } else {
        // Si hay campos vacíos
        echo "Todos los campos son obligatorios";
    }
}
?>