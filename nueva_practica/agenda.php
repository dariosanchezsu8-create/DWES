<?php
session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>
    <p style="font-weight:bold;font-size:20px;">Hola <?= $_SESSION['nombre'] ?></p>
        <form>
            <table style="border: 2px solid #000000;">
                <tr>
                    <?php
//                    $pulsaciones=$_SESSION['pulsaciones']++;
                    for($i=0;$i<$_SESSION['pulsaciones'];$i++){
                    ?>
                    <td style="border: 2px solid #000000;">
                        <h3>CONTACTO <?= $i+1; ?></h3>
                        Nombre: <input type="text" name="nombre<?= $i+1; ?>"><br>
                        Email: <input type="email" name="email<?= $i+1; ?>"><br>
                        Teléfono: <input type="tel" name="telefono<?= $i+1; ?>">
                    </td>
                    <?php
                    }
                    ?>
                </tr>
            </table>
        </form>
        <br></br>
    <button type="submit" name="gr">Grabar<button>
</body>
</html>