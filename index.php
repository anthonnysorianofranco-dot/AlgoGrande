<?php
// 🔹 Incluye el archivo READ.php (contiene la función para leer y mostrar los datos)
include "READ.php";

// 🔹 Incluye el archivo DELETE.php (permite ejecutar eliminación si se envía el formulario)
include "DELETE.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- 🔹 Hace que la página sea responsive en dispositivos móviles -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
</head>
<body>

    <!-- 🔹 Formulario para crear (insertar) nuevos registros -->
    <form action="CREATE.php" method="post">

        <!-- 🔹 Campo para ingresar el nombre -->
        <input type="text" name="nombre" placeholder="Nombre" required>

        <!-- 🔹 Campo para ingresar la edad -->
        <input type="number" name="edad" placeholder="Edad" required>

        <!-- 🔹 Opción de género masculino -->
        <label>M</label>
        <input type="radio" name="genero" value="M">

        <!-- 🔹 Opción de género femenino -->
        <label>F</label>
        <input type="radio" name="genero" value="F">

        <!-- 🔹 Botón para enviar el formulario -->
        <input type="submit" name="enviar" value="crear">
    </form>

    <!-- 🔹 Tabla para mostrar los datos almacenados -->
    <table>
        <thead>
            <tr>
                <!-- 🔹 Encabezados de la tabla -->
                <th>NOMBRE</th>
                <th>EDAD</th>
                <th>GENERO</th>
                <th></th> <!-- Columna para acciones (editar / borrar) -->
            </tr>
        </thead>

        <tbody>

            <?php
            // 🔹 Llama a la función $read definida en READ.php
            // Esta función imprime todas las filas de la tabla dinámicamente
            $read();
            ?>

        </tbody>
    </table>
</body>
</html>