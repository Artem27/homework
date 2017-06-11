<?php header ('Content-type: text/html; charset=utf-8');
      error_reporting(E_ERROR | E_WARNING | E_NOTICE);
      ini_set('display_errors', 1);

/* {Работа с методом GET} */

include ('data/data_get.php');
require_once ('models/my_functions_get.php');

/* {Если существует запрос} */
if ( isset($_GET['id']) ) {

    /* {Если данный номер новости существует и это действительно номер,
        то выводим новость} */
    if ( isset($array_news[$_GET['id']] ) && is_numeric( $_GET['id']) ) {
        one_news($array_news[$_GET['id']]);

    /* {Если номер не является числом или строкой содержащую номер,
        то выводим 404 ошибку} */
    } elseif ( !is_numeric( $_GET['id']) ) {
        include 'views/not_Found_get.html';
        exit();

    } else {
        /* {Если номера новости не существует, то выводим все новости} */
        full_news($array_news);
    }

} else {
    /* {Если не существует запроса, то выводим 404 ошибку} */
    include 'views/not_Found_get.html';
    exit();
}

