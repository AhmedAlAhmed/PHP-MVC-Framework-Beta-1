<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2017
 * Time: 12:15 م
 */

    function view($file){
        include_once './Views/' . $file . '.php';
    }

    function match($MASK, $Route){
    $mask_arr = explode("/", $MASK);
    $Route_arr = explode("/", $Route);

    array_shift($Route_arr);
    if(count($mask_arr) != count($Route_arr)){
        return false;
    }else{
        for($i=0;$i<count($mask_arr); $i++){
            if($mask_arr[$i] == '?'){
                continue;
            }else{
                if($mask_arr[$i] != $Route_arr[$i]) return false;
            }
        }
        return true;
    }
}


?>