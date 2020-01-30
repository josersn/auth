<?php

/*
 * SITE CONFIG
 */
define("SITE", [
    "name" => "AUTH em MVC whit PHP",
    "desc" => "AUTH WITH php to plataform",
    "domain" => "localhost.com",
    "locale" => "pt_BR",
    "root" => "https://www.localhost/upinside/"
]);
/*
 * SITE MINIFY
 */
if($_SERVER['SERVER_NAME'] == 'localhost'){
    require __DIR__ . "Minify.php";
}

/*
 *  DATABASE CONFIG
 */
define("DATA_LAYER_CONFIG", [
    "driver" => "mysql",
    "host" => "localhost",
    "port" => "3306",
    "dbname" => "auth",
    "username" => "root",
    "passwd" => "",
    "options" => [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ]
]);

/*
 * SOCIAL CONFIG
 */

define("SOCIAL", [
    "facebook_page" => "",
    "facebook_author" => "",
    "facebook_appID" => "",
    "twitter_create" => "",
    "twitter_site" => ""
]);

/*
 *  MAIL CONFIG
 */
define('MAIL', []);

/*
 *  FACEBOOK LOGIN CONFIG
 */
define('FACE_LOGIN', []);

/*
 *  GOOGLE LOGIN CONFIG
 */
define('GOOGLE_LOGIN', []);
