<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

require __DIR__ . '/vendor/autoload.php';

use Slim\Factory\AppFactory;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use App\SystemServices\MonologFactory;

// Configurar o Slim
$app = AppFactory::create();

// Configurar o Monolog
$logger = MonologFactory::getInstance();

// Rota GET
$app->get('/home/{name}', function (Request $request, Response $response, $args) use ($logger) {
    $name = $args['name'];

    // Registrar uma mensagem de log
    $logger->info("A rota /home foi acessada com o nome: $name");

    // Retornar uma resposta
    $response->getBody()->write("bem vindo, $name");
    return $response;
});

// Executar o aplicativo
$app->run();
?>
</body>
</html>
