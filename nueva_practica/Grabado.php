<?php
session_start();
$contador=0;
if($_SERVER['REQUEST_METHOD']==="POST"){
//Primero construyo las variables para poderlas comprpobar
    for($i=1;$i<=$_SESSION['pulsaciones'];$i++){
        //Primero intentaba leerlo y luego comprobarlo
        /*
        1.Conseguir el valor
        2.Luego comprobar
        */
        $campoNombre = 'nombre' . $i;
        $campoEmail  = 'email' . $i;
        $campoTlfn   = 'telefono' . $i;
        //Se comprueba si las variables existen en el post
        if (isset($_POST[$campoNombre]) && isset($_POST[$campoEmail]) && isset($_POST[$campoTlfn])){
        if (!empty($_POST[$campoNombre]) && !empty($_POST[$campoEmail]) && !empty($_POST[$campoTlfn])){
            $contador++;
            }
              //$_SESSION['contador']=$contador;
              print_r($_SESSION['contador']);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grabado</title>
</head>
<body>
    <h1>Agenda</h1>    
    <p style="background-color:font-weight:bold; font-size:20px;">Hola <?= $_SESSION['nombre']; ?></p>
    <p></p>
    <a href="index.php">Volver a loguearse</a>
    <br></br>
    <a href="agenda.php">Introducir más contactos para <?=$_SESSION['nombre']; ?></a>
    <br></br>
    <a href="Totales.php">Total de contactos guardados</a>
</body>
</html>