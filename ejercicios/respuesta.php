<?php
if($_SERVER["REQUEST_METHOD"]==="POST"){
    $suma=0;
    foreach($_POST["numeros"] as $valor){
        $suma+=$valor;
    }
echo "Resultado: ".$suma ;
}
?>
<br></br>
<a href="peticion.php">Realizar otra suma</a>