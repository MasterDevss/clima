<?php

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

header("content-type: application/json; charset=utf-8");

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

echo json_encode($datos);