<?php
    session_start();
    if($_SERVER["REQUEST_METHOD"]==="POST"){
        //Validacion de datos
        if(isset($_POST['nombre']) && isset($_POST['pwd'])){
             $_SESSION['nombre']=$_POST['nombre'];
             $_SESSION['pwd']=$_POST['pwd'];
        }
        function validarNombre(string $n):string{
            $nameErr="";
            if(empty($n)){
                $nameErr="Campo Obligatorio";    
            }
            if(!preg_match("/^[a-zA-Z ]*$/",$n)){
                $nameErr="Únicamente se permiten letras y espacios";
            }
            return $nameErr;
        }
        function validadPwd(string $p):string{
            $pwdErr="";
            if(empty($p)){
                $pwdErr="Campo Obligatorio";
            }
            $longitud=strlen($p);
            if($longitud<8){
                $pwdErr="8 caracteres como mínimo";
            }
            return $pwdErr;
        }
        $imagenes = [
            "https://img.magnific.com/psd-gratis/emoji-llorando-3d_84443-82658.jpg?semt=ais_hybrid&w=100&q=80",
            "https://img.magnific.com/vector-gratis/ilustracion-emojis-aburridos-gradiente_23-2150769977.jpg?semt=ais_hybrid&w=100&q=80",
            "https://img.magnific.com/vector-gratis/ilustracion-emoji-odio-gradiente_52683-148484.jpg?semt=ais_hybrid&w=100&q=80",
            "https://img.magnific.com/psd-gratis/emoji-amarillo-sospechoso-monocle-busca-respuestas-3d-fondo-transparente_363450-7339.jpg?semt=ais_hybrid&w=100&q=80"
        ];

        if(!isset($_POST['incrementar'])){
            $_SESSION['emojis']=[];
            $_SESSION['pulsaciones']=1;
        }else{
            if($_SESSION['pulsaciones']<4){            
            $_SESSION['emojis'][$_SESSION['pulsaciones']]=$imagenes[$_SESSION['pulsaciones']];
            $_SESSION['pulsaciones']++;
            }
        }
        print_r($_SESSION['pulsaciones']);
        if(isset($_POST['grabar'])){
            $_SESSION['pulsaciones'];

        }

    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <h1>Agenda</h1>    
    <form action="" method="POST">
        <fieldset style="border: 2px solid #000000; padding: 15px; border-radius: 3px;  border-collapse: collapse;">
            <p>Hola <?= $_SESSION['nombre'];?>, cuantos contactos deseas grabar?</p>
            <p>Puedes grabar entre 1 y 5. Por cada pulsación en INCREMENTAR grabarás un usuario más.</p>
            <p>Cuando el número sea el deseado pulsa GRABAR</p>
        </fieldset>
            
        <table style="border: 2px solid #000000;">
            <tr>

                <td style ="border: 1px solid black;">
                    <img src="https://img.magnific.com/vector-gratis/ilustracion-emojis-escuchar-musica_23-2151298389.jpg?semt=ais_hybrid&w=100&q=80"><img>
                </td>
                <?php
                    foreach($_SESSION['emojis'] as $valor){
                    ?>
                <td style="border: 2px solid #000000;">    
                    <img src="<?= $valor; ?>"></img>
                </td>
                <?php
                }

                    ?>
            </tr>


        </table>
        <br></br>
        <button type="submit" name="incrementar">INCREMENTAR</button>
    </form> 
    <form action="agenda.php" method="POST">
        <button type="submt" name="grabar">GRABAR</button>
    </form>
</body>
</html>