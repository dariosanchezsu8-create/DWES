<?php
define("emojis",[
"😺",
"🍕",
"🎶",
"🎈",
"👟",
"🛍️",
"🏀",
"🎾",
"🖋️",
"⌚"
]); 
$num=5;
function emojisDisponibles(int $num):array{
    $emojPartido=[];
    for($i=0;$i<$num;$i++){
        $emojPartido[]=emojis[$i];
    }
    return $emojPartido;

}
function emojiAleatorio(array $emojis){
    $cAleatorio=[];
    for($i=0;$i<count($c);$i++){
    $aleatorio=rand(0,count($c)-1);
    $cAleatorio[]=$c[$aleatorio];
    }
}

function validarContacto(array $c):array{
$errores=[];
$errorValor="";
$errorLen="";
$errorEmail="";
if(isset($_POST['name']) && isset($_POST['pwd']) && isset($_POST['email']) && isset($_POST['tlf'])){
    $errorValor="Campos obligatorios";
 }
 if(strlen($_POST['tlf']==9)){
    $errorLen="Telefono invalido";
 }
 if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $errorEmail="Correo inválido";
 }
    $errores=[
        $errorValor,
        $errorLen,
        $errorEmail
    ];
    return $errores;
}

function pintarFormularioContacto(int $i, string $emojis,array $valores,array $errores):string{
   

    
}

?>