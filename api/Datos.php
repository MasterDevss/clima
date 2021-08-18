<?php
class Datos {
    protected $tipo = "application\/json";
    protected $content_type = "content\-type";
    public function __construct() {}

    private function contiene(string $pattern, string $string) {
        $pattern = (string) $pattern;
        $string = (string) $string;
        return preg_match("/$pattern/i", $string);
    }

    private function obtenerIcono( string $icon ) {
        $iconD = (string) $icon;
        $iconN = (string) preg_replace("/[d]/i", "n", $icon);


        return [
            "iconD" => "https://openweathermap.org/img/wn/$iconD@2x.png",
            "iconN" => "https://openweathermap.org/img/wn/$iconN@2x.png",
        ];
    }

    public function obtener( string $url ) {
        $headers = @get_headers( $url );

        if ( $headers == false ) {
            return json_encode([
                "info" => "La URL introducida no es válida"
            ]);
        }


        // En esa parte se conoce el tipo de datos recibido:
        foreach ($headers as $tipo ) {
            if ( $this->contiene($this->content_type, $tipo) ) {
                if (!$this->contiene($this->tipo, $tipo)) {
                    return json_encode([
                        "info" => "El tipo de datos recibido no es JSON",
                        "tipo" => $tipo
                    ]);
                }

                list($codigo) = $headers;

                $datos =  $this->contiene("200 OK", $codigo) ? json_decode(file_get_contents($url), true) : [
                    "info" => "No se pudieron obtener los datos del servidor"
                ];

                $datos = (array) $datos;

                if (isset($datos["weather"])) {
                    $clima = $datos["weather"];

                    foreach ($clima as $key => $value) {
                        $value["iconos"] = $this->obtenerIcono($value["icon"]);
                        $clima[$key] = $value;
                    }

                    $datos["weather"] = $clima;
                }

                $datos = json_encode($datos);
                return $datos;
            }
        }

        return json_encode([
            "info" => "No se ha podido obtener respuesta del servidor"
        ]);
    }

    public function is_ip(string $string) {
        return filter_var((string) $string, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
    }

    public function is_ip_publica(string $string) {
        return !(filter_var((string) $string, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === false);
    }

    public function obtenerIP() {
        $ip = @$_SERVER['REMOTE_ADDR'];
        $is_valid = $this->is_ip($ip);

        return (string) $is_valid ? $ip : "127.0.0.1";
    }
}