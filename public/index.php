<?php

use Bramus\Router\Router;

require_once dirname(__DIR__) . "/vendor/autoload.php";

// creating a new instance of bramus router
$router = new Router();

function hello()
{
    echo "hello hello";
}
// Define routes
$router->get('/', 'App\Controller\HomeController@home');


// Run router
$router->run();
