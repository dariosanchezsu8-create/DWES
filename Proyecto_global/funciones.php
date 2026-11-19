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
function emojisDisponibles(int $num):array{
    $emojPartido=[];
    for($i=0;$i<$num;$i++){
        $emojPartido[]=emojis[$i];
    }
    return $emojPartido;

}
function emojiAleatorio(array $emojis):array{
    $cAleatorio=[];
    for($i=0;$i<count($c);$i++){
    $aleatorio=rand(0,count($c)-1);
    $cAleatorio[]=$c[$aleatorio];
    }
    return $cAleatorio;
}

function validarContacto(array $c):array{
$errores=[];
$errorValor="";
$errorLen="";
$errorEmail="";
if(isset($_POST['name']) && isset($_POST['pwd']) && isset($_POST['email']) && isset($_POST['tlf'])){
    $errorValor="Campos obligatorios";
 }
 if(strlen($_POST['tlf']==9) && !preg_match('/^[0-9]{9}$/',trim($c['tlf']))){
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
    /*
    1.Entopnces primero recorrer todos los contactos
    2.sacar los errores del array
    3.En el html se pone la condicion y se muestra el error 
    asi como los valores de los campos
    */

        $errorNombre=$errores['errorValor'];
        $errorLen=$errores['errorLen'];
        $errorEmail=$errores['errorEmail'];
       $html .=" <h3>CONTACTO <?= $i+1; ?></h3>";
        for($k=0;$k<$i;$k++){
        $html .= "Nombre: <input type="text" name="nombre<?= $i+1;?>" value="<?= valores[$i]['nombre'];?>">";
        //Realizar un funcion que compruebe  los campos 
        //con los diferentes errores que puede dar=$errores

        $html .= "Apellidos: <input type="text" name="apellidos<?= $i+1;?>" value="<?= valores[$i]['apellidos'];?>">";
        //Asi con todos
        $html .="<br>";
        $html .= "Email: <input type="email" name="email<?= $i+1;?>" value="<?= valores[$i]['email'];?>">";
        $html .=" Teléfono: <input type="tel" name="telefono<?= $i+1;?>"value="<?= valores[$i]['tlf'];?>">";
        
    }
    }
   }




?>