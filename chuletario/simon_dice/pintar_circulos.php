<?php
session_start();
require_once'conexion.php';
//Al enviar los datos por el header location estos no se envian
//por el metodo post si no con el metodo GET
//Para hacer los circulos haq que hacer una tabla
// y poner la etiqueta circle 
$n1=0;
$n2=0;
$sql ="SELECT num_circulos, num_colores FROM configuracion";
  $stmt=$pdo->prepare($sql);
  $stmt->execute();
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $n1=$fila['num_circulos'];
    $n2=$fila['num_colores'];
}
 //validacion de datos entre 4-8
 if($n1<4 || $n1>8){
    echo "El numero de circulos tiene que estar entre 4 y 8"."<br>";
    echo "<a href='interfaz.php'>Volver al formulario</a>";
    exit();//Detiene la ejecucion para que no siga
    }
 if($n2<4 || $n2>8){
    echo "El numero de colores tiene que estar entre 4 y 8"."<br>";
    echo "<a href='interfaz.php'>Volver al formulario</a>";
    exit();
    }
    echo $n1 ." ".$n1;
    $_SESSION['n_uno']=$n1;
    $_SESSION['n_dos']=$n2;
    $tmpExpiracion=time()+(86400*30);
    // if(isset($_POST['color'])){
    //     $color=$_POST['color'];
    //     setcookie('colo',$color,[
    //         'expires'=> $tExpiracion
    //     ]);
    //  }else{
    //     setcookie('colo',$color,[
    //         'expires'=> $tExpiracion,
    //         'path' =>'/'
    //     ]);
    //  }
    if(isset($_POST['color'])&& trim($_POST['color']) !== ''){
        $color=$_POST['color'];
        setcookie('col',$color,[
            'expires' => $tmpExpiracion,
            'path' => '/'
        ]);
        $colorFinal=$color;
        $_COOKIE['col']=$color;
    }else{
        $colorFinal = $_COOKIE['col'] ?? '';
              setcookie('col',$colorFinal,[
            'expires' => $tmpExpiracion,
            'path' => '/'
        ]);

    }

 $colores= array(
    "azul"=>"#0000FF",
    "rojo"=>"#FF0000",
    "verde"=>"#00FF00",
    "amarillo"=>"#FFFF00",
    "rosa"=>"#FFC0CB",
    "naranja"=>"#FFA500",
    "morado"=>"#800080",
    "gris"=>"#808080",
 );
 $_SESSION['paleta']=$colores;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imita el patrón</title>
</head>
<body style="background-color:<?=$_COOKIE['col'] ?? '#808080'; ?>;">
 <form action="eleccion.php" method="POST">
    <h1>COLORES SELECCIONADOS</h1>
    <table>
        <tr>
             <?php
             if (isset($colores) && is_array($colores) && !empty($colores)) {
                    global $colores,$n1;
                    //se obtienen todos los valores del array inicial
                    $listaValores = array_values($colores);
                    $listaClaves = array_Keys($colores);
                    //listaDef seleccionado los colores primeros que diga n2
                    $listaDef=array_slice($listaValores,0,$n2);
                    $listaKey=array_slice($listaClaves,0,$n2);

                    for($i=0;$i<$n1;$i++){
                        //crea un indice random dentro del rango 
                        $indice=array_rand($listaDef);
                        $colorDef=$listaDef[$indice];
                        $combinacion_inicial[]=$colorDef;

                ?>
                <td>
                    <svg width="100" height="100">
                        <circle cx="40" r="40" cy="40" fill="<?=$colorDef; ?>"></circle>
                    </svg>
                </td>
            <?php                           
                    }
             $_SESSION['combi_inicial']=$combinacion_inicial;
             $_SESSION['listaf']=$listaDef;
             $_SESSION['listaK']=$listaKey;
            }

            ?>
        </tr>
        <tr>
    </table>
        <button type="submit">Vamos a jugar!!!</button>

    </form>
    </body>
</html>





