<?php



include_once './config/library.php';
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2017
 * Time: 12:14 م
 */
class HomeController
{
    public function index(){
        view("index");
    }
    public function Search($x1, $x2){
        if(strpos($x2, $x1) !== FALSE) print 'OK'; else print 'NO';
    }
    public function list_of_mobile(){
        $arr = array("mobile1", "mobile2", "mobile3", "mobile4");
        print_r($arr);
    }
}