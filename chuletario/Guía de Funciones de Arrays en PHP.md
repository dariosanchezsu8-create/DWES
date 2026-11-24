# Guía y Resumen de Funciones de Arrays en PHP

Este documento recoge las funciones de manejo de **arrays en PHP** más habituales en ejercicios, exámenes y desarrollo web (sesiones, formularios, juegos como el de cartas y resultados de base de datos), junto con ejemplos prácticos y errores frecuentes.

---

## 1. Crear, Rellenar y Contar Elementos

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `count($arr)` | Devuelve el número total de elementos del array. | `count($baraja)` $\rightarrow$ `6` |
| `array_fill($inicio, $cant, $val)` | Crea un array rellenado con un mismo valor. | `array_fill(0, 6, "boca_abajo.jpg")` |
| `range($inicio, $fin, $paso = 1)` | Genera un array con un rango de números o letras. | `range(1, 6)` $\rightarrow$ `[1, 2, 3, 4, 5, 6]` |
| `array_keys($arr)` | Devuelve un array con todas las claves. | `array_keys(['a' => 1, 'b' => 2])` $\rightarrow$ `['a', 'b']` |
| `array_values($arr)` | Devuelve todos los valores reindexados desde `0`. | `array_values($arr)` |

```php
<?php
// Inicializar 6 cartas boca abajo fácilmente:
$tablero = array_fill(0, 6, "boca_abajo.jpg");
```

---

## 2. Añadir, Quitar y Extraer Elementos

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `$arr[] = $val` / `array_push()` | Añade uno o más elementos al **final** del array. | `$cartas[] = "copas_01.jpg";` |
| `array_pop($arr)` | Extrae y devuelve el **último** elemento (modifica el array). | `$ultima = array_pop($cartas);` |
| `array_unshift($arr, $val)` | Añade uno o más elementos al **principio**. | `array_unshift($cartas, "oros_01.jpg");` |
| `array_shift($arr)` | Extrae y devuelve el **primer** elemento y reindexa. | `$primera = array_shift($cartas);` |
| `unset($arr[$clave])` | Elimina un elemento por su clave (no reindexa). | `unset($_SESSION['cartas'][2]);` |

---

## 3. Buscar y Comprobar Existencia

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `isset($arr[$clave])` | Comprueba si la clave existe y su valor no es `null`. | `if (isset($_POST['carta'])) { ... }` |
| `array_key_exists($clave, $arr)` | Comprueba si la clave existe (incluso si vale `null`). | `array_key_exists('login', $_SESSION)` |
| `in_array($val, $arr, $estricto)` | Devuelve `true` si el valor está en el array. | `in_array("copas_02.jpg", $baraja, true)` |
| `array_search($val, $arr)` | Busca un valor y devuelve su **clave** (o `false`). | `$pos = array_search("copas_05.jpg", $baraja);` |

```php
<?php
$baraja = ["copas_02.jpg", "copas_03.jpg", "copas_05.jpg"];

if (in_array("copas_03.jpg", $baraja, true)) {
    $indice = array_search("copas_03.jpg", $baraja); // Devuelve 1
}
```

---

## 4. Mezclar y Ordenar

> **Nota importante:** Todas estas funciones modifican el array original directamente (por referencia) y devuelven `true` o `false`. **No** hagas `$arr = shuffle($arr);`.

| Función | Descripción | Uso típico |
| :--- | :--- | :--- |
| `shuffle($arr)` | Mezcla los elementos aleatoriamente. | Barajar cartas en un juego. |
| `sort($arr)` / `rsort($arr)` | Ordena por valor (ascendente / descendente) y reindexa claves. | Arrays indexados simples. |
| `asort($arr)` / `arsort($arr)` | Ordena por valor manteniendo la asociación clave $\rightarrow$ valor. | Rankings o arrays asociativos. |
| `ksort($arr)` / `krsort($arr)` | Ordena por **clave** (ascendente / descendente). | Diccionarios o configuraciones. |
| `array_reverse($arr)` | Devuelve un nuevo array con el orden invertido. | Invertir historial o lista. |

```php
<?php
$puntos = [
    "benja" => 45,
    "ana"   => 80,
    "luis"  => 30
];

arsort($puntos); // Ordena de mayor a menor manteniendo los nombres: ana (80), benja (45), luis (30)
```

---

## 5. Cortar, Combinar y Limpiar Duplicados

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `array_slice($arr, $inicio, $len)` | Extrae una porción sin modificar el original. | `array_slice($baraja, 0, 3)` |
| `array_splice($arr, $inicio, $len)` | Elimina o reemplaza una porción modificando el array. | `array_splice($baraja, 1, 2)` |
| `array_merge($arr1, $arr2)` | Une dos o más arrays en uno solo. | `$mazo = array_merge($copas, $oros);` |
| `array_unique($arr)` | Elimina valores repetidos. | `array_unique(["a", "b", "a"])` $\rightarrow$ `["a", "b"]` |

---

## 6. Transformar, Filtrar y Resumir

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `array_sum($arr)` | Suma todos los valores numéricos del array. | `array_sum([10, 20, 5])` $\rightarrow$ `35` |
| `array_chunk($arr, $tam)` | Divide el array en subarrays del tamaño indicado. | `array_chunk($baraja, 2)` (parejas) |
| `array_map($fn, $arr)` | Aplica una función a cada elemento y devuelve el nuevo array. | `array_map('strtoupper', $nombres)` |
| `array_filter($arr, $fn)` | Filtra elementos según una condición booleana. | Quedarse solo con puntos `>= 50` |

```php
<?php
$puntuaciones = [10, 55, 30, 80, 45];

// Filtrar puntuaciones mayores o iguales a 50:
$altas = array_filter($puntuaciones, fn($p) => $p >= 50); // [1 => 55, 3 => 80]

// Reindexar si hace falta:
$altas = array_values($altas); // [55, 80]
```

---

## 7. Convertir entre `string` y `array`

| Función | Descripción | Ejemplo |
| :--- | :--- | :--- |
| `explode($sep, $texto)` | Trocea una cadena de texto en un array. | `explode(",", "uno,dos,tres")` |
| `implode($sep, $arr)` | Une los elementos de un array en una cadena de texto. | `implode(" - ", $cartas)` |

---

## 8. Errores Frecuentes en PHP con Arrays

1. **Asignar el retorno de `shuffle()` o `sort()`:**
   * **Mal:** `$cartas = shuffle($cartas);` (esto convierte `$cartas` en `true`).
   * **Bien:** `shuffle($cartas);`
2. **Usar bucles `for` tras borrar con `unset()`:**
   * Si borras `$arr[1]` de `[0, 1, 2]`, quedan las claves `0` y `2`. Un `for ($i = 0; $i < count($arr); $i++)` fallará al buscar `$arr[1]` (*Undefined array key 1*).
   * **Solución:** Recorre siempre con `foreach ($arr as $clave => $valor)` o reindexa con `$arr = array_values($arr);`.
3. **Confundir índices `0..N-1` con posiciones `1..N`:**
   * Los arrays indexados en PHP empiezan en `0`. Si tus botones HTML envían valores del `1` al `6`, recuerda restar `1` al acceder al array (`$baraja[$pos - 1]`).