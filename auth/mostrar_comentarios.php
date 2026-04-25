<?php

// =========================
// FUNCIÓN PARA MOSTRAR COMENTARIOS
// =========================
// Esta función consulta la base de datos y muestra
// todos los comentarios de un foro específico
function Mostrar_Comentarios(){

    // =========================
    // CONEXIÓN A LA BD
    // =========================
    include "../config/database.php";


    // =========================
    // OBTENER ID DEL FORO
    // =========================
    // Se toma el id desde la URL (GET)
    $id_foro = $_GET["id"];


    // =========================
    // CONSULTA SQL
    // =========================
    // Se hace JOIN para traer:
    // - datos del comentario (c)
    // - nombre del usuario (u)
    $sql = "SELECT c.*, u.nombre_usuario
            FROM comentario c
            JOIN usuario u ON c.id_usuario = u.id_usuario
            WHERE c.id_foro = ?
            ORDER BY c.fecha ASC";


    // =========================
    // PREPARED STATEMENT
    // =========================
    $stmt = $conn->prepare($sql);

    // i = integer
    $stmt->bind_param("i", $id_foro);

    // Ejecutar consulta
    $stmt->execute();

    // Obtener resultados
    $result = $stmt->get_result();


    // =========================
    // VALIDAR RESULTADOS
    // =========================
    if ($result->num_rows > 0) {

        // Recorrer cada comentario
        while ($row = $result->fetch_assoc()) {

            // Formatear fecha
            $fecha = date("d/m/Y", strtotime($row["fecha"]));

            // =========================
            // IMPRIMIR COMENTARIO
            // =========================
            echo '

            <div class="comment">

                <!-- HEADER -->
                <div class="comment-header">
                    <span class="user">'.$row["nombre_usuario"].'</span>
                    <span class="date">'.$fecha.'</span>
                </div>

                <!-- CONTENIDO -->
                <div class="comment-content">
                    '.$row["contenido"].'
                </div>

            </div>
            ';
        }

    } else {

        // Si no hay comentarios
        echo "<p>No hay comentarios todavía</p>";
    }
}
?>