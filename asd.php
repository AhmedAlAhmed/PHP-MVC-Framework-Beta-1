/*
$routes = null;
if(isset($_SERVER['PATH_INFO']))
$routes = explode("/", $_SERVER['PATH_INFO']);
else{
//print '<h1>Home Page</h1>';
}






array_shift($routes);

function match($MASK, $Route){
$mask_arr = explode("/", $MASK);
$Route_arr = explode("/", $Route);

array_shift($Route_arr);
//print count($mask_arr) . ' ' . count($Route_arr);

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

function compare($n1, $n2){
print 'compare between : ' . $n1 . ' and ' . $n2 . '<Br>';
}

//functio
function sum($a1, $a2){
$x  =$a1+$a2;
print "SUM = " . $x . '<br>';
print $_POST['name'] . ' ' . $_POST['email'] . '<Br>';
}



function get_route_callback($r, $callback = null){


if(match($r, $_SERVER['PATH_INFO']) == false) {
header("HTTP/1.1 404 Not found.");
print '<h1>Page Not Found. <h1>';
        exit();
        }

        global $routes;
        $arr = explode("/", $r);




        /*
        print_r($arr);
        print '<br>';
        print_r($routes);
        print '<Br>';*/

        $vars = [];
        $i = 0;
        foreach($arr as $item){

        //print $item . ' ' . $routes[$i] . '<Br>';
        if($item == '?'){
        $vars[] = $routes[$i];
        }else if($item != $routes[$i]) break;
        $i++;
        }

        call_user_func_array($arr[0], $vars); // if we use controller.
        if($callback != null)
        call_user_func_array($callback, $vars); // if we use callback function.

        exit();
        }

        /*get_route_callback("sum/?/?", function($id, $name){

        });
        */
        */
