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
function emojiAleatorio(array $emojPartido):array{
    $aleatorio=[];
    for($i=0;$i<count($emojPartido);$i++){
        $indice=rand(0,count($emojPartido)-1);
        $aleatorio[]=$emojPartido[$indice];
    }
    return $aleatorio;
}

function validarContacto(array $c):array{
/*
1.Validar todos los campos mediante condiciones
2.Guardarlos todos los errroes de un campo en un array
3. Devolver si esta bien un array vacio. En caso de que no
se devolverá un array asociativo con el nombre de cada campo
y el array con el cojunto de errores que puede tener ese campo
*/
$errores=[];
$errorNombre="";
$errorApellido="";
$errorEmail="";
$errorTlf="";
//Errores Posibles campo Nombre
if(isset($c['nombre'])){
    $nombre=$c['nombre'];
if(strlen($nombre<=2)){
       $errorNombre="Longitud de campo inválida";
    }else{
        if(!preg_match('/^[\p{L}\s\-\']+$/u',$nombre)){
            $errorNombre="Nombre inválido";
        }
    }
}else{
    $errorNombre="Campo Vacío";
}
if($errorNombre!==""){
    $errores['nombre']=$errorNombre;
}
//Errores Posibles campo Apellidos
if(isset($c['apellido'])){
    $apellido=$c['apellido'];
    if(strlen( $apellido)<=2){
    $errorApellido="Longitud de campo inválida";
    }else{
        if(!preg_match('/^[\p{L}\s\-\']+$/u',  $apellido)){
            $errorApellido="Apellido inválido";
    }
}
}else{
    $errorApellido="Campo vacío";
}
if($errorApellido!==""){
     $errores['apellido']=$errorApellido;
}

//Errores Posibles campo Telefono
if(isset($c['tlf'])){
    $tlf=$c['apellido'];
    $errorTlf="Campo Vacío";
if(strlen($tlf)<9){
    $errorTlf="Teléfono inválido";
}else{
    if(!preg_match('/^\d{9}$/',  $tlf)) {
        $errorTlf ="Teléfono inválido";
      }
    }
}else{
    $errorTlf="Campo vacío";
}
if($errorTlf!==""){
     $errores['tlf']=$errorTlf;
}

//Errores Posibles campo Email
if(isset($c['email'])){
    $email=$c['email'];
}
     if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errorEmail="Correo inválido";
} else{
    $errorEmail="Campo vacío";
}    
if($errorEmail!==""){
    $errores['email']=$errorEmail;
}
return $errores;
}
    function pintarFormularioContacto(int $i, string $emojis,array $valores,array $errores):string{
        $num = $i + 1;

        //Ejemplo =0'Conner Sin ENT_QUOTES partiria a la mitad el valor
        //Esto es opocional pero maas claridad evitar error de undefined array key
        $nombre   = htmlspecialchars($valores['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars($valores['apellido'] ?? '', ENT_QUOTES, 'UTF-8');
        $email    = htmlspecialchars($valores['email'] ?? '', ENT_QUOTES, 'UTF-8');
        $tlf      = htmlspecialchars($valores['tlf'] ?? '', ENT_QUOTES, 'UTF-8');

$html  = "<fieldset>\n";
    $html .= "  <legend>Contacto {$num} {$emojis}</legend>\n";

    $html .= "  <label>Nombre:</label>\n";
    $html .= "  <input type=\"text\" name=\"contactos[{$i}][nombre]\" value=\"{$nombre}\">\n";
    if (!empty($errores['nombre'])) {
        foreach ($errores['nombre'] as $error) {
            $html .= "  <div class=\"error\">" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</div>\n";
        }
    }

    $html .= "  <br><label>Apellido:</label>\n";
    $html .= "  <input type=\"text\" name=\"contactos[{$i}][apellido]\" value=\"{$apellido}\">\n";
    if (!empty($errores['apellido'])) {
        foreach ($errores['apellido'] as $error) {
            $html .= "  <div class=\"error\">" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</div>\n";
        }
    }

    $html .= "  <br><label>Email:</label>\n";
    $html .= "  <input type=\"text\" name=\"contactos[{$i}][email]\" value=\"{$email}\">\n";
    if (!empty($errores['email'])) {
        foreach ($errores['email'] as $error) {
            $html .= "  <div class=\"error\">" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</div>\n";
        }
    }

    $html .= "  <br><label>Teléfono:</label>\n";
    $html .= "  <input type=\"text\" name=\"contactos[{$i}][tlf]\" value=\"{$tlf}\">\n";
    if (!empty($errores['tlf'])) {
        foreach ($errores['tlf'] as $error) {
            $html .= "  <div class=\"error\">" . htmlspecialchars($error, ENT_QUOTES, 'UTF-8') . "</div>\n";
        }
    }

    $html .= "</fieldset>\n";

    return $html;
    
}
?>