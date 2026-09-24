<?php
//Esta es la declaracion de un array multidimension
//ESTO SON DIFERENTES FORMAS DE IMPRIMIR UN ARRAY
    $animal=array(
        array("Perro","Gato"),
        array("Lombriz","Burro"),
        array("Murcielago","Cocodrilo")
        );
        //Esto es para imprimir el array var_dump. Pero es mejor
        //y mas claro el print_r
        #print_r($animal);
        // $filas=count($animal);
        // for($i=0;$i<$filas;$i++){
        //         $columnas=count($animal[$i]);
        //     for($j=0;$j<$columnas;$j++){
        //         echo $animal[$i][$j]."<br>";
        //     }
        // }
        //Otro tipo de alternativa al forma convencional
        //No se debe de poner =>
        foreach($animal as $unAnimal){
            foreach($unAnimal as $otroAnimal){
                echo $otroAnimal."<br>";
            }
        }
?>
<?php
    $animal=array(
        "casa"=>array("Perro","Gato"),
       "granja"=>array("Lombriz","Burro"),
        "salvaje"=>array("Murcielago","Cocodrilo")
        );
    //var_dump($animal);
    //print_r($animal);
    //Al ser el indice un string no se puede recorrer con un for convencional
    //porque este necesita un indice y este es numero. Por lo que no se puede hacer
    //$filas=count($animal);
    // for($i=0;i<$filas;$i++){
    //     $columnas=count($animal[$i]);    
    //     for($j=0;j<$columnas;$j++){
    //         echo $animal[$i][$j]."<br>";
    //   }
    // }
    echo "<br>"."<br>";
    foreach($animal as $elAnimal){
        foreach($elAnimal as $animale){
            echo $animale."<br>";
        }
    }
?>
<?php
$gente=array(
        array(
            "Familia"=>"Los Simpson",
            "Padre"=>"Homer",
            "Madre"=>"Marge",
            "Hijos"=>array("Bart","Lisa","Maggie")
        ),
        array(
            "Familia"=>"Los Griffin",
            "Padre"=>"Peter",
            "Madre"=>"Lois",
            "Hijos"=>array("Chris","Meg","Stewie")
        )
    );
    echo "<br>"."<br>";
    // var_dump($gente);
    // print_r($gente);
    foreach($gente as $personas){
        foreach($personas as $unPersona){
            if(is_string($unPersona)){
                echo $unPersona." ";
            }else {
                  echo "<br>";
                foreach($unPersona as $laPersona){
                    echo $laPersona."<br>";
                }
        }
    }
    echo "<br>";
}

?>
