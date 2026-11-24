<?php
session_start();
session_unset(); 
session_destroy(); 
session_start();
require_once 'conexion.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre'])&& isset($_POST['pwd'])){
    $usuario = $_POST['nombre'];
    $clave = $_POST['pwd'];
    $_SESSION['user']=$usuario;
    $_SESSION['psswrd']=$clave;
    $sql ="SELECT Nombre , Clave,Rol FROM usuarios";
    $stmt=$pdo->prepare($sql);
     $stmt->execute();
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['Nombre']==$usuario && $fila['Clave']==$clave) {
        if($fila['Rol']==0){
            $_SESSION['rol']=$fila['rol'];
           $_SESSION['tener']=true;
            header('Location: pintar_circulos.php'); // Redirige a la página de interfaz
            exit();
        }else{
           $_SESSION['tener']=false;
            header("Location: seguridad.php");
            exit();    
        }
       }        
      }
      echo "<p style='color:red;'>Usuario o clave incorrectos.</p>";
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
    <h1>LOGIN USUARIO</h1>
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
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>
</html>