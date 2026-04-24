<?php
// 🔹 Datos de conexión a la base de datos
$host = "localhost";     // Servidor donde está la base de datos (normalmente localhost)
$user = "root";          // Usuario de MySQL
$password = "";          // Contraseña del usuario (vacía en este caso)
$database = "crud";      // Nombre de la base de datos a la que se quiere conectar

// 🔹 Crear una nueva conexión usando MySQLi (orientado a objetos)
$conn = new mysqli($host, $user, $password, $database);

// 🔹 Verificar si hubo un error en la conexión
if ($conn->connect_error) {
    // Si hay error, se detiene el script y muestra el mensaje
    die("Error de conexión: " . $conn->connect_error);
}

// 🔹 Si no hubo errores, se muestra este mensaje
//echo "Conectado correctamente";
?>