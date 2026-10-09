<?php
//Para hacer los circulos haq que hacer una tabla
// y poner la etiqueta circle 
if($_SERVER["REQUEST_METHOD"]==="POST"){
 $n1=$_POST['circulos'] ?? 0;
 $n2=$_POST['colores']?? 0;
 if($n1<4 && $n1>8){
    echo "El numero de circulos tiene que estar entre 4 y 8";
 }
 if($n2<4 && $n2>8){
    echo "El numero de colores tiene que estar entre 4 y 8";
    
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
}
?>
 <form action="eleccion.php" method="POST">
    <h1>COLORES SELECCIONADOS</h1>
    <table>
        <tr>
             <?php
             if (isset($colores) && is_array($colores) && !empty($colores)) {
                    global $colores,$n1;
                    //se obtienen todos los valores del array inicial
                    $listaValores = array_values($colores);
                    $listaDef=array_slice($listaValores,0,$n2);

                    for($i=0;$i<$n1;$i++){
                        $indice=array_rand($listaDef);
                        $colorDef=$listaDef[$indice];

                ?>
                <td>
                    <svg width="200" height="200">
                        <circle cx="40" r="40" cy="40" fill="<?=$colorDef; ?>"></circle>
                    </svg>
                </td>
            <?php           
                        }
             }
            ?>
        </tr>
        <tr>
    </table>
        <button type="submit">Vamos a jugar!!!</button>
    </form>
    





