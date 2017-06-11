<?php header ('Content-type: text/html; charset=utf-8');
      error_reporting(E_ERROR | E_WARNING | E_NOTICE);
      ini_set('display_errors', 1);

/* {Работа с методом GET} */

include ('data/data_get.php');
require_once ('models/my_functions_get.php');

if ( isset($_GET['id']) ) {

    if ( isset($array_news[$_GET['id']] ) && is_numeric( $_GET['id']) ) {
        one_news($array_news[$_GET['id']]);

    } elseif ( !is_numeric( $_GET['id']) ) {
        include 'views/not_Found_get.html';
        exit();
    } else {
        full_news($array_news);
    }

} else {
    include 'views/not_Found_get.html';
    exit();
}

