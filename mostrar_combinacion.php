<?php
session_start();
$n1=$_SESSION['circulos'];
$inicial=$_SESSION['combi_inicial'];
$final=$_SESSION['combi_Final'];

//EN ESTE ULTIMO FICHERO SE COMPARARÁ LAS DOS COMBINACIONES
// E IMPRIMIR UN MENSAJE CUAL SEA
if ($_SERVER["REQUEST_METHOD"] === "POST") {
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
    echo '<h1>Enhorabuena Paco, has acertado 🎉✨✨</h1> ';
    session_destroy();   
     }else{    
    session_destroy();   
    echo '<h1>Patrón equivocado 🧙🏿‍♂️🧙🏿‍♀️🧙🏿‍♂️</h1>';    
    }
    ?>

   <table>
        <tr>
            <?php
             foreach($inicial as $valor){
                ?>
            <td>
                <svg width="100" height="100">
                    <circle cx="40" cy="40" r="40" fill="<?= $valor ?>"></circle>
                </svg>
            </td>
            <?php 
            }
            ?>
        </tr>
        
        <tr>
            <?php
             foreach($final as $color){
                 ?>
            <td>
                <svg width="100" height="100">
                    <circle cx="40" cy="40" r="40" fill="<?= $color ?>"></circle>
                </svg>
            </td>
            <?php 
            }
            ?>
        </tr>
    </table>
          <form action="interfaz.php" method="POST">
            <button type="submit">Volver a jugar</button>
         </form>
</body>
</html>