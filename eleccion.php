<?php
session_start();
if($_SERVER["REQUEST_METHOD"]==="POST"){

$inicial=[
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    ];
$n1 = $_SESSION['circulos'] ?? 0;
$n2 = $_SESSION['colores']?? 0;
$c=$_SESSION['paleta'];
$listaDef=$_SESSION['listaf'];
$listaK=$_SESSION['listaK'];
$identificadores=[];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Imita el patrón</h1>
    <form action="" method="POST">
    <table>
        <tr>    
            <?php
            $combi=array_slice($inicial,0,$n2);
                for($i=0;$i<$n1;$i++){
                    $colorActual=$combi[$i];
            ?>
            <td>
                <svg width="200" height="200">
                    <circle cx="40" r="40" cy="40" fill="<?= $colorActual;?>"></circle>
                </svg>
           </td>
               <?php        
            }
        ?>
        </tr>
        <tr>
            <?php
            //para que el lote se vacie
            // Si el lote no existe, lo creamos vacío
            if (!isset($_SESSION['lote'])) {
                $_SESSION['lote'] = [];
            }
                if($_SERVER["REQUEST_METHOD"]==="POST"){
                    //Hay que quitar el espacio de cada indice 
                    if(isset($_POST['btn']) && count($_SESSION['lote'])<$n1){
                        //solo añadimos si no hemo llegado a 4
                    $valor=(int) trim($_POST['btn']);
                $_SESSION['lote'][] = $valor;
                    $lote=$_SESSION['lote'];
                $jugada=[];
                $lote=($_SESSION['lote']);
                foreach($lote as $color){
                    $jugada[]=$listaDef[$color];
                }
                $_SESSION['combi_Final']=$jugada;
                }else{
                    $_SESSION['lote']=[];

            }
                }
            /*
            Pintar el primero circulo 
            actualizo el contenido de combi_final q este esta guardado en session
            */
                $jugada=$_SESSION["combi_Final"];
                foreach($jugada as $valor){
            ?>
            <td>
                <svg width="200" height="200">
                    <circle cx="40" r="40" cy="40" fill="<?= $valor;?>"></circle>
                </svg>
            </td>
                        <?php
                 }
                }
                ?>
        </tr>
        <tr>
            <?php

               for($i=0;$i<$n2;$i++){
                $id_actual=$i;
                $identificadores=$id_actual;
            ?>
            <td>
                <button type="submit" name='btn' value="<?= $id_actual ?>
                "style="background-color:<?= $listaDef[$i];?>; width: 70px; height: 30px;"><?= $listaK[$i]; ?></button>
            </td>
     <?php        
               }
        ?>
        </tr>   
    </table>
</form>
</body>
</html>

<?php
}
?>