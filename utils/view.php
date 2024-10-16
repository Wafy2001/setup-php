<?php 

function view($path,$data) {
    extract($data);
    require BASE_PATH. "views/".$path;
}

?>