<?php
require_once 'conexion.php';
session_start();
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_POST['nombre']) && isset($_POST['pwd'])){
        $_SESSION['nombre']=$_POST['nombre'];
        $_SESSION['pwd']=$_POST['pwd'];

        $sql ="SELECT nombre , clave, rol FROM usuarios";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
        while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if($fila['nombre']==$_SESSION['nombre'] && $fila['clave']==$_SESSION['pwd']) {
            if($fila['rol']==0){
                header('Location: inicio.php'); 
                exit();
            }else{
                header("Location: admin.php");
                exit();    
            }
    } else {
            echo "<p style='color:red;'>Usuario o clave incorrectos.</p>";
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
    <title>Index.php</title>
    <link rel="stylesheet" href="css.css">
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
        <button type="submit" name="iniciar_sesion">Entrar</button>
    </form>
    <form action="registro.php" method="POST">
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>
</html>