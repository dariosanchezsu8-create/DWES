<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';

$pulsaciones = $_SESSION['pulsa'] ?? 0;
$listaDef=[];
$valores=$_SESSION['valores']??'';

    $sql ="SELECT max_lote,num_emojis,max_contactos FROM configuracion ORDER BY id DESC  LIMIT 1";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();
         while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if (empty($_SESSION['listaDef'])) {
                $_SESSION['listaDef'] = emojiAleatorio(emojisDisponibles((int)$fila['max_lote']));
            }
            
            $listaDef = $_SESSION['listaDef'];
        if($_SERVER['REQUEST_METHOD']==="POST"){
            if($pulsaciones<$fila['max_lote']){
               $listaDef[$pulsaciones];
                $pulsaciones++;
            }
            $_SESSION['pulsa']=$pulsaciones;         
         }else{
            if($_SERVER['HTTP_REFERER']==="http://localhost/agenda/grabado.php"){
                $_SESSION['pulsa'];
            }else{
            $listaDef[$pulsaciones];
            $pulsaciones++;
            $_SESSION['pulsa']=$pulsaciones;
            }
         }
         $valores.=$listaDef[$pulsaciones];
         $_SESSION['valores']=$valores;
         if($pulsaciones===count($listaDef)){
            header("Location: agenda.php");
            exit();
         }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio.php</title>
</head>
<body>
    <h1>AGENDAS DE CONTACTOS</h1>
    <p>Usuario: <b><?=htmlspecialchars($_SESSION['nombre']); ?></b> · Contactos a grabar: <?= htmlspecialchars($_SESSION['pulsa']);?></p>
    <form action="" method="POST">
        <table>
            <tr>
                <td><?=$valores;?></td>
            </tr>
        </table>
       <button type="submit">INCREMENTAR</button> 
    </form>
    <form action="agenda.php" method="POST">
           <button type="submit">GRABAR</button> 
    </form>
</body>
</html>
<?php
    }
?>