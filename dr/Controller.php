<?php

namespace DR;

use \duncan3dc\Laravel\BladeInstance;
use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Description of Controller
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */
class Controller 
{
    /**
     * @var BladeInstance 
     */
    protected $blade;    
    
    /**
     * @var \Symfony\Component\HttpFoundation\Response;
     */
    protected $response;
    /**
     * @var \Symfony\Component\HttpFoundation\Request
     */
    protected $request;

    public function __construct(Request $request, Response $response) 
    {
        $this->response = $response;
        $this->request  = $request;
        $this->blade    = new BladeInstance(__DIR__."/../../app/resources/views", __DIR__."/../../app/cache/views");        
        
    }
    protected function view($view, $params)
    {
        echo $this->blade->render($view, $params);
        return $this->response;
    }
}
