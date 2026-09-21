<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer programa</title>
</head>
<body>
    <form action="resultado.php" method="POST">
        <fieldset>
        <h1>Calculadora Estandar</h1>
        <label for="numero1">Numero 1:</label><br></br>
        <input type="text" name="numero1" id="numero1"><br></br>
        <label for="numero2">Numero 2:</label><br></br> 
        <input type="text" name="numero2" id="numero2"><br></br>
        <label for="operacion">Operacion:</label><br></br>
        <select name="operacion" id="operacion">
            <option value="suma">Suma</option>
            <option value="resta">Resta</option>
            <option value="multiplicacion">Multiplicacion</option>
            <option value="division">Division</option>
        </select><br></br>
        <input type="submit" value="Calcular">
        </fieldset>
    </form>
</body>
</html>