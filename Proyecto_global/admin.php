<?php
session_start();
require_once 'conexion.php';
$errorLote = "";
$errorEmojis = "";
$errorContactos = "";
if($_SERVER['REQUEST_METHOD']==="POST"){
    $campoLote=$_POST['nLote'];
    $campoEmojis=$_POST['nEmojis'];
    $campoContactos=$_POST['nContactos'];
        function validarLote(string $a):string{
            $error="";
         if (!isset($a) || $a === "") { 
            $error = "El lote está vacío";  
        
         }elseif (!is_numeric($a)) {
                $error = "El lote no es un número";
          }elseif(!is_int($a)){
                 $error = "El número no es entero";
           }elseif($a<3 && $a>8){
              $error="Número tiene que estar dentro del rango";
            }
                return $error;
        }
        function validarEmojis(string $b):string{
          $error="";
          if (!isset($b) || $b === "") {
            $error = "El lote está vacío";
          }elseif (!is_numeric($b)) {
                $error = "El lote no es un número";
          }elseif(!is_int($b)){
                 $error = "El número no es entero";
          }elseif($b<4 && $b>10){
                $error="Número tiene que estar dentro del rango";
            }   
                return $error;
        }
        function validarContactos(string $c):string{
          $error="";
          if (!isset($c) || $c === "") {
            $error = "El lote está vacío";
            }elseif (!is_numeric($c)) {
                $error = "El lote no es un número";
          }elseif(!is_int($c)){
                 $error = "El número no es entero";
          }elseif($c<10 && $c>100){
               $error="Número tiene que estar dentro del rango";
             }
            
            return $error;
        }
        $errorLote=validarLote($campoLote);
        $errorEmojis=validarEmojis($campoEmojis);
        $errorContactos=validarContactos($campoContactos);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin.php</title>
</head>
<body>
    <h1>Panel de Administración</h1>
    <form action="" method="POST">
        <p> Conectado como: <b><?= $_SESSION['nombre']; ?></b> | <a href="index.php">Cerrar sesión</a></p>    
        <label for="lote">Contactos por lote (3-8): 
        <input type="text" name="nLote"> <?= "numero Lote puesto"; ?></label>
        <div>*<?= $errorLote; ?></div>
        <br></br>

        <label for="lote">Emojis disponible (4-10): 
        <input type="text" name="nEmojis"> <?= "numero emojis puesto"; ?></label>
        <div>*<?= $errorEmojis; ?></div>

        <br></br>

        <label for="lote">Máx. contactos por usuarios (10-100): 
        <input type="text" name="nContactos"> <?= "numero contactos per usuario"; ?></label>
        <div>*<?= $errorContactos;?></div>
        <br></br>

        <button type="submit">Guardar configuración</button>
    </form>
    <table style="border:1px solid black;">
            <tr>
                <td style="border:3px solid black;">Cód.</td>
                <td style="border:3px solid black;">Nombre</td>
                <td style="border:3px solid black;">Rol</td>
                <td style="border:3px solid black;">Contactos</td>
            </tr>
            <?php
                  $sql ="SELECT u.nombre,u.rol,u.codigo,count(c.id) AS total_contactos
                  FROM contactos c  JOIN usuarios u ON c.codigousu=u.codigo GROUP BY c.codigousu";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute();
                  while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td style="border:3px solid black;"><?= $fila['u.codigo']; ?></td>
                <td style="border:3px solid black;"><?= $fila['u.nombre'];  ?></td>
                <td style="border:3px solid black;"><?= $fila['u.rol']; ?></td>
                <td style="border:3px solid black;"><?= $fila['total_contactos']; ?></td>
            </tr>
            <?php
                }
            ?>
    </table>
</body>
</html>