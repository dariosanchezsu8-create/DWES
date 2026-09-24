<?php
$numero1=0;
$numero2=0;
$resultado=0;
$operacion="Suma";
//Al iniciar la aplicacion se accede atraves del get por eso pone
//el mensaje de acceso no autorizado
//La condicion evalua si el usuario relleno y envio el formulario
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
            }else{
                echo "Error: No se puede dividir entre cero.";
                return;
            }
            break;
        default:
            $resultado = "Operación no válida";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer programa</title>
</head>
<body>
<!--Si action se deja vacio quiere decir que el formulario se enviará a si mismo-->
    <form action="resultado.php" method="POST">
        <fieldset>
        <h1>Calculadora Estandar</h1>
        <!--Mediante el value y php conseguimos que se quede el valor puesto a pesar
        de haber recargado la página con el boton calcular-->
        <!--Entonces a pesar de la recarga de la página seguimos manteniendo
        los valores de la calculadora puestos-->
        <label for="numero1">Numero 1:</label><br></br>
        <input type="text" name="numero1" id="numero1"value="<?php echo $numero1; ?>"><br></br>
        <label for="numero2">Numero 2:</label><br></br> 
        <input type="text" name="numero2" id="numero2"value="<?php echo $numero2; ?>"><br></br>
        <label for="operacion">Operacion:</label><br></br>
        <select name="operacion" id="operacion">
            <option value="suma"<?php if($operacion == 'suma') echo 'selected'; ?>>Suma</option>
            <option value="resta"<?php if($operacion == 'resta') echo 'selected'; ?>>Resta</option>
            <option value="multiplicacion"<?php if($operacion == 'multiplicacion') echo 'selected'; ?>>Multiplicacion</option>
            <option value="division"<?php if($operacion == 'division') echo 'selected'; ?>>Division</option>
        </select><br></br>
        <!--Al darle a calcular la pagina se recarga y entonces desaparecen los numeros
        y la opcion del select-->
        <input type="submit" value="Calcular">
        </fieldset>
    </form>
</body>
</html>
<?php
    if($resultado!==0){
    if($operacion == 'suma'){
        echo "El resultado de ". $numero1 ." + ". $numero2 ." es: " . $resultado;
    }else if($operacion== 'resta'){
        echo "El resultado de ". $numero1 ." - ". $numero2 ." es: " . $resultado;
    }else if($operacion== 'multiplicacion'){
        echo "El resultado de ". $numero1 ." * ". $numero2 ." es: " . $resultado;
    }else {
        echo "El resultado de ". $numero1 ." / ". $numero2 ." es: " . $resultado;
    }
}
?>