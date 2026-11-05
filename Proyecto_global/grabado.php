<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grabado.php</title>
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <p>Usuario: <?= $_SESSION['nombre'];?></p>
    <br></br>
    <p>Se han grabado <?= "ncontactos";?> contactos en tu agenda <?= "imagenes";?></p>
    <p>Tu agenda tiene ahora <?= "numeros contactos totales";?></p>
    <a href="agenda.php">Grabar más contactos</a>    <a href="totales.php">Ver totales</a>     <a href="index.php">Cerrar sesión</a>

</body>
</html>