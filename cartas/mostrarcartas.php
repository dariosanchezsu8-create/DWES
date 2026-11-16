<?php
session_start();
require_once'conexion.php';
$sql = "SELECT nombre, clave FROM jugador WHERE login = '" . $_SESSION["login"]. "'";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <h1>Bienvenid@ <?=$fila['nombre'];?></h1>

    <?php
    }
    ?>
    <label>Cartas levantadas:<input type="text" name="cartas_levantadas"></label>
        

</body>
</html>