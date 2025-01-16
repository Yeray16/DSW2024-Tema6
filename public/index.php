<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use Philo\Blade\Blade;

require '../vendor/autoload.php';
$pathController = "Dsw\\Tema6\\Controllers\\";

$router = new AltoRouter();

$views = '../src/views';
$cache = '../cache';
$blade = new Blade($views, $cache);

if(isset($_POST['_method'])) {
  $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

// map homepage
$router->map('GET', '/', function() use ($blade){
  echo $blade->view()->make('index')->render();
});

//Aquí estan todas las ruas
include ('../src/routers/user.php');
include ('../src/routers/group.php');

$match = $router->match();
if(is_array($match)) {
	if(is_callable($match['target'])){
    call_user_func_array( $match['target'], $match['params'] );
  } else {
    $target = $match['target'];
    list($controllerName, $action) = explode('#', $target);
    $controller = new ($pathController . $controllerName)();
    $controller->$action($match['params']);
  }
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>