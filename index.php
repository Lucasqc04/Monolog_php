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

 
$app = AppFactory::create();

 
$logger = MonologFactory::getInstance();

 
$app->get('/home/{name}', function (Request $request, Response $response, $args) use ($logger) {
    $name = $args['name'];

   
    $logger->info("A rota /home foi acessada com o nome: $name");
 
    $response->getBody()->write("bem vindo, $name");
    return $response;
});
 $app->run();
?>
</body>
</html>
