<?php
//var_dump($_FILES['fileToUpload']['name']);
$target_dir="practica_ficheros/";
$target_file=$target_dir.basename($_FILES['fileToUpload']['name']);
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
$uploadOk=1;
$check=getimagesize($_FILES['fileToUpload']['tmp_name']);
if($check!==false){
    echo "El fichero es una imagen- ".$check['mime']."".""."<br>";
}else{
    echo "El fichero no es una imagen"."<br>";
    $uploadOk=0;
}
if(!file_exists($target_file)){
    echo "El fichero existe en la carpeta"."<br>";
    $uploadOk=0;
}else{
    echo "El fichero es correcto"."<br>";

}
if($_FILES["fileToUpload"]["size"] > 500000) {
 echo "El tamaño del fichero es demasiado grande."."<br>";
 $uploadOk = 0;
}else{
    echo "Tamaño del fichero válido"."<br>";
}
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
 echo "Extension inválida. Debe ser JPG, PNG, JPEG, GIF"."<br>";
 $uploadOk = 0;
}else{
    echo "Extensión correcta"."<br>";
}
if($uploadOk==1){
    move_uploaded_file($_FILES['fileToUpload']['tmp_name'],$target_file);
    echo "Subido correctamente";
    }else{
        echo "Se ha producido un fallo";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload.php</title>
</head>
<body>
    <h1>GALERIA DE IMAGENES</h1>
    <?php
    $imagenes=glob("practica_ficheros/*");
    foreach ($imagenes as $archivo) {
    ?>
    <img src="<?= $archivo;?>" width="100px" heigth="100px"></img>
    <?php
    }
    ?>
</body>
</html>