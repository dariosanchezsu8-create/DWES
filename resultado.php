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
<!--Esto sirve para que en el fichero de respuesta tenga una URL
para volver otra vez al fichero de la calculadora-->
    <!--Al retornar el fichero al fichero calculdadora se hace 
    mediante el metodo get lo que vuelve a inciializar otra vez
    las variables de numero y operacion-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Retorno</title>
</head>
    <body>
        <a href="Calculadora.php">
            <p>Return a la calculadora</p>
        </a>
 
    </body>
</html>