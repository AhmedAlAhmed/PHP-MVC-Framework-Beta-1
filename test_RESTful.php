<?php
/**
 * Created by PhpStorm.
 * User: Ahmed
 * Date: 10/01/2017
 * Time: 01:06 م
 */


$url = "http://127.0.0.1/sites/MVC1/mobiles/list/";

//$data = array("name" => "Lorna", "email" => "lorna@example.com");
$context = stream_context_create(array(
    'http' => array(
        'method' => 'GET',
        'header' => array('Accept: application/json',
            'Content-Type: application/x-www-form-urlencoded')
    )
));
$result = file_get_contents($url);

print $result;







?>