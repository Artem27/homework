<?php

/* {Убираем пробелы} */
if ( !empty($_POST) ) {
    $_POST['user_name']   = trim($_POST['user_name']);
    $_POST['ads_name']    = trim($_POST['ads_name']);
    $_POST['price']       = str_replace(' ', '', $_POST['price']);
    $_POST['description'] = trim($_POST['description']);
}

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |      Функция валидации данных          |
                    |      и проверки заполненные данные     |
                    |                                        |
                    |______________________________________ */

function validate_post($post) {

    /* {Проверка на обязательные заполненные данные} */
    if (!empty($post)) {

        if (empty($post['user_name'])) {
            $message['error']['error_user_name']        = 'Вы не ввели имя';
            $message['error_input']['input_error_user'] = 'inputs__input_error';
        }

        if (empty($post['user_email'])) {
            $message['error']['error_user_email']        = 'Вы не ввели email';
            $message['error_input']['input_error_email'] = 'inputs__input_error';

            /* {Проверака на валидность} */
        } elseif (filter_var($post['user_email'], FILTER_VALIDATE_EMAIL) === false) {
            $message['error']['error_user_email']        = 'Вы ввели некорректный email';
            $message['error_input']['input_error_email'] = 'inputs__input_error';
        }

        if (!isset($post['city_index'])) {
            $message['error']['error_city_index']       = 'Вы не выбрали город';
            $message['error_input']['input_error_city'] = 'inputs__input_error';
        }

        if (empty($post['ads_name'])) {
            $message['error']['error_ads_name']             = 'Вы не ввели название';
            $message['error_input']['input_error_ads_name'] = 'inputs__input_error';

        } elseif (is_numeric($post['ads_name'])) {
            $message['error']['error_ads_name']             = 'Не корректное название';
            $message['error_input']['input_error_ads_name'] = 'inputs__input_error';
        }

        $post['price'] = str_replace(' ', '', $post['price']);

        if (empty($post['price'])) {
            $message['error']['error_price']             = 'Вы не указали цену';
            $message['error_input']['input_error_price'] = 'inputs__input_error';

            /* {Проверака на правильность цены} */
        } elseif (!is_numeric($post['price'])) {
            $message['error']['error_price']             = 'Вы неправильно указали цену';
            $message['error_input']['input_error_price'] = 'inputs__input_error';
        }

        if ( isset($message) ) {
            return $message;
        }

    } else {
        $message = '';
        return $message;
    }
}

$display_error = validate_post($_POST);

/* {Объявляем переменную Smarty, так как переменная имеет вывод данных и работает с .tpl} */
$smarty->assign ('display_error', $display_error);

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |       Функция записи объявлений        |
                    |                                        |
                    |______________________________________ */

function entry_ads ($post, $validate_post) {

    if ( !empty($post) && empty($validate_post) ) {

        if ( empty($post['id'] ) && $post['id'] !== '0') {

            /* {Записываем в сессию} */
            $_SESSION['ads'][] = $_POST;
            /* {Шифруем данные, чтобы записать в куки} */
            $cookie_ads = serialize($_SESSION['ads']);

            /* {Даём куке время жизни ровно 7 дней} */
            setcookie('ads', $cookie_ads, strtotime('+7 days') );

            /* {===== Редирект (-- F5 --) =====} */
            header( "Location: {$_SERVER['REQUEST_URI']}" );
            exit();
        }

    }   return $validate_post;
}

$display_ads = entry_ads($_POST ,$display_error);

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |   Функция редактирования объявлений    |
                    |                                        |
                    |______________________________________ */

