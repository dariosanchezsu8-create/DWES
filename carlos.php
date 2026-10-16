<?php
session_start();

//if($_SERVER['REQUEST_METHOD']=="POST"){
//$_SESSION['combi']=$combinacion;

if(!isset($_POST['btn'])){
    $_SESSION['combinacion']=["negro","negro","negro","negro"];
    $_SESSION['pulsaciones']=0;
}else{
    $_SESSION['combinacion'][$_SESSION['pulsaciones']]=$_POST['btn'];
    $_SESSION['pulsaciones']++;
    var_dump($_SESSION['combinacion']);

    }
//}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>  
    <form action="" method="POST">
        <br></br>
        <button type="submit" name="btn" value="rojo">Rojo</button>
        <button type="submit" name="btn" value="verde">Verde</button>  
</form>
        
</body>
</html>