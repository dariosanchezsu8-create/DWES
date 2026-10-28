<?php
session_start();

// function sumatorioAciertos($aciertos,$codUsu){

// }

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
                    <tr>

                    </tr>
                    <tr>

                    </tr>
                    <tr>

                    </tr>
            </table>
    </form>
    <form action="interfaz.php" method="POST">
        <button type="submit">Volver a jugar</button>
    </form>
    <form action="acceso.php" method="POST">
        <button type="submit">Cerrar sesión</button>
    </form>
</body>
</html>