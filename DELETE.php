<?php
// Verifica si se presionó el botón de cerrar sesión (enviado por POST)
if(isset($_POST["log_out"])){

    // Inicia la sesión actual para poder modificarla o destruirla
    session_start();

    // Elimina todas las variables de sesión (como user_id)
    session_unset();

    // Destruye completamente la sesión
    session_destroy();

    // Redirige al usuario al login (index.php)
    header("Location: index.php");
    exit(); // Detiene la ejecución del script
}
?>