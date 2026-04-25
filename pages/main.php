<?php
// =========================
// INCLUIR ARCHIVOS NECESARIOS
// =========================

// Importa la función que muestra los foros desde la base de datos
include "../auth/mostrar_foros.php";

// Inicia la sesión (necesario para usar $_SESSION)
session_start();

// =========================
// VALIDAR SESIÓN
// =========================

// Verifica si el usuario está logueado
if (!isset($_SESSION["user_id"])) {

    // Si NO está logueado → lo redirige al login
    header("Location: ../index.php");

    // Detiene la ejecución del script
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración básica -->
    <meta charset="UTF-8">

    <!-- Responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título de la página -->
    <title>GRUPPY</title>

    <!-- Archivo de estilos -->
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<!-- ========================= -->
<!-- SIDEBAR (MENÚ IZQUIERDO) -->
<!-- ========================= -->
<nav class="sidebar">

    <!-- Logo / título -->
    <a><h1>GRUPPY</h1></a>

    <!-- Opciones del menú -->
    <a href="#">Foros</a>

    <!-- Botón que activa el formulario de crear foro (JS) -->
    <a href="#" id="btnCrearForo">Crear Foro</a>

    <!-- Botón de ajustes (actualmente sin funcionalidad real) -->
    <a href="#" id="btnAjustes">Ajustes</a>

    <!-- Cerrar sesión -->
    <a href="../auth/logout.php">Log out</a>

</nav>

<!-- ========================= -->
<!-- CONTENIDO PRINCIPAL -->
<!-- ========================= -->
<div class="main-content">

    <!-- ========================= -->
    <!-- FORMULARIO CREAR FORO -->
    <!-- ========================= -->

    <!-- Envía los datos a crear_foro.php -->
    <form action="../auth/crear_foro.php" method="POST">

        <!-- Contenedor del formulario (inicia oculto con class="hidden") -->
        <div class="create-post hidden" id="createPost">

            <!-- Título -->
            <label>Crea un foro</label>

            <!-- Input para la temática del foro -->
            <input 
                type="text" 
                name="tematica_crear_foro" 
                placeholder="Tematica" 
                required
            >

            <!-- Área de texto para el contenido -->
            <textarea 
                name="texto_crear_foro" 
                placeholder="Texto" 
                required
            ></textarea>

            <!-- Botón enviar -->
            <input 
                type="submit" 
                name="crear_foro" 
                value="Crear"
            >

            <!-- Botón cancelar (oculta el formulario con JS) -->
            <input 
                type="button" 
                value="Cancelar" 
                id="btnCancelar"
            >

        </div>
    </form>

    <!-- ========================= -->
    <!-- MOSTRAR FOROS -->
    <!-- ========================= -->

    <?php
        // Llama a la función que imprime todos los foros
        Mostrar_Foros();
    ?>

</div>

<!-- ========================= -->
<!-- JAVASCRIPT -->
<!-- ========================= -->

<!-- Archivo JS (maneja botones, mostrar/ocultar, navegación, etc.) -->
<script src="../public/js/app.js" defer></script>

</body>
</html>