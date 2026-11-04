<?php
session_start();
require_once 'conexion.php';
if($_SERVER['REQUEST_METHOD']==="GET"){
            if($_SESSION['rol']==0){
                header("Location: inicio.php");
                exit();
            }elseif($_SESSION['rol']==1){
                header("Location: admin.php");
                    exit();
            }else{
                header("Location: salir.php");
                exit();
            }
        
        }
?>