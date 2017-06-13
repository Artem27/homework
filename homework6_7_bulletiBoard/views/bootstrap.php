<?php
/* {Всё относительно index.php} */

/* {Запускаем сессию} */
session_start();

/* {Подключаем данные} */
require_once ('database.php');

/* {Подключаем функцию приветствия и даты} */
require_once ('models/functions.php');

/* {Функция приветствия и вывода даты} */
$hello_display = hello_display();

$pages = array(

    'about'  => array(
        'title'   => 'Обо мне',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/about_page.php',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    ),

    'career' => array(
        'title'   => 'Карьерный путь',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/career.php',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    ),

    'study'  => array(
        'title'   => 'Образование',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/study.php',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    ),

    'skills' => array(
        'title'   => 'Проффесиональные навыки',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/skills.php',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    ),

    'ads'    => array(
        'title'   => 'Доска объявлений',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/ads_page_display.php',
        'submit'  => 'Добавить объявление',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    ),

    'calculator' => array(
        'title'   => 'Экономический калькулятор',
        'script'  => 'models/models.php',
        'mod'     => 'nav__item_active',
        'view'    => 'views/pages/calculator.php',
        'script_cookie'  => 'models/models_cookie.php',
        'script_file'    => 'models/models_file.php'
    )
);

$page = filter_input(INPUT_GET, 'page');

/* {Контроллер страниц} */
if ( isset($pages[$page])) {
    $title   = $pages[$page]['title'];
    $view    = $pages[$page]['view'];
    $active  = $pages[$page]['mod'];
    $mod     = 'active_'.$page;
    $submit  = isset( $pages[$page]['submit'] ) ? $pages[$page]['submit'] : '';
    $models  = isset( $pages[$page]['script'] ) ? $pages[$page]['script'] : '';
    $cookie  = isset( $pages[$page]['script_cookie'] ) ? $pages[$page]['script_cookie'] : '';
    $file    = isset( $pages[$page]['script_file'])    ? $pages[$page]['script_file']   : '';

    /* {Запись в сессию
        include $models;} */

    /* {Запись в куки
       include $cookie;} */

    /* {Запись в фаил} */
    include $file;
    include ('views/pages/header.php');
    include ('views/pages/aside.php');
    include  $view;
    include ('views/pages/footer.php');

} else {
    $title = 'Главная страница';

    include ('views/pages/header.php');
    include ('views/pages/aside.php');
    include ('views/pages/about_page.php');
    include ('views/pages/footer.php');
}





