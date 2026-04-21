<?php
// 🔹 Se define una función anónima (closure) llamada $read
// Esta función se encargará de leer los datos de la base de datos y mostrarlos en una tabla
$read = function() {

    // 🔹 Incluye el archivo de conexión a la base de datos
    include "connection.php";

    // 🔹 Consulta SQL para obtener todos los registros de la tabla "personas"
    $sql = "SELECT * FROM personas";

    // 🔹 Ejecuta la consulta directamente con query()
    $stmt = $conn->query($sql);

    // 🔹 Recorre todos los resultados obtenidos de la consulta
    // fetch_assoc() devuelve cada fila como un arreglo asociativo
    while ($data = $stmt->fetch_assoc()) {
        ?>
        <tr>
            <!-- 🔹 Muestra el nombre, usando htmlspecialchars para evitar XSS -->
            <td><?php echo htmlspecialchars($data['Nombre']); ?></td>

            <!-- 🔹 Muestra la edad -->
            <td><?php echo htmlspecialchars($data['Edad']); ?></td>

            <!-- 🔹 Muestra el género -->
            <td><?php echo htmlspecialchars($data['Genero']); ?></td>

            <td>
                <!-- 🔹 Formulario para eliminar el registro -->
                <form action="DELETE.php" method="POST">
                    <!-- Se envía el ID de la persona en el value del botón -->
                    <button type="submit" name="borrar" value="<?php echo $data['Id_personas']; ?>">Borrar</button>
                </form>

                <!-- 🔹 Formulario para editar el registro -->
                <form action="UPDATE.php" method="POST">
                    <!-- Se envía el ID de la persona en el value del botón -->
                    <button type="submit" name="editar" value="<?php echo $data['Id_personas']; ?>">Editar</button>
                </form>
            </td>
        </tr>
        <?php 
    }
};
?>