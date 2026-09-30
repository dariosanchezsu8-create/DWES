<?php

$alumnos= [
    ["nombre"=>"Ana","nota"=>4.0],
    ["nombre"=>"Pedro","nota"=>8.32],
    ["nombre"=>"Lucía","nota"=>5.0],
    ["nombre"=>"María","nota"=>7.5],
    ["nombre"=>"Sofía","nota"=>2.0],
    ["nombre"=>"Alvaro","nota"=>9.30],    
];
$aprobado=array_filter($alumnos,fn($n)=>$n>=5.0);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
        <body>
            <table border="1">
                <tr>
                    <td colspan="2">Aprobados</td>
                </tr>
                <?php
                //Fn es la abreviatura corta de funcion
                $aprobado=array_filter($alumnos,fn($n)=>$n>=5.0);
                  foreach($alumnos as $clave){
                ?>
                <tr>
                    <td><?= $clave["nombre"] ?></td>
                    <td><?= $clave["nota"] ?></td>
                </tr>
                <?php
                  }
                ?>
            </table>
            <br></br>
            <br></br>
            <br></br>
            <table border="1">
                <tr>
                    <td>Sumatorio Notas</td>
                    <td>Media Global</td>
                </tr>
                <tr>
                <?php
                //el primer elemento de la funcion es el acumulador y el segundo
                //los elementos del array
                    $sumaTotal=0;
                    $media=0.0;
                    if (true){
                        //Tenemos que coger las notas por eso n["notas"]
                        //Ademas se ha puesto un 0 al final para indicar 
                        //que el acumulador(sum) empieza desde cero
                    $sumaTotal=array_reduce($alumnos,fn($sum,$n)=>$sum+=$n["nota"],0);
                    $media=$sumaTotal/(count($alumnos));
                    ?>
                    <!--Asi es como se imprimen las variables-->
                    <td><?= $sumaTotal ?></td>
                    <td><?= $media ?></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </body>
</html>

<?php
//El usort solo entiendo 1,0,-1. Si queremos pasar el segundo valor
//delante del primero la comparacion tiene que dar 1 y vicerversa.
//si poner a<=>orden ascendente se queda con la A y viceversa.
echo "<br>";
usort($alumnos,fn($a,$b)=> $b["nota"]<=>$a["nota"]);
    foreach($alumnos as $clave){
        echo $clave["nombre"]."=".$clave["nota"]. "<br>";
    }
?>
