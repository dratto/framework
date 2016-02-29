<?php

namespace App;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Description of Bootstrap
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class Bootstrap 
{
    
    private $router;
    
    public function __construct() 
    {
        $this->router = self::route(new \League\Route\RouteCollection);
    }
    public function run()
    {        
        $dispatcher = $this->router->getDispatcher();
        $request = Request::createFromGlobals();

        $response = $dispatcher->dispatch($request->getMethod(), $request->getPathInfo());

        $response->send();        
    }
    private static function route(\League\Route\RouteCollection $router)
    {
        $router->get('/', 'App\Controllers\Index::index');
        $router->get('/{nome}', 'App\Controllers\Index::index');
        return $router;
    }
    
}
