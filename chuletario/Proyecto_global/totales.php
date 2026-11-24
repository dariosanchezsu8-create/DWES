<?php
session_start();
require_once'conexion.php';

$sumatorio=0;
$estilo="";

    $sql = "SELECT u.codigo, COUNT(c.codigousu)AS total_contactos, u.nombre,MAX(c.fecha)AS ultima
    FROM usuarios u
    LEFT JOIN contactos c ON c.codigousu = u.codigo
    GROUP BY u.codigo
    ORDER BY total_contactos DESC, u.nombre ASC";
    
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    $filas=$stmt->fetchAll();

    foreach($filas as $datos){
        $sumatorio+=$datos['total_contactos'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>totales.php</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h1>AGENDA - Totales</h1>
    <p> <?= htmlspecialchars($_SESSION['nombre']);?>, estos son los contactos guardados: </p>
    <table style="border:3px solid black;">
        <tr>
            <td style="border:3px solid black;">Cód.</td>
            <td style="border:3px solid black;">Nombre</td>
            <td style="border:3px solid black;">Cont.</td>
            <td style="border:3px solid black;">%</td>
            <td style="border:3px solid black;">Último alta</td>
            <td style="border:3px solid black;">Gráfica</td>
        </tr>
            <?php
                foreach($filas as $datos){
                $porcentaje=$datos['total_contactos']/$sumatorio;
                if($datos['nombre']=="admin"){
                    continue;
                }
                $estilo="";
                if($_SESSION['cod']==$datos['codigo']){
                    $estilo="background-color:#fff3b0;";
                }
                $porcentaje=$porcentaje*100;
                $porcentaje=number_format($porcentaje,1);
            ?>
        <tr style="<?= $estilo; ?>">
            <td style="border:3px solid black;"><?= $datos['codigo']??"----" ;?></td>
            <td style="border:3px solid black;"><?= $datos['nombre'] ??"----";?></td>
            <td style="border:3px solid black;"><?= $datos['total_contactos'] ??"----";?></td>
            <td style="border:3px solid black;"><?= $porcentaje ?? "----";?></td>
            <td style="border:3px solid black;"><?= $datos['ultima'] ?? "----";?></td>
            <td style="border:3px solid black;">
            <svg width=" 20" height="20">
                <rect width="<?= $datos['total_contactos']; ?>" height="14" y="3" fill="#0085c7" rx="2" />
            </svg>
            </td>
            <?php
                }
            ?>
        </tr>
    </table>
    <a href="inicio.php">Grabar más contactos</a>    <a href="salir.php">Cerrar sesión</a>
</body>
</html>