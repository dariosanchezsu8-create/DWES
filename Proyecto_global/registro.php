<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro.php</title>
</head>
<body>
    
<h1>AGENDA DE CONTACTOS</h1>
    <form action="" method="POST">
        <label for="usuario">USUARIO: </label>
        <input type="text" name="nombre">
        <br></br>
        <label for="clave">CLAVE: </label>
        <input type="password" name="pwd">
        <br></br>
        <form action="index.php" method="POST">
            <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
        </form>
    </form>
</body>
</html>