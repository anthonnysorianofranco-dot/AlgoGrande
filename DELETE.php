<?php
// 🔹 Incluye el archivo de conexión a la base de datos
include "connection.php";

// 🔹 Verifica si se presionó el botón "borrar"
if(isset($_POST["borrar"])){

    // 🔹 Obtiene el ID del registro a eliminar (enviado desde el formulario)
    $id = $_POST["borrar"];

    // 🔹 Consulta SQL para eliminar el registro de la tabla "personas"
    // Se elimina el registro cuyo Id_personas coincide con el ID recibido
    $sql = "DELETE FROM personas WHERE Id_personas = $id;";

    // 🔹 Prepara la consulta
    $stmt = $conn->prepare($sql);

    // 🔹 Ejecuta la consulta
    if ($stmt->execute()) {
        // 🔹 Si se ejecuta correctamente, redirige al index.php
        header("Location: index.php");
        exit();
    }

    // 🔹 Cierra la sentencia preparada
    $stmt->close();

    // 🔹 Cierra la conexión a la base de datos
    $conn->close();
}
?>