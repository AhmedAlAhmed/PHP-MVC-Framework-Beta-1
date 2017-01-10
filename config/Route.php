<?php

/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2017
 * Time: 12:18 م
 */

ini_set("display_errors", 1);
error_reporting(E_ALL);

include_once './Controllers/HomeController.php';

class Route
{
    private $all_available_routes = [];

    public function start(){

            $is_match = 0;
            foreach ($this->all_available_routes as $i){
                if(match($i, $_SERVER['PATH_INFO'])) {
                    $is_match = 1;
                    break;
                }
            }
            if($is_match == 0){
                print '<h1>404 Page Not Found.';
                exit();
            }
    }


    public function get($route, $controller = null, $callback = null){

        $dim = strpos($controller, '@');
        $controller_name = substr($controller, 0, $dim);
        $method_name = substr($controller, $dim+1);
        $instanceOfControllerName = new $controller_name;

        $this->all_available_routes[] =  $route;
        $current_route = explode("/", $_SERVER['PATH_INFO']);
        array_shift($current_route);

        if($route == '/' && strlen(trim($current_route[0])) == 0){
            call_user_func_array(array($instanceOfControllerName, $method_name), []);

            if($callback != null)
                call_user_func_array($callback, []);

            exit();

        }






        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            if(match($route, $_SERVER['PATH_INFO'])) {



                $current_route_paths = explode("/", $route);

                $vars = [];
                $i = 0;
                foreach($current_route_paths as $item){
                    if($item == '?'){
                        $vars[] = $current_route[$i];
                    }else if($item != $current_route[$i]) break;
                    $i++;
                }


                call_user_func_array(array($instanceOfControllerName, $method_name), $vars);

                if($callback != null)
                    call_user_func_array($callback, $vars);

                exit();

            }else{

            }
        }

    }
}