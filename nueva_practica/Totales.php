<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totales</title>
</head>
<body>
    <h1>Agenda</h1>    
    <p style="background-color:font-weight:bold; font-size:20px;">Hola <?= $_SESSION['nombre']; ?></p>
    <table style="border:1px solid black;">
        <tr>
            <td style="border:1px solid black;">Código de Usuario</td>
            <td style="border:1px solid black;">Nombre</td>
            <td style="border:1px solid black;">Numero de contactos</td>
            <td style="border:1px solid black;">Grafica</td>            
        </tr>
        <tr>
            <?php
            $numeroAleatorio = mt_rand(1, 50);
            ?>
            <td style="border:1px solid black;"><?=$numeroAleatorio;?></td>
            <td style="border:1px solid black;"><?= $_SESSION['nombre'];?></td>
            <td style="border:1px solid black;"><?=$_SESSION['contador'];?></td>
            
            <td style="border:1px solid black;">
                <?php
                for($i=0;$i<$_SESSION['contador'];$i++){
                ?>
                    <svg width="50" height="50">
                        <circle cx="20" r="20" cy="20" fill="#FF0000 "></circle>
                    </svg>
            <?php
                }
            ?>
            </td>
        </tr>       
    </table>
    <a href="index.php">Volver a loguearse</a>
    <br></br>
    <a href="agenda.php">Introducir más contactos para <?=$_SESSION['nombre']; ?></a>

</body>
</html>