<?php
//EJERCICIO 1
$valor1=" Es tu nombre O\'reilly? ";
//$resultado=trim($valor);
//$resultado=stripslashes($valor);//quita simbolos 
//echo $resultado;
//EJERCICIO 2
//Hace las dos funciones anteriores pero metidas en una función
function test_entrada($valor1){
    $valor=trim($valor1);
    $valor=stripslashes($valor1);
    return $valor;
}
//echo test_entrada($valor1);



?>
<!--Esto se tiene que buscar en la consola
Lo que te dice es la URL donde tengo este fichero en el atributo
action del form-->
<form method="POST" action="<?= $_SERVER["PHP_SELF"]; ?>">
    input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
value="mujer"> Mujer
<input type="radio" name="sexo"
<?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
value="hombre"> Hombre
<span class="error">* <?php echo "error";?></span><br><br>
<!--Esto lo que hace es mantener la opcion aunque se recargue
la pagina. Comprueba que exista la variable y luego si esta tien un valor
emtonces loq ue hace es el checked que para input es marcar la opcion
por defecto. Si existe o incumpla alguna de las condiciones anteriores
devolver un error de validacion con CSS-->
</form>
<?php
$email="abc@abc.com";
$emailErr="Email correcto";
if (empty($email)) {
 $emailErr = "Se requiere Email";
 } else {
    /**
     * Lo que hace filter_var es verifica una variable. En este caso
     * lo que va hacer es verificar que la variable $email cumpla
     * con los requisitos necesarios que tiene que llevar un email
     * Entonces filter_var lo que hace es comprobar si una variable
     * cumple con unos determinados requisitos. Variable y filtro necesita
     */
 if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
 $emailErr = "Fomato de Email invalido";
 }
 }
echo $email;
echo "<br>";
echo $emailErr;
?>
<br></br>
<!--Comprueba si un email es correcto-->
<!--Lo que hace es mantener el input aunque se recargue la pagina
. Ademas pondra un mensaje indicando que este campo es obligatorio
y verificando si este esta correcto-->
$email: <input type="text" name="email" value="<?php echo $email;?>
"><span class="error">* <?php echo $emailErr;?></span><br><br>

<!--Las expresiones regular son lineas de codigo que nos permite
encontrar un patron o ciertos datos deseados en una cadena de 
texto compleja o en un base de datos com mucha informacion en ella.-->
<?php
//Ejericio 8
if (empty($_POST["name"])) {
 $nameErr = "El nombre es obligatorio";
 } else {
 $name = test_input($_POST["name"]);
 if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
 $nameErr = "Únicamente se permiten letras y espacios";
 }
 }
 //Verifica si el input nombre esta vario o no
 //Si esta no esta vacio comprueba otra condicion mediante
 //una expresion regular preg_match(esta es compuesta por un patron
 //que de delimita entre barras//. El texto donde va a realizar la busqueda
 //y luego la variable donde colocará las coincidencias). Entonces
 //concretamente la condicion evalua que la variable name tenga espacios o simbolos
 //Si esta es cierta, pues imprime un mensaje 
 ?>

<?php
function funcion_validar_email(): string {
    if (empty($_POST["email"] ?? "")) {
        $ErrorEmail = "Rellena el campo";
    }else{
        $email=$_POST["email"];
        $ErrorEmail="Email correcto";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $ErrorEmail="Email incorrecto";
     }
    }
    return $ErrorEmail;
}

function funcion_validar_URL(){
    if (empty($_POST["web"] ?? "")) {
        $ErrorW = "Rellena el campo";
    }else{
        $webs=$_POST["web"];
        $ErrorW="URL correcto";
    if (!filter_var($webs, FILTER_VALIDATE_URL)) {
        $ErrorW="URL incorrecto";
     }
    }
    return $ErrorW;
}
?>
<!--Para comprobar y hacerlo tiene que ir todo en formulario-->
<form action="" method="POST">
<!--Tener cuidado con las comillas-->
 Email:<input type="text" name="email" value="<?= $_POST['email'] ?? ''; ?>"> 
<div>*<?= funcion_validar_Email(); ?></div><br></br>
Website:<input type="text" name="web" value="<?= $_POST['web'] ?? ''; ?>"> 
<div>*<?= funcion_validar_URL(); ?></div><br></br>
<button type="submit">Enviar</button>
</form>

