<?php 
use Core\Database;
use Core\App;
use Core\Container;

$c = new Container();
$c->bind('Core\Database', function () {
    $dbConfig = require basePath("config/db.php");
    return new Database($dbConfig['database']);
});

App::setContainer($c);
?>