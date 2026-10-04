<?php
    $nameErr="";     
    $ErrorEmail="";                   
    $ErrorW="";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularios sin IA</title>
</head>
<body>
    <form action="" method="POST">
        <h2>PHP Form Validation Example</h2>
        <?php
        // 1. Si no se ha enviado el formulario todavía, no mostramos error
                 function funcion_validar_name(string &$nameErr):string{
                  if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    return "";
                  }
                    if (empty($_POST["name"] ?? '')) {
                    $nameErr = "El nombre es obligatorio";
                    } else {
                    $name=$_POST['name'];
                    $nameErr="Nombre correcto";
                    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                    $nameErr = "Únicamente se permiten letras y espacios";
                    }
                }
                return $nameErr;
         }
        ?>
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?= $_POST['name'] ?? ''?>">
        <div>*<?= funcion_validar_name($nameErr); ?></div>

        <br><br>
        <?php
                // 1. Si no se ha enviado el formulario todavía, no mostramos error

                function funcion_validar_email(string &$ErrorEmail): string {
                 if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                    return "";
                 }
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

                function funcion_validar_URL(string &$ErrorW): string {
                    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                        return "";
                    }

                    if (empty($_POST["web"] ?? "")) {
                        $ErrorW = "Rellena el campo";
                    } else {
                        $webs = $_POST["web"];
                        $ErrorW = "URL correcta";
                        if (!filter_var($webs, FILTER_VALIDATE_URL)) {
                            $ErrorW = "URL incorrecto";
                        }
                    }
                    return $ErrorW;
                }
            
        ?>
        <label for="email">Email:</label>
        <input type="text" name="email" value="<?= $_POST['email'] ?? '';?>">
        <div>*<?=funcion_validar_email($ErrorEmail); ?></div><br></br>

        <label for="web">Website:</label>
        <input type="text" name="web" value="<?= $_POST['web'] ?? '';?>">
        <div>*<?=funcion_validar_URL($ErrorW); ?></div><br></br>

        <label for="comment">Comment:</label>
        <textarea name="comment" rows="5" cols="40" ></textarea>
        <br><br>

        <?php
        // 1. Si no se ha enviado el formulario todavía, no mostramos error
            function function_validar_select():string{
             if ($_SERVER["REQUEST_METHOD"] !== "POST") {
                return "";
            }
            $selectErr="";
                if(empty($_POST["sexo"] ?? "")){
                    $selectErr="Gender es obligatorio";
                }else{
                    $selectErr="";
                }
                return $selectErr;
              }
        ?>
        <label for="gender">Gender:</label>
        <input type="radio" name="sexo"
        <?php if (isset($sexo) && $sexo=="mujer") echo "checked";?>
        value="mujer"> Mujer
        <input type="radio" name="sexo"
        <?php if (isset($sexo) && $sexo=="hombre") echo "checked";?>
        value="hombre"> Hombre
        <div>*<?= function_validar_select() ?></div>
        <br></br>
        <input type="submit" value="Submit">
        <h1>Your Input:</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($nameErr==="Nombre correcto"&& $ErrorEmail==="Email correcto" && $ErrorW==="URL correcta"){
                $name=$_POST['name'];
                $webs=$_POST["web"];
                $email=$_POST["email"];
                
                echo "<p>Name: $name</p>";
                echo "<p>Email: $email</p>";
                echo "<p>Website: $webs</p>";
            }else{
                echo "";
            }

        }
        ?>
    </form>
</body>
</html>


