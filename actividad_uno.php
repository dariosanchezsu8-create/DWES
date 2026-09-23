<?php
//CODIGO INICIAL SIN REFACTORIZAR
// // Establecer la zona horaria
// date_default_timezone_set('Europe/Madrid');

// // Obtener fecha y hora actuales
// $fecha = date('d/m/Y');
// $hora = date('H:i');

// // Mensaje de bienvenida
// echo "<h1>¡Qué alegría verte por aquí! ✨</h1>";
// echo "<p>Hoy es <strong>$fecha</strong> y son las <strong>$hora</strong>.</p>";
#CODIGO REFACTORIZADO
?>
<?=  
date_default_timezone_set('Europe/Madrid');
//Se declaran  los valores primero
$fecha = date('d/m/Y');
$hora = date('H:i');
$saludo = "¡Qué alegría verte por aquí! ✨";


//Se imprime los valores utilizando <?= pq es como si lo estuviera imprimiendo
?>
<h1><?= $saludo ?></h1>
<p>Hoy es <strong><?= $fecha ?></strong> y son las <strong><?= $hora ?></strong>.</p>



<?php
/** 
 * ACTIVIDAD 1 IA
 * 1.1 Analisis del codigo fuente lado cliente:
 * No no aparece las etiquetas, pero si las etiquetas del HTML:
 * <h1>¡Qué alegría verte por aquí! ✨</h1><p>Hoy es <strong>23/09/2026</strong> y son las <strong>17:56</strong>.</p>
 * 1.Se transforma el código PHP en el servidor por dos razones:
 * Por seguridad, para proteger el contenido interno ya que si el codigo
 * PHP fuera accesible por el cliente a traves de una página web, etonces
 * cualquier usuario puede acceder a contraseñas,cambiarlas y hacer lo que 
 * quiera con el código interno que se almacena y se ejecuta en el servidor
 * 2.Por compatibilidad ya que no todos los navegadores saben interpretar PHP.
 * Por lo tanto se pasa a HTML,CSS y JS.
 * La funcion del interpreté es transformar el codigo que le llega(PHP) a lenguaje
 * máquina y ejecuta todas las intrucciones. Después, prepara la respuesta
 * convirtiendo todo el codigo PHP inicial a texto HTML,CSS y JS.
 *
 * 1.2 Verificacion de Marcas de Delimitación:
 * Uso la marca estandar.
 * 
 *
 * 1.3 Detector de Alucionaciones en Comparación de Tipos con var_dump()
 *La IA no ha alucionado, me niega que ambos operadores son intercambiables
 *El tipado dinamico solo existen en determinados lenguajes. Consiste en que
 *las variables no estan sujetas ni se declaran ya con un tipo, sino que depende
 *del valor que le pongas despues u a lo largo del programa, puediendo cambiar su valor.
 */

?>
<?php
var_dump(200=="200");//True
var_dump(200==="200");//False

?>