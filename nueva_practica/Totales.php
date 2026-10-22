<?php
session_start();


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totales</title>
</head>
<body>
    <table style="border:1px solid black;">
        <tr>
            <td style="border:1px solid black;">Código de Usuario</td>
            <td style="border:1px solid black;">Nombre</td>
            <td style="border:1px solid black;">Numero de contactos</td>
            <td style="border:1px solid black;">Grafica</td>            
        </tr>
        <tr>
            <td></td>
        </tr>       
    </table>
    <a href="index.php">Volver a loguearse</a>
    <br></br>
    <a href="agenda.php">Introducir más contactos para <?=$_SESSION['nombre']; ?></a>

</body>
</html>