<?php

namespace App\Controllers;
//aqui estou criando um conjunto de pastas no mesmo escopo

use App\Lib\Sessao;
//estou utilizando e chamando uma classe chamada Sessão

abstract class Controller
{
    protected $app;//criamos duas variáveis 
    private $viewVar; //acessada por meio do get/set

    public function __construct($app)
    {
        $this->setViewParam('nameController',$app->getControllerName());
    }

    public function render($view)
    {
        $viewVar = $this->getViewVar();
        $Sessao  = Sessao::class;

        require_once PATH . '/App/Views/layouts/header.php';
        require_once PATH . '/App/Views/layouts/menu.php';
        require_once PATH . '/App/Views/' . $view . '.php';
        require_once PATH . '/App/Views/layouts/footer.php';
    }

    public function redirect($view)
    {
        header('Location: http://' . APP_HOST . $view);
        exit;
    }

    public function getViewVar()
    {
        return $this->viewVar;
    }

    public function setViewParam($varName, $varValue)
    {
        if ($varName != "" && $varValue != "") {
            $this->viewVar[$varName] = $varValue;
        }
    }
}