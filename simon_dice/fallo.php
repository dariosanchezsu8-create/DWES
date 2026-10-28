<?php
session_start();
$n1=$_SESSION['n_uno'] ?? 0;
$inicial=$_SESSION['combi_inicial'] ?? [];
$final=$_SESSION['combi_Final'] ?? [];

// //EN ESTE ULTIMO FICHERO SE COMPARARÁ LAS DOS COMBINACIONES
// // E IMPRIMIR UN MENSAJE CUAL SEA
// if ($_SERVER["REQUEST_METHOD"] === "POST") {
//     if(isset($_SESSION['combi_inicial']) && isset($_SESSION['combi_Final'])){
// $n1=$_SESSION['circulos']?? 0;
// $inicial=$_SESSION['combi_inicial'];
// $final=$_SESSION['combi_Final'];
// $contador=0; 
// $_SESSION['contador']=$contador;

// for($i=0;$i<$n1;$i++){ 
//     if($inicial[$i]===$final[$i]){
//         $_SESSION['contador']++;
//         }
//       }
//    }
//}


if($_SERVER['REQUEST_METHOD']==="POST"){
//2.Comprobar que el usuario existe con la select
 $sql ="SELECT Codigo, Nombre , Clave FROM USUARIOS";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
$existe=false;
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['Nombre']==$_SESSION['user'] && $fila['Clave']==$_SESSION['passwrd']){
        echo 'Usuario válido';
        $usuNuevo3=$fila['Codigo'];
        $contra3=1;
        //3.Hacer el insert del acierto en la tabla de jugadas
        $sql ="INSERT INTO jugadas (codigousu,acierto) VALUES (:codUsu,:acierto)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
        ':codUsu' => $usuNuevo3,
        ':acierto' => $contra3,
        ]);
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
<body style="background-color:<?=$_COOKIE['col'] ?? "#808080"; ?>;">
    <?php
    //  if($_SESSION['contador']==$n1){    
    // echo '<h1>Enhorabuena Paco, has acertado 🎉✨✨</h1> ';
    // session_destroy();   
    //  }else{    
    // session_destroy();   
    // echo '<h1>Patrón equivocado</h1>';    
    // }
    ?>
 <h1>Patrón equivocado❌❗❗</h1>    
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
    <br></br>
    <p>Se ha guardado en la base de datos (acierto=0)</p>
    <br></br>
          <form action="interfaz.php" method="POST">
            <button type="submit">Volver a jugar</button>
         </form>
         <form action="estadistica.php" method="POST">
            <button type="submit">Estadística</button>
        </form>
</body>
</html>