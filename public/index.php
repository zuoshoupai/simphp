<?php 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;   
define('ROOT_PATH',dirname(__DIR__));
require __DIR__ . '/../vendor/autoload.php';
require ROOT_PATH. '/person/common.php';  
$app = AppFactory::create(); 

$app->get('/', function (Request $request, Response $response, $args) { 
    $response->getBody()->write("你好，朋友！"); 
    return $response;
});
$app->get('/hello/{name}', function (Request $request, Response $response, $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

$app->get('/home', \App\controller\homeController::class . ':home');
$app->get('/list', \App\controller\homeController::class . ':list');

$app->run(); 