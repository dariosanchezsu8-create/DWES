<?php
require_once 'conexion.php';
/*
Aqui se debe comprobar de nuevo si el usuario con los datos
del formulario inicial existen y en el caso de no entonces se
tendra que hacer un insert a la base de datos con los nuevos datos

*/
//Primero establecemos conexion con la base de datos
if($_SERVER['REQUEST_METHOD']==="POST"){
//comprobar primero que se han enviado los datos del formulario inicial
  if(isset($_POST['nombre']) && isset($_POST['iniciar_sesion'])){

  $sql ="SELECT Nombre , Clave FROM USUARIOS";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
$existe=false;
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['nombre']==$_POST['nombre'] && $fila['Clave']==$_POST['iniciar_sesion']){
            $existe=true;
            echo "Usuario valido";
            break;
        }else{
            $existe=false;
        }
    }
  }

  if(isset($_POST['usuario']) && isset($_POST['clave'])){
     $usuNuevo=$_POST['usuario'];
     $contra=$_POST['clave'];
     $rolNuevo=0;

    if($existe){
    }else{
        $sql ="INSERT INTO usuarios (Nombre, Clave,rol) VALUES (:nom, :contra,:rol)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
        ':nom' => $usuNuevo,
        ':contra' => $contra,
        ':rol'=>$rolNuevo
        ]);
        echo "Usuario guardado correctamente";
        header("Location: acceso.php");
        exit();
    }
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
    <h1>REGISTRO</h1>
    <form action="" method="POST">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario">
        <br></br>
        <label for="clave">Clave</label>
        <input type="password" name="clave">
        <br></br>
        <button type="submit" name="registrar">Registrarse</button>
    </form>
</body>
</html>