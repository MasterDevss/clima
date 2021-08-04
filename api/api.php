<?php
header("content-type: application/json; charset=utf-8");

include __DIR__ . "/Datos.php";
include __DIR__ . "/DLConectar.php";
include __DIR__ . "/DLProtocolo.php";
include __DIR__ . "/DLPeticiones.php";

$conectar = new DLConectar(__DIR__ . "/../../.env");
$get = new DLPeticiones("get");

$apiKey = $conectar->obtenerAPI();
$datos = new Datos;

$content = (object) [
    "ciencia" => "Ciencia de datos", 
    "apiKey" => $apiKey,
    "ciudad" => "Punto Fijo, VE"
];

// Por nombre de ciudad:
if ( $get->modulo("ciudad") ) {
    $ciudad = $get->value("ciudad");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?q=$ciudad&appid=$apiKey&units=metric&lang=ES";
    echo $datos->obtener($ruta);
    exit;
}

// Por ID de ciudad:
if ( $get->modulo("id") ) {
    $id = $get->value("id");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?id=$id&appid=$apiKey&units=metric&lang=ES";
    echo $datos->obtener($ruta);
    exit;
}

// Por coordenadas:
if ( $get->modulo("coordenadas") ) {
    list($latitud, $longitud) = preg_split("/[,]{1,}/", $get->value("coordenadas"));
    $ruta = "https://api.openweathermap.org/data/2.5/weather?lat=$latitud&lon=$longitud&appid=$apiKey&units=metric&lang=ES";
    echo $datos->obtener($ruta);
    exit;
}

// Por código postal:
if ( $get->modulo("postal") ) {
    $postal = $get->value("postal");
    $ruta = "https://api.openweathermap.org/data/2.5/weather?zip=$postal&appid=$apiKey&units=metric&lang=ES";
    echo $datos->obtener($ruta);
    exit;
}

$paramCount = count($_GET);

if ( ! ($paramCount > 0) ) {
    $datos = new Datos;
    
    $url = "http://ip-api.com/json/";
    $ip = (string) $datos->obtenerIP();
    
    if (!$datos->is_ip_publica($ip) || preg_match("/^\:\:|127/", $ip) ) {
        $ip = "";
    }

    $url .= $ip;
    $ipInfo = json_decode($datos->obtener($url));
    $lat = @$ipInfo->lat;
    $lon = @$ipInfo->lon;

    $urlClima = "https://api.openweathermap.org/data/2.5/weather?lat=$lat&lon=$lon&appid=$apiKey&units=metric&lang=ES";
    $clima = array_merge((array) $ipInfo, (array) json_decode($datos->obtener($urlClima)));
    echo json_encode($clima);
    exit;
}