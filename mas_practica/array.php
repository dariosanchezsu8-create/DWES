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
function esPalindromo(string $cadena):boolean{
    //Las funciones se tiene que pasar sin punto porque sino
    //se estará concatenando la cadena con el resultado de esa
    //función
    $cadena1=$stripslashes(trim($cadena));
    $caracteres=str_split($cadena1);
    print_r($caracteres);
    for($i=count($caracteres);$i>=0;$i--){
    array_push($caracteres2,[$caracteres[$i]]);
}
 if($caracteres===$caracteres2){
    return true;
 }else{
    return false;
 }
}
print_r(esPalindromo("Yo no dono rosas"));



?>
