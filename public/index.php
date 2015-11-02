<?php

require_once __DIR__.'/../vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$router = new League\Route\RouteCollection;

$router->addRoute('GET', '/', 'App\Controllers\Index::index');
$router->addRoute('GET', '/teste', function (Request $request, Response $response) {
    echo "testando";
    return $response;
});
$router->addRoute('POST', '/', function (Request $request, Response $response) {
    echo $_POST['maluquice'];
    return $response;
});

$dispatcher = $router->getDispatcher();
$request = Request::createFromGlobals();

$response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

$response->send();