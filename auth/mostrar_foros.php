<?php

// =========================
// FUNCIÓN PARA MOSTRAR FOROS
// =========================
function Mostrar_Foros(){

    // 🔹 Conexión a la base de datos
    include "../config/database.php";

    // =========================
    // CONSULTA SQL
    // =========================
    // Se hace JOIN para traer:
    // - Datos del foro (f)
    // - Nombre del usuario (u)
    $sql = "SELECT f.*, u.nombre_usuario 
            FROM foro f
            JOIN usuario u ON f.id_usuario = u.id_usuario
            ORDER BY f.fecha_creacion DESC";

    // Ejecutar consulta
    $result = mysqli_query($conn, $sql);

    // =========================
    // VALIDAR RESULTADOS
    // =========================
    if (mysqli_num_rows($result) > 0) {

        // Recorrer cada foro
        while ($row = mysqli_fetch_assoc($result)) {

            // Formatear fecha
            $fecha = date("d/m/Y", strtotime($row["fecha_creacion"]));

            // =========================
            // HTML DEL FORO
            // =========================
            echo '

            <div class="post">

                <!-- HEADER -->
                <div class="post-header">
                    <span class="user">'.$row["nombre_usuario"].'</span>
                    <span class="date">'.$fecha.'</span>
                </div>

                <!-- TÍTULO -->
                <div class="post-title">
                    '.$row["tematica"].'
                </div>

                <!-- CONTENIDO -->
                <div class="post-content">
                    '.$row["contenido"].'
                </div>

                <!-- FOOTER -->
                <div class="post-footer">
                    COMENTARIOS ('.$row["contador_chat"].')
                </div>

                <!-- BOTÓN PARA IR AL FORO -->
                <!-- data-id guarda el ID del foro para usarlo en JS -->
                <button class="btn-ver" data-id="'.$row["id_foro"].'">
                    Ver Comentarios
                </button>

            </div>
            ';
        }

    } else {
        // Si no hay foros
        echo "<p>No hay foros todavía</p>";
    }
}

?>