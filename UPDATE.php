<?php
// 🔹 Incluye el archivo de conexión a la base de datos
include "connection.php";

// 🔹 Variable para almacenar los datos de la persona a editar
$data = null;

// 🔹 Verifica si se presionó el botón "editar"
if(isset($_POST["editar"])){

    // 🔹 Obtiene el ID enviado desde el formulario anterior
    $id = $_POST["editar"];

    // 🔹 Consulta SQL para obtener los datos de la persona según su ID
    $sql = "SELECT Nombre, Edad, Genero FROM personas WHERE Id_personas = $id";

    // 🔹 Prepara la consulta
    $stmt = $conn->prepare($sql);

    // 🔹 Ejecuta la consulta
    $stmt->execute();

    // 🔹 Obtiene el resultado de la consulta
    $result = $stmt->get_result();

    // 🔹 Convierte el resultado en un arreglo asociativo (una sola fila)
    $data = $result->fetch_assoc();
}

// 🔹 Verifica si se presionó el botón "Actualizar"
if(isset($_POST["Actualizar"])){
    
    // 🔹 Obtiene el ID oculto enviado desde el formulario
    $id = $_POST["id"];

    // 🔹 Obtiene y limpia los datos del formulario
    $nombre = trim($_POST["nombre"]);   // Nombre sin espacios extras
    $edad = trim($_POST["edad"]);       // Edad
    $genero = trim($_POST["genero"]);   // Género

    // 🔹 Consulta SQL para actualizar los datos en la base de datos
    $sql = "UPDATE personas SET Nombre = '$nombre', Edad = $edad, Genero = '$genero' WHERE Id_personas = $id";

    // 🔹 Prepara la consulta
    $stmt = $conn->prepare($sql);

    // 🔹 Ejecuta la consulta
    if ($stmt->execute()) {
        // 🔹 Si se ejecuta correctamente, redirige al index.php
        header("Location: index.php");
        exit();
    }

    // 🔹 Cierra la sentencia
    $stmt->close();

    // 🔹 Cierra la conexión a la base de datos
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD_UPDATE</title>
</head>
<body>

<!-- 🔹 Formulario para actualizar los datos -->
<form action="UPDATE.php" method="post">

    <!-- 🔹 Campo oculto que guarda el ID de la persona -->
    <input type="hidden" name="id" value="<?php echo $id; ?>">

    <!-- 🔹 Campo para editar el nombre, cargado con el valor actual -->
    <input type="text" name="nombre" value="<?php echo $data['Nombre']; ?>" required>

    <!-- 🔹 Campo para editar la edad -->
    <input type="number" name="edad" value="<?php echo $data['Edad']; ?>" required>

    <!-- 🔹 Radio button para seleccionar género masculino -->
    <label>M</label>
    <input type="radio" name="genero" value="M" <?php if($data['Genero']=="M") echo "checked"; ?>>

    <!-- 🔹 Radio button para seleccionar género femenino -->
    <label>F</label>
    <input type="radio" name="genero" value="F" <?php if($data['Genero']=="F") echo "checked"; ?>>

    <!-- 🔹 Botón para enviar el formulario y actualizar -->
    <input type="submit" name="Actualizar" value="Actualizar">

    <!-- 🔹 Botón para cancelar y volver al index -->
    <button><a href="index.php">cancelar</a></button>
</form>
    
</body>
</html>