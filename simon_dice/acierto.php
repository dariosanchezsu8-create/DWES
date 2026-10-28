<?php
require_once 'conexion.php';
session_start();
$n1=$_SESSION['n_uno'] ?? 0;
$inicial=$_SESSION['combi_inicial'] ?? [];
$final=$_SESSION['combi_Final'] ?? [];

if($_SERVER['REQUEST_METHOD']==="POST"){
//2.Comprobar que el usuario existe con la select
 $sql ="SELECT Codigo, Nombre , Clave FROM USUARIOS";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
$existe=false;
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    if($fila['Nombre']==$_SESSION['user'] && $fila['Clave']==$_SESSION['passwrd']){
        echo 'Usuario válido';
        $usuNuevo2=$fila['Codigo'];
        $contra2=1;
        //3.Hacer el insert del acierto en la tabla de jugadas
        $sql ="INSERT INTO jugadas (codigousu,acierto) VALUES (:codUsu,:acierto)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute([
        ':codUsu' => $usuNuevo2,
        ':acierto' => $contra2,
        ]);
    }
}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=º, initial-scale=1.0">
    <title>acierto</title>
</head>
<body>
    <h1>SIMON</h1>
    <h3>Enhorabuena Paco, has acertado 🎉✨✨</h3>
    <table>
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
        <p>Se ha guardado en la base de datos (acierto=1)</p>
          <form action="interfaz.php" method="POST">
            <button type="submit">Volver a jugar</button>
         </form>
         <form action="estadistica.php" method="POST">
                <button type="submit">Estadística</button>
        </form>
</body>
</html>