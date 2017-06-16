<?php

/* {Путь до нашего проекта} */
$project_root = $_SERVER['DOCUMENT_ROOT'];

/* {Добавляем путь до папок в smarty} */
$smarty_dir   = $project_root.'/devshcoolHomework/homework8_smarty/smarty/';

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

/* {Сессия} */
session_start();

/* {Если индекса ads не существует, создаём  $_SESSION['ads'] и ложим пустой массив } */
if (!isset($_SESSION['ads'])) {
    $_SESSION['ads'] = array();
}

/*------------------------------------------------------------------*/
/* {Подключение данных} */
require_once ('database.php');

$smarty->assign ('alphabet_city', $alphabet_city);
$smarty->assign ('alphabet_station_metro', $alphabet_station_metro);
$smarty->assign ('category', $category);

/*------------------------------------------------------------------*/
/* {Подключение функции приветствия и вывода даты} */
require_once ('models/functions.php');

/* {Функция вывода приветствия и даты} */
/* {С помощью функции assign задаём переменную в smarty} */
$helloDisplay = helloDisplay();
$smarty->assign('helloDisplay', $helloDisplay);


$pages = array(

    'about'  => array(
        'title'   => 'Обо мне',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'about_page.tpl',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    ),

    'career' => array(
        'title'   => 'Карьерный путь',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'career_page.tpl',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    ),

    'study'  => array(
        'title'   => 'Образование',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'study_page.tpl',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    ),

    'skills' => array(
        'title'   => 'Проффесиональные навыки',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'skills_page.tpl',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    ),

    'ads'    => array(
        'title'   => 'Доска объявлений',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'ads_page.tpl',
        'submit'  => 'Добавить объявление',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    ),

    'calculator' => array(
        'title'   => 'Экономический калькулятор',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'calculator_page.tpl',
        'script_cookie' => 'models/models_cookie.php',
        'script_file'   => 'models/models_file.php'
    )
);

/* {Фильтруем переменные GET} */
$page = filter_input(INPUT_GET, 'page');

/* {Контроллер подключения страниц} */
if( isset($pages[$page])) {
    /* {Заголовок} */
    $smarty->assign('title',  $pages[$page]['title']);

    /* {Вид определённой страницы} */
    $smarty->assign('view',   $pages[$page]['view']);

    /* {Модификаторы для сайдбара} */
    $smarty->assign('active', $pages[$page]['mod']);

    /* {Кнопка} */
    $smarty->assign('submit', isset( $pages[$page]['submit']) ? $pages[$page]['submit'] : '');

    /* {Переменная $ads} */
    $smarty->assign('ads', isset($_SESSION['ads']) ? $_SESSION['ads'] : '');

    /* {Условие для модификатора сайдбара} */
    $smarty->assign('mod', 'active_'.$page);

    /* {Скрипт} */
    $models = isset ( $pages[$page]['script'])        ? $pages[$page]['script'] : '';
    $cookie = isset ( $pages[$page]['script_cookie']) ? $pages[$page]['script_cookie'] : '';
    $file   = isset ( $pages[$page]['script_file'])   ? $pages[$page]['script_file'] : '';

    /* {Подключаем скрипты и отображения страниц} */
    /* {script session} */
    /* require_once ($models); */

    /* {script cookie} */
    /* require_once ($cookie); */

    /* {script file} */
    require_once ($file);
    
    $smarty->display('header.tpl');
    $smarty->display('sidebar.tpl');
    $smarty->display($pages[$page]['view']);
    $smarty->display('footer.tpl');

} else {
    /* {Заголовок} */
    $smarty->assign('title', 'Главная страница');

    /* {Подключаем шаблоны начальной страницы} */
    $smarty->display('header.tpl');
    $smarty->display('sidebar.tpl');
    $smarty->display('about_page.tpl');
    $smarty->display('footer.tpl');
}




