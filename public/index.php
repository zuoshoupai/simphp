<?php 
use Slim\Factory\AppFactory;   
define('ROOT_PATH',dirname(__DIR__));
require __DIR__ . '/../vendor/autoload.php';
require ROOT_PATH. '/person/common.php';  
$app = AppFactory::create(); 

require ROOT_PATH. '/person/route.php'; 
addRoute($app); 


$app->run(); 