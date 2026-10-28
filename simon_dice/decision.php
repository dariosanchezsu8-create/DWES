<?php
session_start();
$n1=$_SESSION['n_uno'] ?? 0;
$inicial=$_SESSION['combi_inicial'] ?? [];
$final=$_SESSION['combi_Final'] ?? [];
if($_SERVER['REQUEST_METHOD']==="POST"){
    if(isset($_SESSION['combi_inicial']) && isset($_SESSION['combi_Final'])){
$n1=$_SESSION['circulos']?? 0;
$inicial=$_SESSION['combi_inicial'];
$final=$_SESSION['combi_Final'];
$contador=0; 
$_SESSION['contador']=$contador;

for($i=0;$i<$n1;$i++){ 
    if($inicial[$i]===$final[$i]){
        $_SESSION['contador']++;
        }
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
    <?php
     if($_SESSION['contador']==$n1){    
            header("Location: acierto.php");
     }else{    
            header("Location: fallo.php");    
    }
    ?>

</body>
</html>