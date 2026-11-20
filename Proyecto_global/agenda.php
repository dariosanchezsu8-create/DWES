<?php
session_start();
require_once 'funciones.php';
$listaDef=$_SESSION['listaDef'];
$contactos=[];
$errores=[];
if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['contactos'])){
        $contactos=$_POST['contactos']??[];
        for ($i = 0; $i < $_SESSION['pulsa']; $i++){
        $errores[$i]=validarContacto($contactos[$i])??[];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p style="font-weight:bold;font-size:20px;">Usuario: <?= $_SESSION['nombre'] ?></p>
    <form action="" method="POST"> 
     <?php              
            for($i=0;$i<$_SESSION['pulsa'];$i++){

        ?>
    <div><?= pintarFormularioContacto($i,$listaDef[$i],$contactos[$i]=[],$errores[$i]=[]); ?></div>
        <?php
            }     
        ?>
        <br></br>
    <button type="submit" name="gr">Grabar Contactos</button>
    </form>
</body>
</html>