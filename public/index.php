<?php
error_reporting(E_ALL ^ E_DEPRECATED);

use Philo\Blade\Blade;

require '../vendor/autoload.php';

$router = new AltoRouter();

$views = '../src/views';
$cache = '../cache';
$blade = new Blade($views, $cache);

if(isset($_POST['_method'])) {
  $_SERVER['REQUEST_METHOD'] = $_POST['_method'];
}

// map homepage
$router->map('GET', '/', function() use ($blade){
  //require __DIR__ . '/../src/views/index.php';
  //global $blade;
  echo $blade->view()->make('index')->render();
});

$router->map('GET', '/user', 'UserController#index', 'index');
$router->map('GET', '/user/[i:id]', 'UserController#show', 'user-show');
$router->map('GET', '/user/create', 'UserController#create', 'user-create');
$router->map('POST', '/user', 'UserController#post');
$router->map('DELETE', '/user/[i:id]', 'UserController#delete');

// echo URL to user-details page for ID 5
//echo $router->generate('user-details', ['id' => 5]); // Output: "/users/5"
$match = $router->match();
if(is_array($match)) {
	if(is_callable($match['target'])){
    call_user_func_array( $match['target'], $match['params'] );
  } else {
    $target = $match['target'];
    list($controllerName, $action) = explode('#', $target);
    $controller = new ("Dsw\\Tema6\\Controllers\\" . $controllerName)();
    $controller->$action($match['params']);
  }
} else {
	// no route was matched
	header( $_SERVER["SERVER_PROTOCOL"] . ' 404 Not Found');
}
?>