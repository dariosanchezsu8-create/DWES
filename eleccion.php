<?php
include_once 'pintar_circulos.php';
$inicial=[
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
    "#000000",
   " #000000"
    ];
$n1 = $_POST['circulos'] ?? $n1 ?? 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>    
            <?php
                for($i=0;$i<$n1;$i++){
                    ?>
            <td>
                <svg width="200" height="200">
                    <circle cx="40" r="40" cy="40" fill="<?= $inicial[$i];
            ?>?>"></circle>
                </svg>
           </td>
            <?php        
            }
            ?>
        </tr>
    </table>
</body>
</html>