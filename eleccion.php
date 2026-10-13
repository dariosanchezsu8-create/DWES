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
$combinacion_inicial=$_SESSION['combi_inicial'];
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
            $listaDef2=array_slice($inicial,0,$n2);
                for($i=0;$i<$n1;$i++){
                    $colorActual=$listaDef2[$i];
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

               for($i=0;$i<$n2;$i++){
                $id_actual=$i;
                $identificadores=$id_actual;
            ?>
            <td>
                <button type="submit" name='btn' value="<?= $id_actual ?>"style="background-color:<?= $listaDef[$i];?>; width: 70px; height: 30px;"><?= $listaK[$i]; ?></button>
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
                    if(isset($_POST['btn']) && count($_SESSION['lote'])<$n1){
                        //solo añadimos si no hemo llegado a 4
                    $valor=$_POST['btn'];
                $_SESSION['lote'][] = $valor;
                    $lote=$_SESSION['lote'];
                 var_dump($lote);
                }else{
                    $_SESSION['lote']=[];

            }
            /*
            $combinacion_Final = [];
            foreach($lote as $color){
                    $combinacion_Final[]=$listaK[$color];
            }
            $_SESSION['combi_final']=$combinacion_Final;
            for($i=0;$i<$n2;$i++){
                $valor=$combinacion_Final;
            }
*/
            ?>
            <td>
                <br></br>
                <input type="submit"></input>
            </td>
            <!--
            <td>
                <svg width="200" height="200">
                    <circle cx="40" r="40" cy="40" fill="<?= $valor;?>"></circle>
                </svg>
            </td>
-->
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