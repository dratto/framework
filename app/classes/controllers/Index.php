<?php

namespace App\Controllers;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;

/**
 * Description of Index
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */

class Index 
{
    
    public function index(Request $request, Response $response)
    {
        echo "Hello World!";
        
        return $response;
    }
    
    
}
