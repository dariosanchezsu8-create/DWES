<?php
session_start();
                echo $_SESSION['psswrd'];

//Recuperar variables de sesión de forma segura con valores por defecto
$n1 = $_SESSION['n_uno'] ?? 0;
$n2 = $_SESSION['n_dos'] ?? 0;
$listaDef = $_SESSION['listaf'] ?? [];
$listaK = $_SESSION['listaK'] ?? [];


// Inicializar arrays en sesión si no existen
if (!isset($_SESSION['lote'])) {
    $_SESSION['lote'] = [];
}
if (!isset($_SESSION['combi_Final'])) {
    $_SESSION['combi_Final']  = [];
}

// 2. Procesar la petición POST cuando se pulsa un botón de color
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['reiniciar'])) {
        $_SESSION['lote'] = [];
        $_SESSION['combi_Final'] = [];
    }

    if (isset($_POST['btn']) && count($_SESSION['lote']) < $n1) {
        $valor = (int) $_POST['btn']; 
        $_SESSION['lote'][] = $valor;

        $jugada = [];
        foreach ($_SESSION['lote'] as $color) {
            if (isset($listaDef[$color])) {
                $jugada[] = $listaDef[$color];
            }
        }
        $_SESSION['combi_Final'] = $jugada;
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imita el patrón</title>
</head>
<body style="background-color:<?=$_COOKIE['col'] ?? "#808080";?>;">
    <h1>Imita el patrón</h1>
    
    <form action="" method="POST">
        <table>
            <tr>
                <?php 
                for ($i = 0; $i < $n1; $i++){
                    // Por defecto el círculo es negro
                    $color_circulo = "#000000"; 
                    
                    // Si el usuario ya ha elegido un color para esta posición, lo sustituimos
                    if (isset($_SESSION['combi_Final'][$i])) {
                        $color_circulo = $_SESSION['combi_Final'][$i];
                    }
                ?>
                <td>
                    <svg width="100" height="100">
                        <circle cx="40" cy="40" r="40" fill="<?= $color_circulo; ?>"></circle>
                    </svg>
                </td>
                <?php 
                }
                ?>
            </tr>

            <tr>
                <?php 
                for ($i = 0; $i < $n2; $i++){
                ?>
                <td>
                    <button type="submit" name="btn" value="<?= $i; ?>" style="background-color: <?= $listaDef[$i] ?? '#ccc'; ?>; width: 70px; height: 30px;">
                        <?= $listaK[$i] ?? ''; ?>
                    </button>
                </td>
                <?php
                 }
                ?>
            </tr>
        </table>
        <br>
        <button type="submit" name="reiniciar">Reiniciar</button>
   </form>
   <br> 
   <form action="decision.php" method="POST">
        <input type="submit" value="Enviar combinación">
    </form>

</body>
</html>