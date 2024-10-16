<?php 

use Core\Router;

$r = new Router();

$r->get('/', "index.php");
$r->get('/about', "about.php");

?>