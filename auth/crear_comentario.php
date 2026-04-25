<?php

// =========================
// CONEXIÓN Y SESIÓN
// =========================

// Incluye la conexión a la base de datos
include "../config/database.php";

// Inicia la sesión para acceder al usuario logueado
session_start();


// =========================
// VERIFICAR ENVÍO DEL FORMULARIO
// =========================

// Verifica si se presionó el botón "crear_comentario"
if (isset($_POST["crear_comentario"])) {

    // =========================
    // OBTENER USUARIO LOGUEADO
    // =========================

    // Obtiene el ID del usuario desde la sesión
    $id_usuario = $_SESSION["user_id"];


    // =========================
    // VALIDAR ID DEL FORO
    // =========================

    // Verifica que el ID del foro venga en la URL (GET)
    if (!isset($_GET["id"])) {
        echo "Foro no encontrado";
        exit(); // detiene el script
    }

    // Guarda el ID del foro
    $id_foro = $_GET["id"];


    // =========================
    // OBTENER CONTENIDO DEL FORM
    // =========================

    // Obtiene el texto del comentario y elimina espacios innecesarios
    $contenido = trim($_POST["texto_crear_foro"]);


    // =========================
    // VALIDACIÓN
    // =========================

    // Verifica que el comentario no esté vacío
    if (!empty($contenido)) {

        // =========================
        // INSERTAR COMENTARIO
        // =========================

        // Consulta SQL para insertar el comentario
        $sql = "INSERT INTO comentario (id_foro, id_usuario, contenido) VALUES (?, ?, ?)";

        // Prepara la consulta (seguridad contra SQL Injection)
        $stmt = $conn->prepare($sql);

        // Asocia los valores a la consulta
        // i = integer, s = string
        $stmt->bind_param("iis", $id_foro, $id_usuario, $contenido);

        // Ejecuta la consulta
        if ($stmt->execute()) {

            // =========================
            // ACTUALIZAR CONTADOR
            // =========================

            // Suma +1 al contador de comentarios del foro
            $sqlUpdate = "UPDATE foro 
                          SET contador_chat = contador_chat + 1 
                          WHERE id_foro = ?";

            $stmtUpdate = $conn->prepare($sqlUpdate);
            $stmtUpdate->bind_param("i", $id_foro);
            $stmtUpdate->execute();


            // =========================
            // REDIRECCIÓN
            // =========================

            // Redirige al mismo foro para ver el comentario agregado
            header("Location: ../pages/foro.php?id=" . $id_foro);
            exit();

        } else {
            // Error en la inserción
            echo "Error al agregar comentario";
        }

    } else {
        // Si el contenido está vacío
        echo "El comentario no puede estar vacío";
    }
}
?>