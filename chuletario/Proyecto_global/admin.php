<?php
session_start();
require_once 'conexion.php';

$errorLote = "";
$errorEmojis = "";
$errorContactos = "";
$max_lote=0;
$num_emoji=0;
$max_contactos=0;

if($_SERVER['REQUEST_METHOD']==="POST"){
    $campoLote=$_POST['nLote'];
    $campoEmojis=$_POST['nEmojis'];
    $campoContactos=$_POST['nContactos'];

        function validarLote(string $a, int $min, int $max):string{
            $error="";
         if (!isset($a) || $a === "") { 
            $error = "El lote está vacío";  
        
         }elseif (!ctype_digit($a)) {
                $error = "El lote no es un número entero";
           }elseif($a<$min || $a>$max){
              $error="Número tiene que estar dentro del rango";
            }
            return $error;
        }

        function validarEmojis(string $b, int $min, int $max):string{
          $error="";
          if (!isset($b) || $b === "") {
            $error = "El lote está vacío";
          }elseif (!ctype_digit($b)) {
                $error = "El valor no es un número entero";
          }elseif($b<$min || $b>$max){
                $error="Número tiene que estar dentro del rango";
            }   
            return $error;
        }

        function validarContactos(string $c,int $min, int $max):string{
          $error="";
          if (!isset($c) || $c === "") {
            $error = "El lote está vacío";
            }elseif (!ctype_digit($c)) {
                $error = "El lote no es un número";
          }elseif($c<$min || $c>$max){
               $error="Número tiene que estar dentro del rango";
             }
            return $error;
        }
        
        $errorLote=validarLote($campoLote,3,8);
        $errorEmojis=validarEmojis($campoEmojis,4,10);
        $errorContactos=validarContactos($campoContactos,10,100);
    if($errorLote==="" && $errorEmojis==="" && $errorContactos===""){
    $sql_insert ="INSERT INTO configuracion(id,max_lote,num_emojis,max_contactos)
    VALUES (:id,:nlote,:nemo,:ncont)";
            $stmt=$pdo->prepare($sql_insert);
            $stmt->execute([
            'id'=>$contador++,
            'nlote'=>$campoLote,
            'nemo'=>$campoEmojis,
            'ncont'=>$campoContactos
            ]);
            header("Location: index.php");
    }
}
    $sql_select="SELECT max_lote,num_emojis,max_contactos FROM configuracion ORDER BY id DESC LIMIT 1";
    $stmt=$pdo->prepare($sql_select);
    $stmt->execute();
    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $max_lote=$fila['max_lote'];
        $num_emoji=$fila['num_emojis'];
        $max_contactos=$fila['max_contactos'];
        
    }
    $_SESSION['maxL']=$max_lote;
    $_SESSION['numE']=$num_emoji;
    $_SESSION['maxC']=$max_contactos;
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin.php</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h1>Panel de Administración</h1>
    <form action="" method="POST">
        <p> Conectado como: <b><?= htmlspecialchars($_SESSION['nombre']); ?></b> | <a href="salir.php">Cerrar sesión</a></p>    
        <label for="lote">Contactos por lote (3-8): 
        <input type="text" name="nLote"> <?= htmlspecialchars($max_lote); ?></label>
        <div>*<?= $errorLote; ?></div>
        <br></br>

        <label for="lote">Emojis disponible (4-10): 
        <input type="text" name="nEmojis"> <?= htmlspecialchars($num_emoji); ?></label>
        <div>*<?= $errorEmojis; ?></div>

        <br></br>

        <label for="lote">Máx. contactos por usuarios (10-100): 
        <input type="text" name="nContactos"> <?= htmlspecialchars($max_contactos); ?></label>
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
                  FROM usuarios u  JOIN contactos c ON c.codigousu=u.codigo GROUP BY u.codigo ORDER BY c.codigousu ";
                  $stmt=$pdo->prepare($sql);
                  $stmt->execute();
                  while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <tr>
                <td style="border:3px solid black;"><?= $fila['codigo']??"----"; ?></td>
                <td style="border:3px solid black;"><?= $fila['nombre']??"----"; ?></td>
                <td style="border:3px solid black;"><?= $fila['rol']??"----"; ?></td>
                <td style="border:3px solid black;"><?= $fila['total_contactos']??"----"; ?></td>
            </tr>
            <?php
                }
            ?>
    </table>
</body>
</html>