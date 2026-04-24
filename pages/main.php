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
</head>
<body>

    <form action="../auth/logout.php" method="POST">
        <button type="submit" name="log_out">Log out</button>
    </form>

    <h1>GRUPPY</h1>

</body>
</html>