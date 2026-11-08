<?php
session_start();
require_once 'conexion.php';
require_once 'funciones.php';
/*
2. Hacer que siempre haya un emoji e implementarlo luego en la logica
3. Hacer logica de al dar al boton incrementar 
*/
if($_SERVER['REQUEST_METHOD']==="POST"){
    $pulsaciones=1;    
    $sql ="SELECT max_Lote,num_emojis,max_contactos FROM configuracion";
        $stmt=$pdo->prepare($sql);
        $stmt->execute();

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio.php</title>
</head>
<body>
    <h1>AGENDAS DE CONTACTOS</h1>
    <p>Usuario: <?=$_SESSION['nombre']; ?> · Contactos a grabar: <?= "numero";?></p>
    <form action="" method="`POST">
        <tabla>
            <tr>
                <td><?= $emojis[0]; ?></td>
                <?php
                    while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if(isset($fila['max_lote'])&& isset($fila['num_emojis'])&& isset($fila['max_contactos'])){
                            if(!$pulsaciones<$fila['maxLote']){
                                $emojis[$pulsaciones];
                                $pulsaciones++;
                            }
                        }

                    ?>
                <td><td>
                    <?php
                        }
                    ?>
            </tr>

        </table>

       <button type="submit">INCREMENTAR</button> 
    </form>
    <form action="grabado.php" method="POST">
           <button type="submit">GRABAR</button> 
    </form>
</body>
</html>