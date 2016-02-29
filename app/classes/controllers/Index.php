<?php

namespace App\Controllers;

use \Symfony\Component\HttpFoundation\Request;
use \Symfony\Component\HttpFoundation\Response;
use \DR\Controller;

/**
 * Description of Index
 *
 * @author Diogo Ratto <contato@diogoratto.com.br>
 */

class Index extends Controller
{
    public function __construct(Request $request, Response $response) {
        parent::__construct($request, $response);
    }
    
    public function index(Request $request, Response $response, $args)
    {        
        $pessoas = [
            [
                'nome' => ($args['nome']) ? $args['nome'] : 'Diogo Ratto', 
                'idade' => '21 anos'
            ],
        ];
        $title = "Titulo";
        
        return $this->view('index', ['pessoas' => $pessoas, 'title' => $title]);
    }        
}
