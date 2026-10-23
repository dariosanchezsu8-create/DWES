<?php
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['iniciar_sesion'])) {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    // Aquí puedes agregar la lógica para verificar el usuario y la clave en la base de datos
    // Por ejemplo, podrías usar PDO para consultar la tabla de usuarios

    // Supongamos que la verificación es exitosa
    if($usuario === 'admin' && $clave === '1234') {
        session_start();
        $_SESSION['usuario'] = $usuario;
        header('Location: interfaz.php'); // Redirige a la página de interfaz
    } else {
        echo "<p style='color:red;'>Usuario o clave incorrectos.</p>";
    }

    if(isset($_POST['registrar'])) {
        header('Location: registro.php'); // Redirige a la página de registro
        exit();
        }


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">
        <br></br>
        <label for="clave">Clave</label>
        <input type="password" name="clave">
        <br></br>
        <button type="submit" name="registrar">Registrar</button>
        <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>
    </form>
</body>
</html>