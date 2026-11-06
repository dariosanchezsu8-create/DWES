<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <label for="usuario">Selecciona un fichero: </label>
        <br></br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br></br>
        <input type="submit" name="submit" value="Upload Image">
        <br></br>
       <!-- <button type="submit" name="iniciar_sesion">Iniciar Sesión</button>-->
    </form>
</body>
</html>