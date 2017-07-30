<?php

/* {Путь до нашего проекта} */
$project_root = $_SERVER['DOCUMENT_ROOT'];

/* {Добавляем путь до папок в smarty} */
$smarty_dir   = $project_root.'/homework_8_smarty_new/application/smarty/';

/* {Подключение класса Smarty} */
require($smarty_dir.'libs/Smarty.class.php');

$smarty = new Smarty();

/* {Настройки Smarty} */
$smarty->compile_check = true;
$smarty->debugging     = true;

/* {Пути} */
$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir  = $smarty_dir.'templates_c';
$smarty->cache_dir    = $smarty_dir.'cache';
$smarty->config_dir   = $smarty_dir.'configs';


