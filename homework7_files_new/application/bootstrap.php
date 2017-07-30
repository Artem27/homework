<?php
/* {Файл для хранения объявлений} */
$file = 'application/files/file_ads.html';

require_once 'core/model.php';

$controller_name = 'about';
$action_name     = 'index';
$params          = '';
$number          = '';

$routes_array = explode('/', $_SERVER['REQUEST_URI']);

if (!empty($routes_array[2])) {
    $controller_name = $routes_array[2];
}

if (!empty($routes_array[3])) {
    $action_name = $routes_array[3];
}

$params_slice = array_slice($routes_array, 4);
if (!empty($params_slice[0])) {
    $params = $params_slice[0];
}

if (isset($params_slice[1])) {
    if (!empty($params_slice[1]) or (int)$params_slice[1] === 0) {

        if (is_numeric($params_slice[1])) {
            $number = (integer)$params_slice[1];
            $_GET['edit_ad'] = $number;
        }

    } else {
        $number = '';
    }
}

/* {Вывод объявлений, если куки существуют и они не пусты} */
if (file_exists($file)) {
    /* {Если файл существует, считываем его содержимое} */
    $content = file_get_contents($file);
    $ad      = '';

    if (!empty($content)) {
        $ads = unserialize($content);
    }

}else {
    /* {Если файла не существует, то создаём его для дальшейших записей} */
    if (!$handle = fopen($file, 'w+')) {
        exit();
    }
}

/* {Function} */
// Если пришёл пост и он не пуст, то вызывам функцию валидации данных и записываем в сесиию
$function_filename = 'function_'.$params.'.php';
$function_file     = 'application/functions/'.$function_filename;
$function_name     = $controller_name.'_'.$params;

if (file_exists($function_file)) {
    require_once $function_file;

    if (function_exists($function_name)) {

        if (!empty($_POST) && isset($_POST['submit'])) {
            $post = $function_name($_POST);

            if (!empty($post['id']) or $post['id'] === '0') {
                $id = $post['id'];
                $ads[$id] = $post;

            } else {
                $ads[] = $post;
            }

        } else {

            /* {Function deleted} */
            if (!empty($number) || ($number === 0)) {
                unset($ads[$number]);
            }
        }
    }
}

/* {Псоле всех проверок записываем в файл} */
if (!empty($ads) || $ads === array()) {

    if($number || $number === 0) {
        $ad  = isset($ads[$number]) ? $ads[$number] : '';
    }

    /* {Проверяем, готов ли файл для записи} */
    if (is_writable($file)) {
        $content_file = serialize($ads);

        if (!$handle = fopen($file, 'w')) {
            exit('ОШИБКА! Файл ads.html не был открыт для записи!');
        }

        if (fwrite($handle, $content_file) === false) {
            exit('ОШИБКА! Объявление не было записанно в файл!');

        } else {
            fclose($handle);
        }

    } else {
        exit('ОШИБКА! Файл для не готов для записи!');
    }
}

/* {Models} */
$model_file   = 'model_'.$controller_name.'.php';
$model_path   = 'application/models/'.$model_file;
$model_name   = 'Data'.ucfirst($controller_name);
$model_action = 'data'.ucfirst($action_name);

if (file_exists($model_path)) {
    require_once $model_path;
    
    $category = new DataCategory();

    /* {Подключение категорий} */
    /* {Города} */
    require_once 'special_functions/function_alphabetic_city.php';
    $alphabet_city = sort_alphabetic_city($city_array = $category->cityDisplay());

    /* {Станции метро} */
    require_once 'special_functions/function_alphabetic_stations.php';
    $alphabet_stations = sort_alphabetic_stations($stations_array = $category->stationDisplay());

    /* {Категории} */
    require_once 'special_functions/function_alphabetic_category.php';
    $alphabet_category = sort_alphabetic_category($category_array = $category->categoryDisplay());

    /* {Скрипт для БД} */
    if (class_exists($model_name)) {

        $model  = new $model_name;
        $action = $model_action;

        if (method_exists($model_name, $model_action)) {

            if ($number) {
                $model_name->$model_action($number);

            } else {
                $data = $model->$model_action();
            }
        }
    }
}

/* {Controller} */
$controller_file = 'controller_'.$controller_name.'.php';
$controller_path = 'application/controllers/'.$controller_file;
$function_action = 'action_'.$action_name;
$page_file       = $controller_name.'_page.php';

if (file_exists($controller_path)) {
    include $controller_path;

    if (function_exists($function_action)) {
        if (!empty($ads) or !empty($ad)) {
            $data_array = $function_action($page_file, $ads, $ad);

        } else {
            $data_array = $function_action($page_file);
        }

        include 'application/views/template_page.php';

    } else {
        if (file_exists($error_file = 'application/functions/function_error_404.php')) {
            require_once 'application/functions/function_error_404.php';
            error_404();
        }
    }

} else {
    if (file_exists($error_file = 'application/functions/function_error_404.php')) {
        require_once 'application/functions/function_error_404.php';
        error_404();
    }
}