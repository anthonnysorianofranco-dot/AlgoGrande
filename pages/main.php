<?php

// =========================
// INCLUIR FUNCIONES DE FOROS
// =========================
// Trae la función Mostrar_Foros() para mostrar los posts desde la BD
include "../auth/mostrar_foros.php";

// Inicia la sesión para poder usar variables del usuario logueado
session_start();

// =========================
// PROTECCIÓN DE RUTA
// =========================
// Si no existe un usuario logueado, lo redirige al login
if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Codificación de caracteres -->
    <meta charset="UTF-8">

    <!-- Diseño responsive para móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título de la página -->
    <title>GRUPPY</title>

    <!-- Enlace al archivo CSS principal -->
    <link rel="stylesheet" href="../public/css/styles.css">

</head>
<body>

    <!-- ========================= -->
    <!-- SIDEBAR / MENÚ LATERAL -->
    <!-- ========================= -->
    <nav class="sidebar">

        <!-- Logo / título con ancla -->
        <a href="#GRUPPY"><h1>GRUPPY</h1></a>

        <!-- Enlace a foros (aún sin funcionalidad) -->
        <a href="#">Foros</a>

        <!-- Botón que muestra el formulario de crear foro -->
        <a href="#" id="btnCrearForo">Crear Foro</a>

        <!-- Botón de ajustes con alerta temporal -->
        <a href="#" id="btnAjustes">Ajustes</a>

        <!-- Logout del sistema -->
        <a href="../auth/logout.php">Log out</a>

    </nav>

    <!-- ========================= -->
    <!-- CONTENIDO PRINCIPAL -->
    <!-- ========================= -->
    <div id="GRUPPY" class="main-content">

        <!-- ========================= -->
        <!-- FORMULARIO CREAR FORO -->
        <!-- ========================= -->
        <form action="../auth/crear_foro.php" method="POST">

            <!-- Contenedor del formulario (oculto por defecto con clase hidden) -->
            <div class="create-post hidden" id="createPost">

                <!-- Título del formulario -->
                <label>Crea un foro</label>

                <!-- Input de temática -->
                <input type="text" name="tematica_crear_foro" placeholder="Tematica" required>

                <!-- Área de texto del contenido -->
                <textarea name="texto_crear_foro" placeholder="Texto" required></textarea>

                <!-- Botón para enviar el foro -->
                <input type="submit" name="crear_foro" value="Crear">

                <!-- Botón para cancelar y ocultar formulario -->
                <input type="button" value="Cancelar" id="btnCancelar">
            </div>

        </form>

        <!-- ========================= -->
        <!-- LISTADO DE FOROS -->
        <!-- ========================= -->
        <!-- Llama a la función que imprime los posts desde la base de datos -->
        <?php Mostrar_Foros(); ?>

    </div>

    <!-- ========================= -->
    <!-- ARCHIVO JAVASCRIPT EXTERNO -->
    <!-- ========================= -->
    <script src="../public/js/app.js" defer></script>

    <!-- ========================= -->
    <!-- SCRIPT TEMPORAL (AJUSTES) -->
    <!-- ========================= -->
    <script>
        // Espera a que cargue todo el DOM
        document.addEventListener("DOMContentLoaded", () => {

            // Obtiene el botón de ajustes
            const btnAjustes = document.getElementById("btnAjustes");

            // Evento click en ajustes
            btnAjustes.addEventListener("click", (e) => {
                e.preventDefault(); // Evita recargar la página
                alert("Todavía no tiene función"); // Mensaje temporal
            });

        });
    </script>

</body>
</html>