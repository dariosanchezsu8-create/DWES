<?php
// $gente=array(
//         array(
//             "Familia"=>"Los Simpson",
//             "Padre"=>"Homer",
//             "Madre"=>"Marge",
//             "Hijos"=>array("Bart","Lisa","Maggie")
//         ),
//         array(
//             "Familia"=>"Los Griffin",
//             "Padre"=>"Peter",
//             "Madre"=>"Lois",
//             "Hijos"=>array("Chris","Meg","Stewie")
//         )
//     );

// echo "<br>"."<br>";
//     // var_dump($gente);
//     // print_r($gente);

//     foreach($gente as $personas){
//         echo "<ul>";
//         foreach($personas as $unPersona){
//             if(is_string($unPersona)){
//                 echo "<li>".$unPersona."</li>";
//             }else {
//                 echo "<ul>";
//                 foreach($unPersona as $laPersona){
//                     echo "<li>".$laPersona."</li>";
//                 }
//                  echo "</ul>";
//         }
//     }
//     echo "</ul>";
// }
//PRACTICA EJERCICIO 2
// require_once'matematicas.php';
// ecuacion_segunda(2,6,4);

//PRACTICA EJERCICIO 3
function esPalindromo(string $cadena):bool{
    //Las funciones se tiene que pasar sin punto porque sino
    //se estará concatenando la cadena con el resultado de esa
    //función
    $caracteres2=[];
    //Va sobreescribiendo la variable cadena1
    $cadena1=mb_strtolower($cadena);
    $cadena1=stripslashes($cadena1);
    $cadena1=str_replace(" ","",$cadena1);
    $caracteres=str_split($cadena1);
    for($i=count($caracteres)-1;$i>=0;$i--){
    array_push($caracteres2,$caracteres[$i]);
}
 print_r($caracteres);
 echo "<br>";
 print_r($caracteres2);
 if($caracteres===$caracteres2){
    return true;
 }else{
    return false;
 }

}
//para muestrar un boolean no se puede imprimir con print_r
//hay que utilizar var_dmp
//var_dump(esPalindromo("Anita lava la tina"));
//EJERCICIO 4
function array_limite(array $numeros, int $limite){
   $n=[];
   foreach($numeros as $valor){
      if($valor<$limite){
         array_push($n,($valor));
      }
   }
   print_r($n);
}
//array_limite([2,4,27,4,2,1,6],5);
//EJERCICIO 5

function validar_var($valor){
   if(isset($valor)){
      echo "La variable existe y es distinto de null";
      if(is_string($valor)){
         echo $valor." es un string";
      }else{
         if(is_int($valor))
            echo $valor." es un entero";
      }
   }else{
      echo "Entrada inválida";
   }
}
function jugar_strings($valor){
   $cadena=[];   
   $token="+";
if(isset($valor)){
   $valor=strtolower($valor);
   $longitud=strlen($valor);
   $cadena=explode($token,$valor);
   print_r($cadena);
   }else{
      echo "operación inválida";
   }

}
//jugar_strings("Hola+mundo");
//los array o funciones q trabajen con array no se puede imprimir
//con echo sin con printl_r
function jugar_arrays(array $cadena){  
   print_r(array_values($cadena));
   echo "<br>";
    print_r(array_keys($cadena));
   for($i=0;$i<count($cadena);$i++){
        echo "Nombre: " . $cadena[$i]["nombre"] . "\n"; 
        echo "Nota: " . $cadena[$i]["nota"] . "\n";
   }
}
jugar_arrays([["nombre"=>"Mario","nota"=>8.5],["nombre"=>"Carlos","nota"=>9.83]]);

?>
