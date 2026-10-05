<?php
//PRACTICA 3:FUNCIONES

function ecuacion_segunda(float $a,float $b,float $c){
$devuelve=false;   
if($a===0){
    echo $devuelve;
    }
$exponente=pow($b,2);
$raiz=sqrt($exponente-4*$a*$c);
if($raiz<0){
    echo $devuelve;
}else{
$denominador=2*$a;
$opcion1=(-$b+$raiz)/$denominador;
$opcion2=(-$b-$raiz)/$denominador;
if(is_numeric($opcion1) && is_numeric($opcion2)){
    $array=[$opcion1,$opcion2];
    $devuelve=true;
    echo $devuelve;
    print_r($array);
}else{
    echo $devuelve;
}
}
}


?>