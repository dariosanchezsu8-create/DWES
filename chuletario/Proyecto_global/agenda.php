<?php
session_start();
require_once 'funciones.php';

$pulsaciones = $_SESSION['pulsa'];
$listaDef=$_SESSION['listaDef'];
$contactos = [];   
$errores = [];     

if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['gc'])) {
    $hayErrores = false;
    for ($i = 0; $i < $pulsaciones; $i++) {
        $c = (isset($_POST['contactos'][$i]) && is_array($_POST['contactos'][$i])) ? $_POST['contactos'][$i] : [];
        $contactos[$i] = $c;
        $errores[$i] = validarContacto($c);
        if (!empty($errores[$i])) {
            $hayErrores = true;
        }
    }

    if ($hayErrores==false) {
        $_SESSION['contactos_lote'] = $contactos;
        header("Location: grabado.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda.php</title>
    <link rel="stylesheet" href="css.css">
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <p>Usuario: <b><?= htmlspecialchars($_SESSION['nombre']) ?></b></p>

    <form action="" method="POST">
        <?php
        for ($i = 0; $i <$pulsaciones;$i++) {
            echo (string) pintarFormularioContacto($i, $listaDef[$i], $contactos[$i] ?? [], $errores[$i] ?? []);
        }
        ?>
        <button type="submit" name="gc">Grabar contactos</button>
    </form>
</body>
</html>