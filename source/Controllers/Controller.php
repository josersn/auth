<?php


namespace Source\Controllers;

use CoffeeCode\Optimizer\Optimizer;
use CoffeeCode\Router\Router;
use League\Plates\Engine;

/**
 * Class Controller
 * @package Source\Controllers
 */
abstract class Controller
{
    /* @var Engine */
    protected $view;
    /* @var Router */
    protected $router;
    /* @var Optimizer */
    protected $seo;

    /**
     * Controller constructor.
     * @param $router
     */
    public function __construct($router)
    {
        $this->router = $router;
        $this->view = Engine::create(dirname(__DIR__, 2) . "/views", "php");
        $this->view->addData(["router" => $this->router]);

        $this->seo = new Optimizer();
        $this->seo->openGraph("AUTH em MVC whit PHP", "pt_BR", "article")
            ->publisher("#", "#")
            ->twitterCard("#", "#", "https://www.localhost/upinside")
            ->facebook("#" );
    }

    /**
     * @param string $param
     * @param array $values
     * @return string
     */
    public function ajaxResponde(string $param, array $values):string
    {
        return json_encode([$param => $values]);
    }
}

