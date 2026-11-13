<?php
session_start();
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(!isset($_SESSION['n'])){
          $_SESSION['n']=0;
    }

    if(isset($_POST['menos'])){
        $_SESSION['n']--;
    }elseif(isset($_POST['mas'])){
        $_SESSION['n']++;
    }elseif(isset($_POST['cero'])){
        $_SESSION['n']=0;
    }else{
        echo "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificacion.php</title>
</head>
<body>     
    <h1>SUBIR Y BAJAR NUMERO</h1>
    <p>Haga clic en los botones para modificar el valor:</p>
    <form action="" method="POST">
            <button type="submit" name="menos">-</button>
            <?=$_SESSION['n'];?>
            <button type="submit" name="mas">+</button>
            <br></br>
            <button type="submit" name="cero">Poner a cero</button>
    </form>
</body>
</html>