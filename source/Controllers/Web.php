<?php


namespace Source\Controllers;


class Web extends Controller
{

    public function __construct($router)
    {
        parent::__construct($router);

        if(!empty($_SESSION["user"])){
            $this->router->redirect("app.home");
        }
    }

    public function login():void
    {
        $head = $this->seo->optimize(
            "Faça Login para continuar sua conta no site ",
            "Site de login",
            $this->router->route("web.login"),
            "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text=Login"
        )->render();

        echo  $this->view->render("theme/login", [
            "head" => $head
        ]);
    }

    public function register():void
    {
        $head = $this->seo->optimize(
            "Crie sua conta no site ",
            "Site de login",
            $this->router->route("web.register"),
            "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text=Register"
        )->render();

        $form_user = new \stdClass();
        $form_user->first_name = null;
        $form_user->last_name = null;
        $form_user->email = null;

        echo  $this->view->render("theme/register", [
            "head" => $head,
            "user" => $form_user
        ]);
    }

    public function forgot():void
    {
        $head = $this->seo->optimize(
            "Recupere sua senha de login no site ",
            "Site de login",
            $this->router->route("web.forgot"),
            "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text=forget"
        )->render();

        echo $this->view->render("theme/forget", [
            "head" => $head
        ]);
    }

    public function reset($data):void
    {
        $head = $this->seo->optimize(
            "Criei sua nova senha ",
            "Site de login",
            $this->router->route("web.reset"),
            "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text=reset }"
        )->render();

        echo $this->view->render("theme/reset", [
            "head" => $head,
        ]);
    }

    public function error($data):void
    {
        $error = filter_var($data['errcode'], FILTER_VALIDATE_INT);
        $head = $this->seo->optimize(
            "OPPPSS {$error} ",
            "Site de login",
            $this->router->route("web.error", ["errcode" => $error]),
            "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text={$error} }"
        )->render();

        echo $this->view->render("theme/error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}
