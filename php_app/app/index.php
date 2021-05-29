<?php

define("COMPOSER_AUTOLOAD_FILE", __DIR__."/../vendor/autoload.php");

if (false === file_exists(COMPOSER_AUTOLOAD_FILE)) {
    echo "Você precisa instalar as dependências antes.";
    exit;
}

require_once COMPOSER_AUTOLOAD_FILE;

$py_app_url = getenv("PY_APP_URL");

$client = new \GuzzleHttp\Client();
$response = $client->request("GET", $py_app_url);
$data = json_decode($response->getBody());

echo "Aplicação PHP no IP: " . gethostbyname(gethostname()) . "<br>";
echo "Aplicação Python no IP: " . $data->ip . "<br>";
echo "<br>";
echo "Contador de requisições: " . $data->counter . "<br>";
echo "Horário da ultima requisição: " . $data->time . "<br>";