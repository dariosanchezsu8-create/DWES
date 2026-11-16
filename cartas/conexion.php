<?php
// Parámetros de conexión
$host = 'localhost';
$dbname = 'cartas';
$usuario = 'root';
$clave = '';
// 1. Cadena DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
// 2. Opciones de configuración
$opciones = [
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ante cualquier fallo lanza una excepción
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Devuelve por defecto arrays asociativos
];


 $pdo = new PDO($dsn, $usuario, $clave, $opciones);
  echo "Conexión establecida correctamente.<br>";