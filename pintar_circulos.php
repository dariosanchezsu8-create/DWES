<?php
//Para hacer los circulos haq que hacer una tabla
// y poner la etiqueta circle 
if($_SERVER["REQUEST_METHOD"]==="POST"){
 n1=$_SERVER['circulos'];
 n2=$_SERVER['colores'];
 $colores=(
    "azul"=>"0000FF",
    "rojo"=>"FF0000",
    "verde"=>"00FF0",
    "amarillo"=>"FFFF00",
    "naranja"=>"FFFF00",
    "rosa"=>"FFA500",
    "gris"=>"800080",
    "morado"=>"808080",
 );
}
?>
    <table>
        <?php
        <svg width="200" height="200">
        function circulos($colores,nC,nCo){
            for($Colores as $valor=>$color){

    }
    ?>
        <circle cx="150" cy="50" fill="<?=$color ?>"></circle>
        </svg>
<?php
}
?>
    </table>
    











?>