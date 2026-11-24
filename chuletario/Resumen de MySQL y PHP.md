# Guía y Resumen de MySQL y PHP (PDO y mysqli)

Este documento reúne los comandos esenciales de **MySQL** (consultas, filtros, agrupaciones con `HAVING`, modificaciones y uniones) junto con su implementación segura en **PHP** usando tanto **PDO** (marcadores `:nombre`) como **mysqli** (marcadores `?`).

---

## 1. Diferencia en PHP: PDO (`:nombre`) vs `mysqli` (`?`)

Antes de escribir consultas en PHP, revisa cómo creas la conexión en tu archivo `conexion.php`:

* **Si usas `new PDO(...)`**: puedes usar marcadores con nombre (`:param`) y pasar un array asociativo en `execute([':param' => $valor])`.
* **Si usas `new mysqli(...)`**: debes usar signos de interrogación (`?`) y enlazar los tipos con `bind_param("iis", ...)`. **No** admite `:nombre`.

### Ejemplo de `UPDATE` en PDO
```php
<?php
// Conexión PDO
$pdo = new PDO("mysql:host=localhost;dbname=juego;charset=utf8mb4", "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$puntos = 10;
$intentos = 1;
$login = $_SESSION['login'];

// Consulta preparada con marcadores :nombre
$stmt = $pdo->prepare("
    UPDATE jugador
    SET puntos = puntos + :puntos,
        extra  = extra + :extra
    WHERE login = :login
");

// Ejecución pasando el array asociativo (fíjate en =>)
$stmt->execute([
    ':puntos' => $puntos,
    ':extra'  => $intentos,
    ':login'  => $login
]);
```

### Ejemplo de `UPDATE` en `mysqli`
```php
<?php
// Conexión mysqli
$conn = new mysqli("localhost", "root", "", "juego");

$stmt = $conn->prepare("
    UPDATE jugador
    SET puntos = puntos + ?,
        extra  = extra + ?
    WHERE login = ?
");

// "i" = entero (integer), "s" = texto (string)
$stmt->bind_param("iis", $puntos, $intentos, $_SESSION['login']);
$stmt->execute();
$stmt->close();
```

---

## 2. Consultas de Lectura (`SELECT`) y Filtros (`WHERE`)

La sentencia `SELECT` permite recuperar información de una o varias tablas.

```sql
SELECT login, nombre, puntos
FROM jugador
WHERE puntos >= 20
ORDER BY puntos DESC
LIMIT 10;
```

### Operadores más usados en `WHERE`
| Operador | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `=`, `<>`, `>`, `<`, `>=`, `<=` | Comparaciones básicas | `WHERE puntos >= 50` |
| `AND`, `OR`, `NOT` | Combinación de condiciones | `WHERE activo = 1 AND puntos > 10` |
| `BETWEEN a AND b` | Rango inclusivo | `WHERE puntos BETWEEN 10 AND 50` |
| `IN (...)` | Coincidencia en una lista | `WHERE login IN ('benja', 'ana', 'luis')` |
| `LIKE` | Búsqueda por patrón (`%` varios, `_` uno) | `WHERE nombre LIKE 'Ben%'` |
| `IS NULL` / `IS NOT NULL` | Comprobar valores nulos | `WHERE extra IS NOT NULL` |

---

## 3. Agrupaciones y Filtros de Grupo (`GROUP BY` y `HAVING`)

Cuando necesitas calcular totales, medias o conteos por categoría o usuario, utilizas funciones de agregado junto con `GROUP BY` y `HAVING`.

### Funciones de agregado principales
* `COUNT(*)`: cuenta el número total de filas del grupo.
* `SUM(columna)`: suma los valores numéricos de la columna.
* `AVG(columna)`: calcula la media aritmética.
* `MAX(columna)` / `MIN(columna)`: obtiene el valor máximo o mínimo.

### Diferencia clave entre `WHERE` y `HAVING`
1. **`WHERE`** filtra **filas individuales** *antes* de agrupar. No admite funciones como `SUM()` o `COUNT()`.
2. **`HAVING`** filtra **grupos completos** *después* de aplicar `GROUP BY` y las funciones de agregado.

### Orden de ejecución lógico en SQL
1. `FROM` (y `JOIN`)
2. `WHERE`
3. `GROUP BY`
4. `HAVING`
5. `SELECT`
6. `ORDER BY`
7. `LIMIT`

### Ejemplo práctico con `HAVING` en SQL y PDO
```sql
SELECT login,
       COUNT(*) AS partidas_jugadas,
       SUM(puntos) AS total_puntos
FROM jugador
WHERE login <> 'admin'
GROUP BY login
HAVING SUM(puntos) >= 50
ORDER BY total_puntos DESC;
```

**Cómo ejecutarlo en PHP con PDO:**
```php
<?php
$stmt = $pdo->prepare("
    SELECT login,
           COUNT(*) AS partidas_jugadas,
           SUM(puntos) AS total_puntos
    FROM jugador
    WHERE login <> :excluir
    GROUP BY login
    HAVING SUM(puntos) >= :minPuntos
    ORDER BY total_puntos DESC
");

$stmt->execute([
    ':excluir'   => 'admin',
    ':minPuntos' => 50
]);

$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultados as $fila) {
    echo $fila['login'] . ": " . $fila['total_puntos'] . " puntos<br>";
}
```

---

## 4. Inserción, Actualización y Borrado (`INSERT`, `UPDATE`, `DELETE`)

### `INSERT` (Añadir nuevos registros)
```sql
INSERT INTO jugador (login, nombre, puntos, extra)
VALUES ('benja', 'Benja', 0, 0);
```

### `UPDATE` (Modificar registros existentes)
> **Importante:** Incluye siempre la cláusula `WHERE` para no sobrescribir toda la tabla.

```sql
UPDATE jugador
SET puntos = puntos + 15,
    extra = 0
WHERE login = 'benja';
```

### `DELETE` (Eliminar registros)
> **Importante:** Incluye siempre la cláusula `WHERE` para no vaciar toda la tabla.

```sql
DELETE FROM jugador
WHERE login = 'benja';
```

---

## 5. Uniones entre Tablas (`JOIN`)

Cuando los datos están repartidos en varias tablas relacionadas mediante claves primarias (`PRIMARY KEY`) y foráneas (`FOREIGN KEY`):

### `INNER JOIN` (Solo coincidencias en ambas tablas)
```sql
SELECT j.login, j.nombre, p.fecha, p.puntuacion
FROM jugador j
INNER JOIN partida p ON j.login = p.jugador_login;
```

### `LEFT JOIN` (Todos los de la tabla izquierda, tengan o no coincidencias a la derecha)
```sql
SELECT j.login, COUNT(p.id) AS total_partidas
FROM jugador j
LEFT JOIN partida p ON j.login = p.jugador_login
GROUP BY j.login
HAVING COUNT(p.id) >= 1;
```

---

## 6. Resumen Rápido de Buenas Prácticas

1. **Seguridad ante todo:** Nunca concatenes variables directamente en el SQL (`"WHERE login = '$login'"`). Usa siempre consultas preparadas (`prepare` + `execute`).
2. **No mezcles librerías:** Si usas `PDO`, utiliza `:nombre` y `fetchAll(PDO::FETCH_ASSOC)`. Si usas `mysqli`, utiliza `?`, `bind_param()` y `get_result()`.
3. **Cuidado con `UPDATE` y `DELETE`:** Verifica siempre el `WHERE` antes de ejecutar.
4. **Alias claros:** Usa `AS` (`SUM(puntos) AS total_puntos`) para leer fácilmente las columnas desde PHP (`$fila['total_puntos']`).