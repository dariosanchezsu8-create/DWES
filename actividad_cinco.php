

<?php
//variables globales
$totalHoras=0;
$horas=0;   
$total=0;
$modulos=null;
$costeMatriculacion=0.0;
$asignaturas = [
    "DWES" => 6,
    "DWEC" => 6,
    "DIW"  => 5,
    "DAW"  => 4,
    "EIE"  => 4
];
//la variable global se declara normal. Pero luego para traerla
//y poder usarla en una funcion se tiene que poner global $variable
$mensaje="Hola desde el exterior";
function chat(){
    $variableLocal="Hola desde el interior";
    //Tenemos que primer traer la variable local antes de poder usarla
    global $mensaje;
    echo $mensaje;
    echo "<br>";
    echo $variableLocal;

}
define("IVA",0.21);
define("PRECIO_HORA",10);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Modulos Formativos</h1>
        <table border="1">
            <?php
            //Existen variables locales y global. En php las globales
            //se defiene global +$variable
            global $totalHoras;
            global $horas;
            global $modulos;
            global $total;
            global $costeMatriculacion;
            foreach($asignaturas as $modulos=>$horas){
                $totalHoras += $horas;

            ?>
            <tr>
                <td><?= $modulos ?></td>
                <td><?= $horas ?></td>

            </tr>
            <?php
            }
            $subtotal=PRECIO_HORA*IVA;//=2.1
            $costeMatriculacion=PRECIO_HORA+$subtotal;//=12.1
            $total=$costeMatriculacion*$totalHoras;
            ?>
            <tr>
                <td>Total horas</td>
                <td><?= $totalHoras ?></td>
            </tr>
            <tr>
                <td>Coste Matriculación</td>
                <td><?= $total."€" ?></td>
            </tr>
        </table>
        <p><?php chat(); ?></p>
    </body>
<!--
    En esta practica se puede distinguir entre las capa de arquitectura
    Capa de datos: Esta capa es el almacenamiento de los datos en el servidor. 
    Al no tener ninguna base de datos y poner directamente el valor de las variables,
    esta capa no se muestra en este codigo
    Capa de presentacion: Esta es la capa visual HTML+CSS. Este script solo se muestra
    el html para la organizacion del contenido.Por lo que, esta capa de presentacion si esta presente en este script, solo que falta el CSS para los estilos graficos.
    Capa Lógica de Negocio: Esta capa es la parte del servidor donde se ejecuta las instrucciones
    tanto operaciones como sentencias,bucles y demas. Esta capa se encarga de ejecutar las intrucciones
    y transformarlasa HTML para luego ser enviado al cliente.
    Estariamos por lo tanto en este capa.-->
</html>
