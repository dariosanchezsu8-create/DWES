<?php
session_start();
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(!isset($_SESSION['pos'])){
        $_SESSION['pos']=200;
    }elseif($_SESSION['pos']==400 ||  $_SESSION['pos']==0){
            $_SESSION['pos']=200;
    }else{
    if(isset($_POST['izq'])){
        $_SESSION['pos']-=10;

    }elseif(isset($_POST['dch'])){
        $_SESSION['pos']+=10;
    }elseif(isset($_POST['centro'])){
        $_SESSION['pos']=200;
    }else{
        echo "Error";
    }
    }

}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo.php</title>
</head>
<body>
    <h1>MOVER UN PUNTO A DERECHA E IZQUIERDA</h1>
    <p>Haga clic en los botones para mover el punto:</p>
    <form action="" method="POST">
            <button type="submit" name="izq">👈</button>
            <button type="submit" name="dch">👉</button>
            <svg width="600px" height="50px">
                <line x1="0" y1="25px" x2="400px" y2="25px" stroke="black" stroke-width="3"></line>
                <circle cx="<?=$_SESSION['pos']; ?>" r="5" cy="25px" fill="red"></circle>
            </svg>
            <br><br>
            <button type="submit" name="centro">Volver al centro</button>
    </form>
</body>
</html>