function rewrite_ads ($post, $validate_post) {

    if ( !empty($post) && empty($validate_post) ) {

        if ( !empty($post['id']) || $post['id'] === '0') {
            $id_post = (int)$post['id'];
            /* {Перезаписываем отредактированные данные} */
            $_SESSION['ads'][$id_post] = $post;

            /* {Шифруем данные, чтобы записать в куки} */
            $cookie_ads = serialize($_SESSION['ads']);

            /* {Даём куке время жизни ровно 7 дней} */
            setcookie('ads', $cookie_ads, strtotime('+7 days') );

            /* {===== Редирект (-- F5 --) =====} */
            header( "Location: {$_SERVER['REQUEST_URI']}" );
            exit();
        }
    }
}

$edit_ads = rewrite_ads($_POST, $display_error);

/* {Проверка полсе редактирования на заполненные обязательные поля} */

if ( (isset($_POST['id']) && (!empty($_POST['id']) || $_POST['id'] === '0') ) && !empty($display_error)) {

    /* {Если есть какие-либо ошибки, то выводим все данные в форму
        и указываем ощибку в форме} */
    $ads_edit    = $_POST;
    $checked     = isset($ads_edit['checkbox_email']) ? 'checked' : '';
    $city        = isset($ads_edit['city_index'])     ? $ads_edit['city_index'] : '';
    $metro       = isset($ads_edit['metro_index'])    ? (int)$ads_edit['metro_index'] : '';
    $category_id = isset($ads_edit['category_index']) ? (int)$ads_edit['category_index'] : '';
    $id          = isset($ads_edit['id'])             ? $ads_edit['id'] : '';

    /* {Добавляем переменные смарти} */
    $smarty->assign ('ads_edit', $ads_edit);
    $smarty->assign ('checked', $checked);
    $smarty->assign ('submit', 'Сохранить изменения');
    $smarty->assign ('city', $city);
    $smarty->assign ('metro', $metro);
    $smarty->assign ('category_id', $category_id);
    $smarty->assign ('id', $id);
}

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |         Запрос на редактирование       |
                    |                                        |
                    |______________________________________ */


if ( isset($_GET['edit']) ) {
    /* {Достаём данные из куки и расшифровываем их} */
    $_SESSION['ads'] = unserialize($_COOKIE['ads']);
    sort($_SESSION['ads']);

    /* {Выводим данные в форму} */
    $ads_edit    = ($_SESSION['ads'][$_GET['edit']]);
    $checked     = isset($ads_edit['checkbox_email']) ? 'checked' : '';
    $submit      = 'Сохранить изменения';
    $city        = isset($ads_edit['city_index'])     ? $ads_edit['city_index'] : '';
    $metro       = isset($ads_edit['metro_index'])    ? (int)$ads_edit['metro_index'] : '';
    $category_id = isset($ads_edit['category_index']) ? (int)$ads_edit['category_index'] : '';

    /* {Добавляем переменные смарти} */
    $smarty->assign ('ads_edit', $ads_edit);
    $smarty->assign ('checked', $checked);
    $smarty->assign ('submit', 'Сохранить изменения');
    $smarty->assign ('city', $city);
    $smarty->assign ('metro', $metro);
    $smarty->assign ('category_id', $category_id);
}

/* {запрос на удаление} */
if ( isset($_GET['deleted_ads']) ) {
    /* {Достаём данные из куки и расшифровываем их} */
    $_SESSION['ads'] = unserialize($_COOKIE['ads']);
    /* {Удаляем соотоветствующее номеру объявление} */
    unset ($_SESSION['ads'][$_GET['deleted_ads']]);

    /* {Далее перезаписываем куки и даём время жизни 7 дней} */
    $cookie_ads = serialize($_SESSION['ads']);
    setcookie('ads', $cookie_ads, strtotime('+7 days'));
    $_COOKIE['ads'] = $cookie_ads;
}

/* {Вывод объявления из куки, если куки существуют и они  не пусты} */
if ( isset($_COOKIE['ads']) && !empty($_COOKIE['ads']) ) {
    $ads = unserialize($_COOKIE['ads']);
    $smarty->assign ('ads', $ads);
    sort($ads);
}

