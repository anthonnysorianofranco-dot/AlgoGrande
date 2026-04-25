<?php

// =========================
// IMPORTAR ARCHIVOS
// =========================

// Función que muestra los comentarios
include "../auth/mostrar_comentarios.php";

// Conexión a la base de datos
include "../config/database.php";

// Inicia sesión
session_start();


// =========================
// VALIDAR SESIÓN
// =========================

// Verifica que el usuario esté logueado
if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}


// =========================
// VALIDAR ID DEL FORO
// =========================

// Verifica que venga el ID por la URL
if (!isset($_GET["id"])) {
    echo "Foro no encontrado";
    exit();
}

// Guarda el ID del foro
$id = $_GET["id"];


// =========================
// CONSULTAR FORO
// =========================

// Consulta para traer el foro + nombre del usuario
$sql = "SELECT f.*, u.nombre_usuario 
        FROM foro f
        JOIN usuario u ON f.id_usuario = u.id_usuario
        WHERE f.id_foro = ?";

// Preparar consulta (seguridad)
$stmt = $conn->prepare($sql);

// Vincular parámetro (i = integer)
$stmt->bind_param("i", $id);

// Ejecutar
$stmt->execute();

// Obtener resultado
$result = $stmt->get_result();

// Obtener datos del foro
$foro = $result->fetch_assoc();

// Si no existe el foro
if (!$foro) {
    echo "Foro no existe";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <!-- Título de la página -->
    <title>Foro</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

<!-- ========================= -->
<!-- SIDEBAR -->
<!-- ========================= -->
<nav class="sidebar">

    <!-- Logo -->
    <a href="main.php"><h1>GRUPPY</h1></a>

    <!-- Volver a foros -->
    <a href="main.php">Foros</a>

    <!-- Mostrar formulario comentario -->
    <a href="#" id="btnCrearForo">Agregar Comentario</a>

    <!-- Ajustes (temporal) -->
    <a href="#" id="btnAjustes">Ajustes</a>

    <!-- Cerrar sesión -->
    <a href="../auth/logout.php">Log out</a>

</nav>


<!-- ========================= -->
<!-- CONTENEDOR PRINCIPAL -->
<!-- ========================= -->
<div class="foro-container">


    <!-- ========================= -->
    <!-- HEADER DEL FORO -->
    <!-- ========================= -->
    <div class="foro-header">

        <!-- Usuario y fecha -->
        <div class="post-header">
            <span class="user">
                <?php echo $foro["nombre_usuario"]; ?>
            </span>

            <span class="date">
                <?php echo date("d/m/Y", strtotime($foro["fecha_creacion"])); ?>
            </span>
        </div>

        <!-- Título -->
        <div class="post-title">
            <?php echo $foro["tematica"]; ?>
        </div>

        <!-- Contenido -->
        <div class="post-content">
            <?php echo $foro["contenido"]; ?>
        </div>

    </div>


    <!-- ========================= -->
    <!-- FORMULARIO COMENTARIO -->
    <!-- ========================= -->

    <!-- IMPORTANTE: se pasa el id del foro por la URL -->
    <form action="../auth/crear_comentario.php?id=<?php echo $id; ?>" method="POST">

        <!-- Form oculto -->
        <div class="create-post hidden" id="createPost">

            <label>Agregar Comentario</label>

            <!-- Texto del comentario -->
            <textarea 
                name="texto_crear_foro" 
                placeholder="Escribe tu comentario..." 
                required
            ></textarea>

            <!-- Botón enviar -->
            <input 
                type="submit" 
                name="crear_comentario" 
                value="Comentar"
            >

            <!-- Botón cancelar -->
            <input 
                type="button" 
                value="Cancelar" 
                id="btnCancelar"
            >

        </div>

    </form>


    <!-- ========================= -->
    <!-- LISTA DE COMENTARIOS -->
    <!-- ========================= -->

    <?php
        // Llama la función que imprime los comentarios
        Mostrar_Comentarios();
    ?>

</div>


<!-- ========================= -->
<!-- JAVASCRIPT -->
<!-- ========================= -->
<script src="../public/js/app.js" defer></script>

</body>
</html>