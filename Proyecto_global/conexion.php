<?php
//Asi es como se controla la conexion con la base de datos
//con try-catch ocultando datos sensibles del error y con PDO
//listo para funcionar cuando se integre en otros modulos
// Parámetros de conexión
$host = 'localhost';
$dbname = 'bdagenda';
$usuario = 'root';
$clave = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
//Activa las excepciones
$opciones = [
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Lanza PDOException ante fallos SQL
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Retorna arrays asociativos por defecto
];
$pdo = null; $stmt = null; 

try {
 $pdo = new PDO($dsn, $usuario, $clave, $opciones);
  echo "Conexión establecida correctamente.<br>";
} catch (PDOException $e) {
 error_log("Error PDO: " . $e->getMessage()); // Registro técnico en logs del servidor
 echo "<p style='color:red;'>Ocurrió un error al procesar los datos. Inténtelo más tarde.</p>";
}
?>
