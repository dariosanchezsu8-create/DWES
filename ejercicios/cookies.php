<?php
$color=$_POST['color'];
$tExpiracion=time()+(86400*30);
setcookie('col',$color,[
'expires'=>$tExpiracion
]);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:<?=$_COOKIE['col'];?>;">
    <form action="" method="POST";>
        Color Aplicacion: <input type="text" name="color">
        <button type="text" name="guardar">Guardar Cookie</button>
    </form>
</body>
</html>