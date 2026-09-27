<?php

$diaNumero = 3; // Modifica este valor (1 a 7) para probar distintos días


switch ($diaNumero) {
    case 1:
        echo "El día $diaNumero es Lunes.";
        break;
    case 2:
        echo "El día $diaNumero es Martes.";
        break;
    case 3:
        echo "El día $diaNumero es Miércoles.";
        break;
    case 4:
        echo "El día $diaNumero es Jueves.";
        break;
    case 5:
        echo "El día $diaNumero es Viernes.";
        break;
    case 6:
        echo "El día $diaNumero es Sábado.";
        break;
    case 7:
        echo "El día $diaNumero es Domingo.";
        break;
    default:
        echo "Número de día no válido. Debe estar entre 1 y 7.";
        break;
}
?>

<?php
echo "<br>"."<br>";
$diaNumero = 3;
//VERSION MODERNA CON MATCH
$resultado=match($diaNumero){
        1=>"Lunes",
        2=>"Martes",
        3=>"Miercoles",
        4=>"Jueves",
        5=>"Viernes",
        6=>"Sabado",
        7=>"Domingo",
        default=>"Dia invalido",
};
echo "El dia de la semana es ".$resultado;


/**
 * 3.3 Memoria Justificativa de Mejoras
 * A)En el switch se compara los valores por la comparativa debil (==).
 * Lo que quiere decir que solo comprueba el valor no el tipo de dato.
 * Entonces esto puede dar resultado y problemas cuando se compara str,int,bool
 * Mientras que el match hace una comparacion estricta(===) es decir
 * compara tanto los valores como el tipo de dato, lo que evita problemas
 * B) En el switch no se le puede asignar una variable de retorno sino que en 
 * cada caso debes construir un bloque que de un resultado. 
 * En el match se le puede asginar un valor directamente y se puede jugar
 * despues con esta variable
 * C)En el switch si se omite el break se ejecutara el siguiente case
 * aunque no cumpla la condicion y dará el resultado de este ultimo.
 * Mientras que el match cado caso es independiente del otro. Una vez q
 * entre en la condicion los demas se invalida. No hay fall-through
 */



?>
