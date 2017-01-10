<?php


ini_set("display_errors", 1);
error_reporting(E_ALL);

include_once './config/Route.php';
$route = new Route();

$route->get("search/?/?", "HomeController@Search");

$route->get("/", "HomeController@index");

$route->get("mobiles/list/", "HomeController@list_of_mobile");




$route->start();

?>