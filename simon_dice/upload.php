<?php
//var_dump($_FILES['fileToUpload']['name']);
$target_dir="ruta";
$target_file=$target_dir.basename($_FILES['fileUpload']['name']);
$uploadOk=1;
$imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
$check=getimagesize($_FILES['fileToUpload']['tmp_name']);

?>