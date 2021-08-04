# Uso de la clase Datos

Antes de utilizarlo debe incluirse:

```php
include __DIR__ . "/Datos.php";
```

Luego instanciarlo:

```php
$datos = new Datos;
```

## Métodos disponibles

Tabla descriptiva de los métodos disponible de la clase Datos:

| Nombre          | ¿Qué hace? |
| --------------- | ---------- |
| **`obtener( string $url )`**  | Este método busca obtener datos en formato JSON de un servidor. Si consigue obtenerlo en ese formato informará el tipo de datos recibidos en formato JSON |
| **`is_ip(string $string)`** | Evalúa si la cadena de texto a evaluar es una dirección IP. |
| **`obtenerIP()`** | Obtiene la dirección IP del usuario |

### Ejemplo de uso de los métodos

Ejemplo de uso de **`obtener( string $url )`**:

```php
$informacion = $datos->obtener("http://ip-api.com/json/");
```

Se guarda en la variable **`$informacion`** datos en formato JSON.

Ejemplo de uso de **`is_ip(string $string)`**:

```php
$is_ip = $datos->is_ip("8.8.8.8");

if ( $is_ip ) {
    // Si es una dirección IP se ejecutarán 
    // instrucciones acá.
}
```

Ejemplo de uso de **`obtenerIP()`**:

```php
$ip = $datos->obtenerIP();
echo $ip;
```

Devuelve la dirección IP del usuario en formato `string`.

> Si la aplicación se ejecuta localmente devolverá una dirección IP privada o local.