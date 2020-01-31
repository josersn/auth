<?php

require ("Config.php");

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null):string
{
   if($param && !empty(SITE['$param'])){
       return SITE[$param];
   }
   return SITE['root'];
}

/**
 * @param string $param
 * @return string
 */
function routeImg(string $param):string
{
  return "https://via.placeholder.com/1200x628/o984e3/FFFFFF/?text={$param}";
}

/**
 * @param string $path
 * @return string
 */
function asset(string $path ): string
{
    return SITE['root']. "/views/assets{$path}";
}

/**
 * @param string|null $type
 * @param string|null $msg
 * @return string|null
 */
function flash(string $type = null, string $msg = null): ?string
{
    if($type && $msg){
        $_SESSION['flash'] = [
            "type" => $type,
            "message" => $msg
        ];
        return null;
    }

    if(!empty($_SESSION['flash']) && $flash = $_SESSION['flash']) {
        unset($_SESSION['flash']);
        return "<div class=\" message {$flash["type"]} \">{$flash["message"]}</div>";
    }

    return null;
}
