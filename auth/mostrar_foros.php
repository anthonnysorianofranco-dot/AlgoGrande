<?php

// =========================
// FUNCIÓN PARA MOSTRAR FOROS
// =========================
// Esta función se encarga de consultar la base de datos
// y mostrar todos los foros en pantalla con HTML
function Mostrar_Foros(){

    // Incluye la conexión a la base de datos
    include "../config/database.php";

    // =========================
    // CONSULTA SQL
    // =========================
    // Trae todos los foros junto con el nombre del usuario
    // usando un JOIN entre la tabla foro y usuario
    $sql = "SELECT f.*, u.nombre_usuario 
            FROM foro f
            JOIN usuario u ON f.id_usuario = u.id_usuario
            ORDER BY f.fecha_creacion DESC";

    // Ejecuta la consulta en la base de datos
    $result = mysqli_query($conn, $sql);

    // =========================
    // VALIDAR RESULTADOS
    // =========================
    // Verifica si hay registros en la consulta
    if (mysqli_num_rows($result) > 0) {

        // Recorre cada fila de resultados
        while ($row = mysqli_fetch_assoc($result)) {

            // =========================
            // FORMATEO DE FECHA
            // =========================
            // Convierte la fecha de la base de datos a formato día/mes/año
            $fecha = date("d/m/Y", strtotime($row["fecha_creacion"]));

            // =========================
            // IMPRESIÓN DEL POST
            // =========================
            // Genera el HTML dinámico para cada foro
            echo '
            <div class="post">

                <!-- Encabezado del post -->
                <div class="post-header">
                    <span class="user">'.$row["nombre_usuario"].'</span>
                    <span class="date">'.$fecha.'</span>
                </div>

                <!-- Título del foro -->
                <div class="post-title">
                    '.$row["tematica"].'
                </div>

                <!-- Contenido del foro -->
                <div class="post-content">
                    '.$row["contenido"].'
                </div>

                <!-- Footer con contador de chat -->
                <div class="post-footer">
                    CHAT '.$row["contador_chat"].'
                </div>

            </div>
            ';
        }

    } else {
        // Si no hay registros en la base de datos
        echo "<p>No hay foros todavía</p>";
    }
}

?>