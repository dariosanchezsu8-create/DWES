<?php
session_start();
require_once'conexion.php';
//Hacer primero consulta codigo usu
//luego hacer consulta trasaciion
echo $_SESSION['nombre'];
$total=0;
$emoji="";
if(!empty($_SESSION['contactos_lote'])){
     $sql ="SELECT codigo FROM usuarios WHERE nombre=:nombre ";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
            ':nombre'=>$_SESSION['nombre']
        ]);
        $codigo=$stmt->fetchColumn();

    $contactos=$_SESSION['contactos_lote'];
    $pdo->beginTransaction();
    $stmt = $pdo->prepare(
            "INSERT INTO contactos (codigousu, nombre, apellidos, telefono, email, emoji, fecha)
             VALUES (:cod, :nom, :ape, :tlf, :email, :emoji,NOW())");
        foreach($contactos as $i =>$j){
            $emoji=$_SESSION['listaDef'][$i];
             $stmt->execute([
                ':cod'   =>  $codigo,
                ':nom'   => $j['nombre'],
                ':ape'   => $j['apellido'],
                ':tlf'   => $j['tlf'],
                ':email' => $j['email'],
                ':emoji' => $emoji
             ]);
        }
        $pdo->commit();
        $sql_select="SELECT COUNT(*) AS total_agenda FROM contactos WHERE codigousu = :cod";
        $stmt = $pdo->prepare($sql_select);
        $stmt->execute([
         ':cod' => $codigo
        ]);    
        $total=$stmt->fetchColumn();

          if ($pdo->inTransaction()) {
            $pdo->rollBack();
          }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grabado.php</title>
</head>
<body>
    <h1>AGENDAS CONTACTOS</h1>
    <p>Usuario: <?= $_SESSION['nombre']; ?></p>
    <p>Se han grabado <?= $_SESSION['pulsa']; ?> en tu agenda <?= $emoji; ?></p>
    <p>Tu agenda tiene ahora <?= $total; ?> contactos</p>
    
    <a href="inicio.php">Grabar más contactos</a>
    <a href="totales.php">Ver Totales</a>
    <a href="index.php">Cerrar Sesión</a>
</body>
</html>