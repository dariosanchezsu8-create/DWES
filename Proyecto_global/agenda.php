<?php
session_start();
require_once 'funciones.php';
$listaDef=$_SESSION['listaDef'];
$contactos=[];
$errores=[];
$muestra="";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agenda.php</title>
</head>
<body>  
    <form action="" method="POST">
        <h1>AGENDA DE CONTACTOS</h1>
        <p>Usuario:<?= $_SESSION['nombre'] ?></p>
        
        <?php
        if($_SERVER['REQUEST_METHOD']==="POST" && isset($_POST['gc'])){
                $contactos=$_POST['contactos']??[];
                for ($i = 0; $i < $_SESSION['pulsa']; $i++){
                    $contacto=(isset($_POST['contactos'][$i]) && is_array($_POST['contactos'][$i]))? $_POST['contactos'][$i]: [];
                    $errores[$i]=validarContacto( $contacto);
                    echo pintarFormularioContacto($i,$listaDef[$i],$contacto,$errores[$i]); 
                }
             }else{
                 for ($i = 0; $i < $_SESSION['pulsa']; $i++){

        ?>
        <div>
            <?= $listaDef[$i]; ?>
        </div>

        <fieldset>
            <label for="nombre">Nombre</label>
            <input type="text" name="contactos[<?= $i ?>][nombre]">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="contactos[<?= $i ?>][apellido]">
            <br>
            <label for="telefono">Teléfono</label>
            <input type="text" name="contactos[<?= $i ?>][tlf]">
            <label for="">Email</label>
            <input type="text" name="contactos[<?= $i ?>][email]">
        </fieldset>
        <br></br>
        <?php
         
         }
        }
            ?>
        <button type="submit" name="gc">Grabar Contacto</button>
    </form>
</body>

</html>