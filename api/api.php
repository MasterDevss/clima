<?php
header("content-type: application/json; charset=utf-8");

include __DIR__ . "/DLConectar.php";
include __DIR__ . "/DLProtocolo.php";
include __DIR__ . "/DLPeticiones.php";

$conectar = new DLConectar(__DIR__ . "/../../.env");
$get = new DLPeticiones("get");

$apiKey = $conectar->obtenerAPI();

function obtenerDatos( string $url ) {
    $headers = @get_headers( $url );
    $datos = [
        "info" => "Introduzca un criterio de búsqueda válido"
    ];

    if ( empty($headers) ) {
        return json_encode($datos);
    }

    list($codigo) = $headers;

    $datos = [
        "info" => "No hay resultados que mostrar"
    ];

    return $codigo == "HTTP/1.1 200 OK" ? file_get_contents($url ) : json_encode($datos);
}

$content = (object) [
    "ciencia" => "Ciencia de datos", 
    "apiKey" => $apiKey,
    "ciudad" => "Punto Fijo, VE"
];

// Por nombre de ciudad:
if ( $get->modulo("ciudad") ) {
    $ciudad = $get->value("ciudad");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad&appid=$apiKey&units=metric&lang=ES";
    echo obtenerDatos($ruta);
    exit;
}

// Por ID de ciudad:
if ( $get->modulo("id") ) {
    $id = $get->value("id");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?id=$id&appid=$apiKey&units=metric&lang=ES";
    echo obtenerDatos($ruta);
    exit;
}

// Por coordenadas:
if ( $get->modulo("coordenadas") ) {
    list($latitud, $longitud) = preg_split("/[,]{1,}/", $get->value("coordenadas"));
    $ruta = "https://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&appid=$apiKey&units=metric&lang=ES";
    echo obtenerDatos($ruta);
    exit;
}

// Por código postal:
if ( $get->modulo("postal") ) {
    $postal = $get->value("postal");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?zip=$postal&appid=$apiKey&units=metric&lang=ES";
    echo obtenerDatos($ruta);
    exit;
}

$datos = [
    "info" => "Puede llamar a la API de Current Weather Data"
];

$paramCount = count($_GET);

if ( ! ($paramCount > 0) ) {
    $url = "http://ip-api.com/json/";
    $host = (string) $_SERVER['HTTP_HOST'];
    $ip = (string) $_SERVER['REMOTE_ADDR'];

    echo json_encode($_SERVER);
    exit;

    list($a, $b, $c, $d) = preg_split("/\./", $ip);

    $servidor = $_SERVER;
    $a = (int) $a;
    $b = (int) $b;
    $c = (int) $c;
    $d = (int) $d;

    
    // Si las direcciones IP son privadas:
    if (
        ( $a == 10 && (($b >= 0 && $b <= 255) && ($c >= 0 && $c <= 255) && ($d >= 0 && $d <= 255)) ) ||
        ( $a == 172 && (($b >= 16 && $b <= 31) && ($c >= 0 && $c <= 255) && ($d >= 0 && $d <= 255)) ) ||
        ( $a == 192 && (($b == 168) && ($c >= 0 && $c <= 255) && ($d >= 0 && $d <= 255)) ) ||
        ( $a == 127 && $b == 0 && ($c == 0 || $c == 1) && ($d == 1) )
    ) {
        $ipInfo = json_decode(obtenerDatos($url));
        $lat = @$ipInfo->lat;
        $lon = @$ipInfo->lon;

        $urlClima = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric&lang=ES";
        $clima = array_merge((array) $ipInfo, (array) json_decode(obtenerDatos($urlClima)));
        echo json_encode($clima);
        exit;
    }

    // Si la dirección IP es pública:
    $url .= $ip;
    $ipInfo = json_decode(obtenerDatos($url));
    $lat = @$ipInfo->lat;
    $lon = @$ipInfo->lon;

    $urlClima = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric&lang=ES";
    $clima = array_merge((array) $ipInfo, (array) json_decode(obtenerDatos($urlClima)));
    echo json_encode($clima);
    exit;
}