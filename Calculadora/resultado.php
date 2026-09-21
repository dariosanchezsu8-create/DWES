<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacion = $_POST['operacion'];

    switch ($operacion) {
        case 'suma':
            $resultado = $numero1 + $numero2;
            break;
        case 'resta':
            $resultado = $numero1 - $numero2;
            break;
        case 'multiplicacion':
            $resultado = $numero1 * $numero2;
            break;
        case 'division':
            if ($numero2 != 0) {
                $resultado = $numero1 / $numero2;
                $resultado= number_format($resultado, 2);
            }else{
                echo "Error: No se puede dividir entre cero.";
                return;
            }
            break;
        default:
            $resultado = "Operación no válida";
    }
    if($operacion == 'suma'){
        echo "El resultado de ". $numero1 ." + ". $numero2 ." es: " . $resultado;
    }else if($operacion== 'resta'){
        echo "El resultado de ". $numero1 ." - ". $numero2 ." es: " . $resultado;
    }else if($operacion== 'multiplicacion'){
        echo "El resultado de ". $numero1 ." * ". $numero2 ." es: " . $resultado;
    }else {
        echo "El resultado de ". $numero1 ." / ". $numero2 ." es: " . $resultado;
    }
}else{
     echo "Acesso no autorizado.";
}
?>