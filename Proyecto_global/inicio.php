<?php
session_start();
$emojis[
"https://img.magnific.com/vector-gratis/ilustracion-emojis-escuchar-musica_23-2151298389.jpg?semt=ais_hybrid&w=100&q=80",
"https://img.magnific.com/psd-gratis/emoji-llorando-3d_84443-82658.jpg?semt=ais_hybrid&w=100&q=80",
"https://img.magnific.com/vector-gratis/ilustracion-emojis-aburridos-gradiente_23-2150769977.jpg?semt=ais_hybrid&w=100&q=80",
"https://img.magnific.com/vector-gratis/ilustracion-emoji-odio-gradiente_52683-148484.jpg?semt=ais_hybrid&w=100&q=80",
"https://img.magnific.com/psd-gratis/emoji-amarillo-sospechoso-monocle-busca-respuestas-3d-fondo-transparente_363450-7339.jpg?semt=ais_hybrid&w=100&q=80"
];
        // if(!isset($_POST['incrementar'])){
        //     $_SESSION['emojis']=[];
        //     $_SESSION['pulsaciones']=1;
        // }else{
        //     if($_SESSION['pulsaciones']<=4){   
        //     $_SESSION['emojis'][$_SESSION['pulsaciones']]=$imagenes[$_SESSION['pulsaciones']];
        //     $_SESSION['pulsaciones']++;

        //     }
        //   }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inicio.php</title>
</head>
<body>
    <h1>AGENDAS DE CONTACTOS</h1>
    <p>Usuario: <?=$_SESSION['nombre']; ?> · Contactos a grabar: <?= "numero";?></p>
    <form action="" method="`POST">
       <button type="submit">INCREMENTAR</button> 
    </form>
    <form action="grabado.php" method="POST">
           <button type="submit">GRABAR</button> 
    </form>
</body>
</html>