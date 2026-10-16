<?php
session_start();

//Recuperar variables de sesión de forma segura con valores por defecto
$n1 = $_SESSION['circulos'] ?? 0;
$n2 = $_SESSION['colores'] ?? 0;
$listaDef = $_SESSION['listaf'];
$listaK = $_SESSION['listaK'];

// Inicializar arrays en sesión si no existen
if (!isset($_SESSION['lote'])) {
    $_SESSION['lote'] = [];
}
if (!isset($_SESSION['combi_Final'])) {
    $_SESSION['combi_Final'] = [];
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
<body>
    <h1>Imita el patrón</h1>
    
    <form action="" method="POST">
        <table>
            <tr>
                <?php 
                for ($i = 0; $i < $n1; $i++){
                ?>
                <td>
                    <svg width="100" height="100">
                        <circle cx="40" cy="40" r="40" fill="#000000"></circle>
                    </svg>
                </td>
                <?php 
                }
                 ?>
            </tr>

            <tr>
                <?php 
                $jugada = $_SESSION["combi_Final"];
                foreach ($jugada as $color){
                ?>
                <td>
                    <svg width="100" height="100">
                        <circle cx="40" cy="40" r="40" fill="<?= $color; ?>"></circle>
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
                    <button type="submit" name="btn" value="<?= $i; ?>" style="background-color: <?= $listaDef[$i]; ?>; width: 70px; height: 30px;">
                        <?= $listaK[$i]; ?>
                    </button>
                </td>
                <?php
                 }
                 ?>
            </tr>
        </table>
        <br></br>
    <button type="submit" name="reiniciar">Reiniciar</button>
   </form>
    <br></br> 
   <form action="mostrar_combinacion.php" method="POST">
        <input type="submit"></input>
    </form>

</body>
</html>