<?php
// 1. Abrimos la puerta de la sesión que trae el navegador
session_start();
// 2. Limpiamos todas las variables que había dentro (como 'tener', 'crcl', etc.)
session_unset(); 
// 3. Destruimos la sesión por completo
session_destroy(); 
// (Opcional) Si quieres volver a empezar una sesión limpia para el nuevo juego:
session_start();
require_once 'conexion.php';
try{
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['nombre'])&& isset($_POST['pwd'])){
    $usuario = $_POST['nombre'];
    $clave = $_POST['pwd'];
    $sql ="SELECT Nombre , Clave,Rol FROM usuarios";
    $stmt=$pdo->prepare($sql);
     $stmt->execute();
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['Nombre']==$usuario && $fila['Clave']==$clave) {
        if($fila['Rol']==0){
           $_SESSION['tener']=true;
            header('Location: interfaz.php'); // Redirige a la página de interfaz
            exit();
        }else{
           $_SESSION['tener']=false;
            header("Location: seguridad.php");
            exit();    
        }
       
   } else {
         echo "<p style='color:red;'>Usuario o clave incorrectos.</p>";
        }

      }
     }
  }
}catch(PDOException $e){

        echo "<p style='color:red;'>Error </p>". $e->getMessage();

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
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>
</html>