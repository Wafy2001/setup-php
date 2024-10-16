<?php
use Core\App;
use Core\Database;
$db = App::resolve(Database::class);
$heading = "home";

$notes = $db->query("SELECT * from note")->findAll();
dd($notes);



view('index.view.php',[
    'heading' => $heading,
])

?>