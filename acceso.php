<?php
session_start();
require_once 'conexion.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre'])&& isset($_POST['pwd'])){
    $usuario = $_POST['nombre'];
    $clave = $_POST['pwd'];

    $sql ="SELECT nombre , contra FROM USUARIOS";
    $stmt=$pdo->prepare($sql);
     $stmt->execute();
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['nombre']==$_POST['nombre'] && $fila['contrasenia']==$_POST['pwd']) {
        header('Location: interfaz.php'); // Redirige a la página de interfaz
    } else {
        echo "<p style='color:red;'>Usuario o clave incorrectos.</p>";
    }
    }
}
}
/*
Aqui en primer lugar el usuario metera los datos donde corresponda
despues se comprobara con un select si existe el usuario en la base de datos
en caso de que no saltara un error de registrarse.
En caso de que si entonces con el boton Iniciar Sesion entrenara
en el juego del simon dice
*/




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>REGISTRO USUARIO</h1>
    <form action="" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="nombre">
        <br></br>
        <label for="clave">Clave</label>
        <input type="password" name="pwd">
        <br></br>
        <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
    </form>
    <form action="registro.php" method="POST">
        <button type="submit" name="registrar">Registrar</button>
    </form>
</body>
</html>