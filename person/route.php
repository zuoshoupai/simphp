<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
function addRoute($app){ 
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
} 