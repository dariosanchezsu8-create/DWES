<?php
//EJERCICIO 1
//$valor=" Es tu nombre O\'reilly? ";
//$resultado=trim($valor);
$resultado=stripslashes($valor);//quita simbolos 
//echo $resultado;
//EJERCICIO 2
function test_entrada($valor){
    $valor=trim($valor);
    $valor=stripslashes($valor);
    return $valor;
}

?>
