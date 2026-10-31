<?php
require_once 'conexion.php';
// 1. Abrimos la puerta de la sesión que trae el navegador
session_start();

if (isset($_SERVER['HTTP_REFERER']) && (strpos($_SERVER['HTTP_REFERER'], 'fallo.php') !== false || strpos($_SERVER['HTTP_REFERER'], 'acierto.php') !== false)) {
  session_unset();
  session_destroy();
  session_start();
$sql ="SELECT codigousu FROM jugadas ORDER BY codjugada DESC LIMIT 1";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
  while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo $fila['codigousu'];      
  $sql_select="SELECT Nombre, Clave FROM usuarios WHERE Codigo LIKE '" . $fila['codigousu'] . "'";
        $stmt=$pdo->prepare($sql_select);
        $stmt->execute();
          while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['user']=$fila['Nombre'];
            $_SESSION['psswrd']=$fila['Clave'];
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
        <h1>Bienvenida, al simon dice</h1>
        <form action="pintar_circulos.php" method="POST">
            <label for="circulos">Numero de círculos</label>
            <input type="text" name="circulos" value=7></input>     
            <br></br>            
            <label for="colores">Numero de colores</label>
            <input type="text" name="colores"></input>
            <br></br>
            <label for="color">Color </label>
            <input type="text" name="color">
            <br></br>
            <button type="submit">Comencemos</button>
        </form>
        </body>
</html>

