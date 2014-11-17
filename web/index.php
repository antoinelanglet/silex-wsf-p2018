<?php 

require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();
$app['debug'] = true;

//Routes
$app->get('/', 'MVC\\HomeController::index');

$app->run();
