<?php
//Iniciar sesion para que se guarde todos los valores en todos
//los ficheros usados en el proyecto
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
    <body>
        <h1>Bienvenida, al simon dice</h1>
        <form action="pintar_circulos.php" method="POST">
            <label for="circulos">Numero de círculos</label>
            <input type="text" name="circulos"></input>     
            <br></br>            
            <label for="colores">Numero de colores</label>
            <input type="text" name="colores" ></input>
            <br></br>
            <button type="submit">Comencemos</button>
        </form>
    </body>
</html>


<!--QUE HACER CON EL PROGRAMA
1. ENTENDER EL CODIGO ->HECHO
2. RESOLVER FALLOS
     * HECHO<-VALIDACION DEL FORMULARIO INICIAL -> SE PONDRA UN BOTON PARA VOLVER A EMPEZAR
     * AVERIGUAR PORQUE SE TRANSPASA DE UN FICHERO A OTRO EL FORMULARIO->HECHO
     * FALLO DE CIRCULOS EN NEGRO ->HECHO
3. APRENDER SESSION E IMPLEMENTARLO ->HECHO
4. CREAR OTRA PAGINA CON CIRCULOS NEGROS Y BOTONES->HECHO
   CON LOS COLORES ELEGIDOS---->