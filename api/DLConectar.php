<?php
class DLConectar {
    protected $ruta = "";
    protected $apiKey = "";

    public function __construct($ruta = __DIR__ . "/.env") {
        $this->ruta = $ruta;
        if (!file_exists($ruta)) {
            echo "<h2>Establezca los parámetros de conexión en <code>.env</code>";
            exit;
        }

        // Se cargan las variables de entorno:
        $this->env();

        // Parámetros de conexión:
        $this->usuario = getenv("DL_USERNAME");
        $this->password = getenv("DL_PASSWORD");
        $this->database = getenv("DL_DATABASE");

        $this->host = getenv("DL_HOST");
        $this->motor = getenv("DL_MOTOR");
        $this->dsn = "$this->motor:dbname=$this->database;host=$this->host";

        $this->apiKey = getenv("API_KEY");
    }

    private function env(): void {
        if (!file_exists($this->ruta))
            return;

        // Obtenemos las líneas del archivo:
        $lineas = file($this->ruta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lineas as $linea) {
            list($nombre, $valor) = explode("=", $linea, 2);

            $nombre = trim($nombre);
            $valor = trim($valor);

            putenv(sprintf("%s=%s", $nombre, $valor));
        }
    }

    public function obtenerPDO(): object {
        if (
            empty(trim($this->usuario)) ||
            empty(trim($this->password)) ||
            empty(trim($this->database)) ||
            empty(trim($this->host)) ||
            empty(trim($this->motor)) 
        ) {
            return (object) [
                "info" => "Debe establecer los parámetros de conexión con el motor de base de datos"
            ];
        }

        $pdo = new PDO($this->dsn, $this->usuario, $this->password);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }

    public function obtenerAPI(): string {
        return $this->apiKey;
    }
}
