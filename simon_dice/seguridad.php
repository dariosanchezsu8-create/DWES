<?php
session_start();
require_once 'conexion.php';
//function filtrar_acceso(){
    if($_SERVER['REQUEST_METHOD']=="POST"){
    if(!$_SESSION['tener']){
            if(isset($_POST['circulos']) && isset($_POST['colores'])){
                $_SESSION['crcl']=$_POST['circulos'];
                $_SESSION['clr']=$_POST['colores'];
                $crcl=$_SESSION['crcl'];
                $clr=$_SESSION['clr'];
                //$_SESSION['']
                $sql ="INSERT INTO configuracion (num_circulos,num_colores)  VALUES (:numCi,:numC)";
                $stmt=$pdo->prepare($sql);
                $stmt->execute([
                ':numCi' => $crcl,
                ':numC' => $clr
                ]);
                header('Location: pintar_circulos.php');
            }else{
                header('Location: acceso.php');
            }
    }else{
        echo 'Error compilación';
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
    <h1>PANEL DEL CONTROL</h1>
         <form action="" method="POST">
            <label for="circulos">Numero de círculos</label>
            <input type="text" name="circulos" value=7></input>     
            <br></br>            
            <label for="colores">Numero de colores</label>
            <input type="text" name="colores"></input>
            <br></br>
            <label for="color">Color </label>
            <input type="text" name="color">
            <br></br>
            <button type="submit">Jugar!!!</button>
        </form>
</body>
</html>