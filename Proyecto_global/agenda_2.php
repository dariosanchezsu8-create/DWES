<?php
// FASE 2: un bloque de formulario por cada emoji del lote (el nº sale SIEMPRE de la sesión).
session_start();
require_once 'funciones.php';

$pulsaciones = $_SESSION['pulsa'];
$listaDef=$_SESSION['listaDef'];
$contactos = [];   // valores escritos por el usuario
$errores = [];     // errores por contacto: $errores[$i]['email'][] = '...'

// Si se pulsó "Grabar contactos": validamos todos los bloques
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['gc'])) {
    $hayErrores = false;
    for ($i = 0; $i < $pulsaciones; $i++) {
        // Si el navegador no envió ese bloque, usamos un array vacío (daría errores de "campo vacío")
        $c = (isset($_POST['contactos'][$i]) && is_array($_POST['contactos'][$i])) ? $_POST['contactos'][$i] : [];
        $contactos[$i] = $c;
        $errores[$i] = validarContacto($c);
        if (!empty($errores[$i])) {
            $hayErrores = true;
        }
    }

    // Todo correcto: guardamos los contactos validados en sesión y pasamos a grabado.php,
    // que es quien los inserta en la BD.
    if (!$hayErrores) {
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
</head>
<body>
    <h1>AGENDA DE CONTACTOS</h1>
    <p>Usuario: <b><?= htmlspecialchars($_SESSION['nombre']) ?></b></p>

    <form action="" method="POST">
        <?php
        // Un bloque por emoji. Si es la primera vez, $contactos y $errores están vacíos
        // y el formulario sale en blanco; si hubo errores, conserva lo escrito y muestra los errores.
        for ($i = 0; $i <$pulsaciones;$i++) {
            echo pintarFormularioContacto($i, $listaDef[$i], $contactos[$i] ?? [], $errores[$i] ?? []);
        }
        ?>
        <button type="submit" name="gc">Grabar contactos</button>
    </form>
</body>
</html>