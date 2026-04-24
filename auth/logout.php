<?php
// Inicia la sesión para poder manipularla
session_start();

// =========================
// LIMPIAR VARIABLES DE SESIÓN
// =========================
// Elimina todas las variables almacenadas en la sesión actual
session_unset();

// =========================
// DESTRUIR SESIÓN
// =========================
// Elimina completamente la sesión del servidor
session_destroy();

// =========================
// REDIRECCIÓN
// =========================
// Envía al usuario de vuelta al login (index.php)
header("Location: ../index.php");

// Termina la ejecución del script para evitar código adicional
exit();
?>