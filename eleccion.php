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
               foreach($combinacion_inicial as $valor){
                    $clave =array_search($valor,$c);
            ?>
            <td>
                <button type="submit" style="background-color:<?= $valor;?>;"><?= $clave; ?></button>
            </td>
     <?php        
            }
        ?>
        </tr>   
    </table>
</body>
</html>