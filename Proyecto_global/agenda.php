<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <p style="font-weight:bold;font-size:20px;">Usuario: <?= $_SESSION['nombre'] ?></p>
<!--No se envian los datos porq en el form no tenia nada puesto-->
        <form action="Grabado.php" method="POST">
            <table style="border: 2px solid #000000;">
                <tr>
                    <?php
                   // for($i=0;$i<$_SESSION['pulsaciones'];$i++){
                    ?>
                    <td style="border: 2px solid #000000;">
                        <h3>CONTACTO <?= $i+1; ?></h3>
                        Nombre: <input type="text" name="nombre<?= $i+1;?>">
                        Apellidos: <input type="text" name="apellidos<?= $i+1;?>"><br>
                        Email: <input type="email" name="email<?= $i+1;?>">
                        Teléfono: <input type="tel" name="telefono<?= $i+1;?>">
                    </td>
                    <?php
                    //}
                    ?>
                </tr>
            </table>
        <br></br>
<!--Si pones el boton en otro formulario distinto de los inputs
al darle al boton si pasara de pantalla pero los inputs no
al esta en otro formulario independiente-->
    <button type="submit" name="gr">Grabar</button>
</form>
</body>
</html>