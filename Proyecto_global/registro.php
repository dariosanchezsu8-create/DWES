<?php
require_once'conexion.php';
session_start();
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['nomRegistro']) && isset($_POST['pwdRegistro'])){
        $nombre=$_POST['nomRegistro'];
        $pwd=$_POST['pwdRegistro'];


 $sql ="SELECT nombre , clave, rol FROM usuarios";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $fila['clave']=password_hash($fila['clave'],PASSWORD_ARGON2ID);
                if($fila['nombre']==$nombre && password_verify($pwd, $fila['clave'])) {
                    echo "<p style='color:red;'>Usuario y clave existentes.</p>";
        }else{
                $sql_insert ="INSERT INTO usuarios (nombre, clave, rol) VALUES (:nom, :contra,:rol)";
                $stmt=$pdo->prepare($sql_insert);
                $stmt->execute([       
                ':nom' => $nombre,
                ':contra' => $pwd,
                ':rol'=>0
                ]);
                header("Location: index.php");
                exit();
         }
      }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro.php</title>
</head>
<body>
<h1>REGISTRO DE USUARIO</h1>
    <form action="" method="POST">
        <label for="usuario">USUARIO: </label>
        <input type="text" name="nomRegistro">
        <br></br>
        <label for="clave">CLAVE: </label>
        <input type="password" name="pwdRegistro">
        <br></br>
        <button type="submit">Registrarse</button>
    </form>
</body>
</html>