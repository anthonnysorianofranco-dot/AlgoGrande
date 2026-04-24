<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GRUPPY</title>
    <link rel="stylesheet" href="../public/css/styles.css">
</head>
<body>

    <nav>
        <a><h1>GRUPPY</h1></a>
        <a>Foros</a>
        <a>Crear Foro</a>
        <a>Perfil</a>
        <a>Ajustes</a>
        <a href="../auth/logout.php">Log out</a>
    </nav>

    <div>
        <div>
            <span>User</span>
            <span>11/11/1111</span>
        </div>

        <div>
            Tematica
        </div>

        <div">
            Texto
        </div>

        <div>
            CHAT 0
        </div>
    </div>

    <script src="../public/js/app.js"></script>
</body>
</html>