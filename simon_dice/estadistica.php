<?php
session_start();
require_once 'conexion.php';
$usuario=[];
if($_SERVER['REQUEST_METHOD']){
$sql ="SELECT j.codigousu,u.Nombre AS Nombre, SUM(j.acierto) AS total_aciertos FROM jugadas j JOIN usuarios u ON j.codigousu = u.Codigo GROUP BY codigousu";
$stmt = $pdo->prepare($sql);
$stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadística.php</title>
</head>
<body>
    <form action="" method="POST">
            <h2>SIMON - Estadísticas Globales</h2>
            <h3>paco, los resultados son:</h3>
            <table style="border:1px solid black;">
                    <tr style="border:1px solid black; background-color:#90d5ff; ">
                        <td style="border:1px solid black;">Cód.</td>
                        <td style="border:1px solid black;">Nombre</td>
                        <td style="border:1px solid black;">Aciertos</td>
                        <td style="border:1px solid black;">Gráfica</td>
                    </tr>
                    <?php
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                    <tr>
                            <td style="border:1px solid black;"><?= $fila['codigousu']; ?></td>
                            <td style="border:1px solid black;"><?= @$fila['Nombre']; ?></td>
                            <td style="border:1px solid black;"><?= $fila['total_aciertos']; ?></td>
                            <td style="border:1px solid black;">
                                <svg width=" 20" height="20">
                                     <rect width="<?= $fila['total_aciertos']; ?>" height="14" y="3" fill="#0085c7" rx="2" />
                                </svg>
                            </td>

                    </tr>
                    <?php
                    }
                    ?>
                </table>
    </form>
    <form action="interfaz.php" method="POST">
        <button type="subt">Volver a jugar</button>
    </form>
    <form action="acceso.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>