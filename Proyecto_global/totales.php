<?php
session_start();
require_once'conexion.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>totales.php</title>
</head>
<body>
    <h1>AGENDA - Totales</h1>
    <p> <?= $_SESSION['nombre'];?>, estos son los contactos guardados: </p>
    <table style="border:3px solid black;">
        <tr>
            <td>Cód.</td>
            <td>Nombre</td>
            <td>Cont.</td>
            <td>%</td>
            <td>Último alta</td>
            <td>Gráfica</td>
        </tr>
        <?php

        ?>
        <tr>

        </tr>
    </table>
<a href="agenda.php">Grabar más contactos</a>    <a href="index.php">Cerrar sesión</a>

</body>
</html>