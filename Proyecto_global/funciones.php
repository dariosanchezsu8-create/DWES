<?php
define("EMOJIS",[
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
        $emojPartido[]=EMOJIS[$i];
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
$errores=[];
//Errores Posibles campo Nombre
$nombre = trim((string)($c['nombre'] ?? ''));
    if($nombre==''){
        $errores['nombre'][]="*Campo vacio";
    }elseif(!preg_match('/^[\p{L}\s\-\']+$/u',  $nombre)|| mb_strlen($nombre)<2){
                $errores['nombre'][]="*Nombre inválido";

    }

//Errores Posibles campo Apellidos
$apellido = trim((string)($c['apellido'] ?? ''));
    if($apellido==''){
        $errores['nombre'][]="Campo vacio";
    }elseif(!preg_match('/^[\p{L}\s\-\']+$/u',  $apellido)|| mb_strlen($apellido)<2){
                $errores['apellido'][]="*Apellido inválido";

    }
//Errores Posibles campo Telefono
$tlf = trim((string)($c['tlf'] ?? ''));
    if($tlf==''){
    $errores['tlf'][]="*Campo Vacío";
}else if(!preg_match('/^\d{9}$/',  $tlf)) {
        $errores['tlf'][] ="*Teléfono inválido";
      }

//Errores Posibles campo Email
$email = trim((string)($c['email'] ?? ''));
    if($email==''){
       $errores['email'][]="*Campo vacío";
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores['email'][]="*Correo inválido";
}
return $errores;
}



function pintarFormularioContacto(int $i, string $emojis,array $valores,array $errores):string{
        //Ejemplo =0'Conner Sin ENT_QUOTES partiria a la mitad el valor
        //Esto es opocional pero maas claridad evitar error de undefined array key
        $nombre   = htmlspecialchars($valores['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars($valores['apellido'] ?? '', ENT_QUOTES, 'UTF-8');
        $email    = htmlspecialchars($valores['email'] ?? '', ENT_QUOTES, 'UTF-8');
        $tlf      = htmlspecialchars($valores['tlf'] ?? '', ENT_QUOTES, 'UTF-8');

    $html  = '<fieldset>' . "\n";
    $html .= '<table>' . "\n";
    $html .= '<tr>' . "\n";
    $html .= '<td rowspan="2">' . htmlspecialchars($emojis, ENT_QUOTES, 'UTF-8') .'</td>'."\n";
    $html .= '<td>'."\n";

    // Nombre
    $html .= '<label>Nombre</label>' . "\n";
    $html .= '<input type="text" name="contactos[' . $i . '][nombre]" value="' . $nombre . '">' . "\n";
    if (!empty($errores['nombre'])) {
        foreach ((array)$errores['nombre'] as $error) {
            $html .='<span class="error">' . htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') . '</span>' . "\n";
        }
    }

    // Apellidos
    $html .= '<label>Apellidos</label>' . "\n";
    $html .= '<input type="text" name="contactos[' . $i . '][apellido]" value="' . $apellido . '">' . "\n";
    if (!empty($errores['apellido'])) {
        foreach ((array)$errores['apellido'] as $error) {
            $html .='<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') . '</span>' . "\n";
        }
    }

    $html .= '</td>'."\n";
    $html .= '</tr>'."\n";
    $html .= '<tr> '."\n";
    $html .= '<td> '."\n";

    // Teléfono
    $html .= '<label>Teléfono</label>' . "\n";
    $html .= '<input type="text" name="contactos[' . $i . '][tlf]" value="' . $tlf . '">' . "\n";
    if (!empty($errores['tlf'])) {
        foreach ((array)$errores['tlf'] as $error) {
            $html .= '<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') . '</span>' . "\n";
        }
    }

    // Email
    $html .='<label>Email</label>'."\n";
    $html .='<input type="text" name="contactos['.$i.'][email]" value="' . $email . '">' . "\n";
    if (!empty($errores['email'])) {
        foreach ((array)$errores['email'] as $error) {
            $html .='<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8').'</span>'."\n";
        }
    }

    $html .= '</td>' . "\n";
    $html .= '</tr>' . "\n";
    $html .= '</table>' . "\n";
    $html .= '</fieldset>' . "\n";

    return $html;
    
}
?>