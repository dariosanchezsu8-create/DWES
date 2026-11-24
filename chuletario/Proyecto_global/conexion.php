<?php

$host = 'localhost';
$dbname = 'bdagenda';
$usuario = 'root';
$clave = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$opciones = [
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
];
$pdo = null; $stmt = null; 

try {
 $pdo = new PDO($dsn, $usuario, $clave, $opciones);
  echo "Conexión establecida correctamente.<br>";
} catch (PDOException $e) {
 error_log("Error PDO: " . $e->getMessage()); 
echo "<p style='color:red;'>Ocurrió un error al procesar los datos. Inténtelo más tarde.</p>";
}
?>
