<?php
// Parámetros de conexión
$host = 'localhost';
$dbname = 'agenda';
$usuario = 'root';
$clave = '';
// 1. Cadena DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
// 2. Opciones de configuración
$opciones = [
 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Ante cualquier fallo lanza una excepción
 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // Devuelve por defecto arrays asociativos
];
$pdo = null; // Inicializamos la variable para el bloque finally

//Datos a insertar (simulando que provienen de un formulario POST)
$nombreNuevo = "María Peláez";
$emailNuevo = "maria@correo.es";
$notaNueva = 8.75;
try {
 $pdo = new PDO($dsn, $usuario, $clave, $opciones);
  echo "Conexión establecida correctamente.<br>";
 $sql ="INSERT INTO alumnos (nombre, email, nota) VALUES (:nom, :mail, :nota)";
 $stmt=$pdo->prepare($sql);
 $stmt->execute();

// 3. Recorrido y visualización de resultados en pantalla
echo '<table style="border:1px solid black;">';
while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
   echo' <tr style="border:1px solid black;">';
 echo '<td style="border:1px solid black;">'.$fila['Nombre'] .'</td>'.'<td style="border:1px solid black;">'. $fila['Clave'].'</td>' . "<br>";
    echo '</tr>';
 }
echo '</table>';

} catch (PDOException $e) {
 // Registramos el detalle técnico en el log del servidor (oculto al visitante)
 error_log("Error de conexión PDO: " . $e->getMessage());
 echo "<p style='color:red;'>No se pudo conectar a la base de datos. Inténtelo más tarde.</p>";
} finally {
 // El bloque finally se ejecuta SIEMPRE para cerrar recursos
 // (En un script real cerramos al finalizar todas las consultas)
}
?>
