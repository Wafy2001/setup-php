<?php

use Core\Router;


const BASE_PATH =  __DIR__ . "/../";
require BASE_PATH . "utils/basePath.php";
	spl_autoload_register(function ($class) {
		$result = str_replace('\\', DIRECTORY_SEPARATOR, $class);
		require basePath("{$result}.php");
	});

require basePath("utils/view.php");
require basePath("utils/dd.php");


$r = new Router();
require basePath("routes/routes.php");
require basePath("utils/initializeContainer.php");

$requestPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$r->route($requestPath, $method);

?>