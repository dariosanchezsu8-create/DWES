<?php
session_start();
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
$c[]=$_SESSION['paleta'];
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
            ?>
            <td>
                <button type="submit" ?>name="btn_pulsado" value="<?= $identificadores[$i]; ?>""style="background-color:<?= $listaDef[$i];?>;width: 70px; height: 30px;"><?= $listaK[$i]; ?></button>
            </td>
     <?php        
            }

            for ($i = 0; $i < $listaDef2; $i++) {
                for ($j = 0; $j < count($identificadores); $j++) {
                     $id_actual = $identificadores[$j];
                         if (isset($_GET['btn_pulsado']) === $id_actual) {
                                $listaDef2[$i]=$c[$i];
                    }
                    break;
                }
            }
        ?>
        </tr>   
    </table>
</body>
</html>