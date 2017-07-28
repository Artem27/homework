<?php

function error_404() {
    $host = 'http://'.$_SERVER['HTTP_HOST'].$project = explode('/', $_SERVER['REQUEST_URI']); echo $project_string = !empty($project[1]) ? '/'.$project[1].'/' : ''.'application/views/';
    header('HTTP/1.1 404 Not Found');
    header('Status   404 Not Found');
    header('Location:'.$host.'404_error_page.php');
}
