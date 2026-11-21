<?php
session_start();
require_once'conexion.php';
//Hacer primero consulta codigo usu
//luego hacer consulta trasaciion
y lueogo consulta de recuento segun el id
if(!empty($_SESSION['contactos_lote'])){
    $contactos=$_SESSION['contactos_lote'];
    $pdo->beginTransaction();
    $stmt = $pdo->prepare(
            "INSERT INTO contactos (codigousu, nombre, apellidos, telefono, email, emoji, fecha)
             VALUES (:cod, :nom, :ape, :tlf, :email, :emoji)"
        );
        foreach($contactos as $i =>$j){
             $stmt->execute([
                ':cod'   => $_SESSION['codigo'],
                ':nom'   => $c['nombre'],
                ':ape'   => $c['apellido'])
                
             ]);
        }
        $pdo->commit();






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
    <p>Se han grabado <?= $_SESSION['pulsa']; ?> en tu agenda <?= $_SESSION['listaDef']; ?></p>
    <p>Tu agenda tiene ahora  contactos</p>

    <a href="inicio.php">Grabar mása contactos</a>
    <a href="totales.php">Ver Totales</a>
    <a href="index.php">Cerrar Sesión</a>
</body>
</html>