<?php

use Bramus\Router\Router;



require_once dirname(__DIR__) . "/vendor/autoload.php";

// creating a new instance of bramus router
$router = new Router();



$router->setBasePath(rtrim(dirname(dirname($_SERVER['SCRIPT_NAME'])), '/') . '/');


// Home page route
$router->get('/', 'App\Controller\BlogController@index');


// api blog route
$router->get('/api/blogs/', 'App\Controller\Api\ApiBlogController@index');


// Run router
$router->run();
