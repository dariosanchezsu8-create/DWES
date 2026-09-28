
<?php
//Se comprueba primero que se ha rellenado con formulario 
//a traves del array superglobal server que contiene el metodo del envio
//y tambien si el input a recibido algun numero. isset verifica que en el
//array superglobal post que inidica como se envia los datos existe el input
//entonces quiere decir que se ha puesto algo en ese input
if($_SERVER["REQUEST_METHOD"]==="POST" && isset($_POST["numeros"])){
$cantidad=(int)$_POST["numeros"];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--Cuando pongas la abreviatura de las aperturas en php
el echo ya va incluido asiq no se pone porq sino provoca error de sintaxis-->
    <form action="respuesta.php" method="POST">
        <h3>Sumatorio de numeros</h3>
<!--Aqui se mete php para hacer un bucle de tantos input
como numero se haya puesto en el formulario inicial-->
    <?php for($i = 0; $i < $cantidad; $i++):?>
        <br></br>
    <!--Al poner en el atributo name=[] se esta adjuntando los numeros
    en un array que este a su vez esta metido en el array superglobla $_POST 
    porq esto es un formulario entonces lo datos se envia con el metodo post 
    y ahí es donde estan almacenado todos los datos del formulario-->
        n<?=  $i+1; ?>: <input type="text" name="numeros[]" required></input>
    <!--Se cierra el for-->
     <?php endfor; ?>
    <button >Sumar</button>
    </form>
</body>
</html>