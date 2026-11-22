<?php
//Modulo de lógica pura

/**
 * @param array de strings que contiene los emojis del programa completo
 */
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


/**
 * Devuelve los emojis de la constante definida anteriormente
 * 
 * @param int $num: Cantidad de emojis disponibles segun el max_lote definido
 * 
 * @return array de strings con los emojis
 */


function emojisDisponibles(int $num):array{
    $emojPartido=[];

    for($i=0;$i<$num;$i++){
        $emojPartido[]=EMOJIS[$i];
    }
    return $emojPartido;

}
/**
 * Elige emojis aleatoriamente 
 * 
 * @param array $emojPartido de emojis disponibles. Este viene determinado por la funcion emojisDisponibles
 * 
 * @return array $aleatorio de strings cambiados de forma aleatoria
 * 
 */


function emojiAleatorio(array $emojPartido):array{
    $aleatorio=[];

    for($i=0;$i<count($emojPartido);$i++){
        $indice=rand(0,count($emojPartido)-1);
        $aleatorio[]=$emojPartido[$indice];
    }
    return $aleatorio;
}


/**
 * Valida los datos de un contacto segun las siguiente carateristicas:
 * 1. Nombre y apellidos:campo obligatorio,minimo de longitud
 * , caracteres especiales
 * 2. Telefono: obligatorio y longitud correcta
 * 3.Correo: obligatorio y formato de correo correcto
 * 
 * @param array $c asociativo de strings, clave-valor
 * -Claves:nombre, apellido,tlf y email
 * 
 * @return array $errores asociativo de strings que recoge todos los
 * posibles errores,clave-valor
 * -Claves:nombre, apellido,tlf y email
 */


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


/**
 * Devuelve la estructura completa en HTML del modulo
 * agenda.php manteniendo los valores y mostrando errores
 * de campo
 * 
 * @param int $i, posicion de un contacto concreto
 * @param string $emoji, emoji concreto asociado
 * a ese contacto concreto
 * @param array $valores asociativo de strings, recoge el contenido
 * de los campos rellenados por el usuario
 * @param array $errores asociativo de strings, posibles errores de ese
 * contacto en particular. Este argumento proviene 
 * de la funcion validarContacto
 * 
 * @return $html, devuelve el HTML en concreto por contacto
 * con el contenido validado
 * 
 */


function pintarFormularioContacto(int $i, string $emojis,array $valores,array $errores):string{
        
        $nombre   = htmlspecialchars($valores['nombre'] ?? '', ENT_QUOTES, 'UTF-8');
        $apellido = htmlspecialchars($valores['apellido'] ?? '', ENT_QUOTES, 'UTF-8');
        $email    = htmlspecialchars($valores['email'] ?? '', ENT_QUOTES, 'UTF-8');
        $tlf      = htmlspecialchars($valores['tlf'] ?? '', ENT_QUOTES, 'UTF-8');

        $html  = '<fieldset>'."\n";
        $html .= '<table>'."\n";
        $html .= '<tr>'."\n";
        $html .= '<td rowspan="2">'.htmlspecialchars($emojis, ENT_QUOTES, 'UTF-8').'</td>'."\n";
        $html .= '<td>'."\n";

        // Nombre
        $html .= '<label>Nombre</label>' . "\n";
        $html .= '<input type="text" name="contactos['.$i.'][nombre]" value="'.$nombre .'">'."\n";
        if (!empty($errores['nombre'])) {
            foreach ((array)$errores['nombre'] as $error) {
                $html .='<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8') .'</span>'."\n";
            }
        }

        // Apellidos
        $html .='<label>Apellidos</label>' . "\n";
        $html .='<input type="text" name="contactos['.$i.'][apellido]" value="'.$apellido.'">'."\n";
        if (!empty($errores['apellido'])) {
            foreach ((array)$errores['apellido'] as $error) {
                $html .='<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8').'</span>'."\n";
            }
        }

        $html .= '</td>'."\n";
        $html .= '</tr>'."\n";
        $html .= '<tr>'."\n";
        $html .= '<td>'."\n";

        // Teléfono
        $html .='<label>Teléfono</label>'."\n";
        $html .='<input type="text" name="contactos['.$i.'][tlf]" value="'.$tlf.'">'."\n";
        if (!empty($errores['tlf'])) {
            foreach ((array)$errores['tlf'] as $error) {
                $html .= '<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8').'</span>'."\n";
            }
        }

        // Email
        $html .='<label>Email</label>'."\n";
        $html .='<input type="text" name="contactos['.$i.'][email]" value="'. $email.'">'."\n";
        if (!empty($errores['email'])) {
            foreach ((array)$errores['email'] as $error) {
                $html .='<span class="error">'.htmlspecialchars((string)$error, ENT_QUOTES, 'UTF-8').'</span>'."\n";
            }
        }

        $html .= '</td>'."\n";
        $html .= '</tr>'."\n";
        $html .= '</table>'."\n";
        $html .= '</fieldset>'."\n";

    return $html;
    
}
?>