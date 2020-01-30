<?php

ob_start();
session_start();

require __DIR__. "/vendor/autoload.php";
require "source/Config.php";
use CoffeeCode\Router\Router;


$router = new Router("https://www.localhost/upinside/");
$router->namespace("Source\Controllers");

$router->group(null);


/*
 * WEB
 */

$router->get("/", "Web:login", "web.login");
$router->get("/cadastrar", "Web:register", "web.register");
$router->get("/recuperar", "Web:forget", "web.forget");
$router->get("/senha/{email}/{forget}", "Web:reset", "web.reset");



/*
 * AUTH
 */



/*
 * AUTH SOCIAL
 */


/*
 * PROFILE
 */


/*
 * ERROS
 */
$router->group("ops");
$router->get("/{errcode}", "Web:error", "web.error");


/*
 * ROUTER PROCESS
 */

if($router->error()){
    $router->redirect("web.error", [
        "errcode" => $router->error()
    ]);
}


$router->dispatch();
ob_end_flush();

