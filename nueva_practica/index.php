<?php
//Realizar un pequeño formulario con el nombre y el password
//Com h1 y boton de entrar
//todas con su debidas comprobaciones
//y con session start
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Proyecto</title>
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
        <form action="inicio.php" method="POST">
            <label for="nombre">Usuario: </label>
            <input type="text" name="nombre">

            <label for="pwd">Clave: </label>
            <input type="text" name="pwd">

            <button type="submit">Entrar</button>
        </form>
</body>
</html>