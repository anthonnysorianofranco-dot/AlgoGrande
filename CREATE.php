<?php
// 🔹 Incluye el archivo de conexión a la base de datos
include "connection.php";

// 🔹 Verifica si el formulario fue enviado (si se presionó el botón "enviar")
if(isset($_POST["enviar"])){

    // 🔹 Obtiene los datos enviados desde el formulario
    // trim() elimina espacios en blanco al inicio y al final
    $nombre = trim($_POST["nombre"]);
    $edad = trim($_POST["edad"]);
    $genero = trim($_POST["genero"]);

    // 🔹 Consulta SQL para insertar un nuevo registro en la tabla "personas"
    // Se insertan los valores de nombre, edad y género
    $sql = "INSERT INTO personas (Nombre, Edad, Genero) VALUE ('$nombre', $edad, '$genero')";

    // 🔹 Prepara la consulta (aunque aquí no se usan parámetros dinámicos reales)
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