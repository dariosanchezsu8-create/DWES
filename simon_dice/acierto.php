<?php
session_start();
$n1=$_SESSION['n_uno'] ?? 0;
$inicial=$_SESSION['combi_inicial'] ?? [];
$final=$_SESSION['combi_Final'] ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=º, initial-scale=1.0">
    <title>acierto</title>
</head>
<body>
    <h1>SIMON</h1>
    <h3>Enhorabuena Paco, has acertado 🎉✨✨</h3>
    <table>
    <tr>
            <?php
             foreach($final as $color){
                 ?>
            <td>
                <svg width="100" height="100">
                    <circle cx="40" cy="40" r="40" fill="<?= $color ?>"></circle>
                </svg>
            </td>
            <?php 
            }
            ?>
        </tr>
    </table>
    <br></br>
        <p>Se ha guardado en la base de datos (acierto=1)</p>
          <form action="acceso.php" method="POST">
            <button type="submit">Volver a jugar</button>
         </form>
         <form action="estadistica.php" method="POST">
                <button type="submit">Estadística</button>
        </form>
</body>
</html>