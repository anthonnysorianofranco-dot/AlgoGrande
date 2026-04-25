<?php

// =========================
// FUNCIÓN PARA MOSTRAR FOROS
// =========================
// Esta función consulta la base de datos y genera
// dinámicamente el HTML de cada foro
function Mostrar_Foros(){

    // =========================
    // CONEXIÓN A LA BASE DE DATOS
    // =========================
    // Incluye el archivo donde está la conexión ($conn)
    include "../config/database.php";


    // =========================
    // CONSULTA SQL
    // =========================
    // Se hace un JOIN entre:
    // - tabla foro (f)
    // - tabla usuario (u)
    // para poder mostrar el nombre del usuario junto al foro
    $sql = "SELECT f.*, u.nombre_usuario 
            FROM foro f
            JOIN usuario u ON f.id_usuario = u.id_usuario
            ORDER BY f.fecha_creacion DESC";


    // =========================
    // EJECUTAR CONSULTA
    // =========================
    // Ejecuta la consulta en MySQL
    $result = mysqli_query($conn, $sql);


    // =========================
    // VALIDAR RESULTADOS
    // =========================
    // Verifica si existen registros
    if (mysqli_num_rows($result) > 0) {

        // =========================
        // RECORRER RESULTADOS
        // =========================
        // Recorre cada fila (foro)
        while ($row = mysqli_fetch_assoc($result)) {

            // =========================
            // FORMATEAR FECHA
            // =========================
            // Convierte la fecha a formato DD/MM/YYYY
            $fecha = date("d/m/Y", strtotime($row["fecha_creacion"]));


            // =========================
            // GENERAR HTML DEL POST
            // =========================
            // Se usa echo para imprimir cada foro en pantalla
            echo '

            <!-- POST (foro) -->
            <div class="post" data-id="'.$row["id_foro"].'">

                <!-- HEADER: usuario y fecha -->
                <div class="post-header">
                    <span class="user">'.$row["nombre_usuario"].'</span>
                    <span class="date">'.$fecha.'</span>
                </div>

                <!-- TÍTULO DEL FORO -->
                <div class="post-title">
                    '.$row["tematica"].'
                </div>

                <!-- CONTENIDO DEL FORO -->
                <div class="post-content">
                    '.$row["contenido"].'
                </div>

                <!-- FOOTER: cantidad de comentarios -->
                <div class="post-footer">
                    COMENTARIOS ('.$row["contador_chat"].')
                </div>

            </div>
            ';
        }

    } else {
        // =========================
        // SIN RESULTADOS
        // =========================
        // Si no hay foros registrados
        echo "<p>No hay foros todavía</p>";
    }
}

?>