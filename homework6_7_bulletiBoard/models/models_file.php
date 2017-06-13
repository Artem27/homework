<?php
$filename = 'file/ads.html';

/* {Если не существует $_SESSION['ads'] - создаём $_SESSION['ads'] и записываем пустой массив} */
if ( !isset($_SESSION['ads']) ) {
    $_SESSION['ads'] = array();
}

/* {Немного редактируем данные} */
if ( !empty($_POST) ) {
    $_POST['user_name']   = trim($_POST['user_name']);
    $_POST['ads_name']    = trim($_POST['ads_name']);
    $_POST['price']       = str_replace(' ', '', $_POST['price']);
    $_POST['description'] = trim($_POST['description']);
}

                        /*_______________________________________
                        |                                        |
                        |                                        |
                        |        Функция проверки данных         |
                        |                                        |
                        |______________________________________ */


function validate_post($post) {

    /* {Проверка на обязательные заполненные данные
        В случае провальной валидации вернёт сообщение в соответствующий input
        и "повесит" модификатор класса 'inputs__input_error' для наглядности} */
    if (!empty($post)) {

        if (empty($post['user_name'])) {
            $message['error']['error_user_name']        = 'Вы не ввели имя';
            $message['error_input']['input_error_user'] = 'inputs__input_error';
        }

        if (empty($post['user_email'])) {
            $message['error']['error_user_email']        = 'Вы не ввели email';
            $message['error_input']['input_error_email'] = 'inputs__input_error';

            /* {Проверака на валидность email} */
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

            /* {Проверака на правильность введённой цены} */
        } elseif (!is_numeric($post['price'])) {
            $message['error']['error_price']             = 'Вы неправильно указали цену';
            $message['error_input']['input_error_price'] = 'inputs__input_error';
        }

        if ( isset($message) ) {
            /* {Если есть ошибки, вернёт массив с ошибками в форму} */
            return $message;
        }

    } else {
        $message = '';
        return $message;
    }
}

$display_error = validate_post($_POST);


                        /*_______________________________________
                        |                                        |
                        |                                        |
                        |       Функция записи объявлений        |
                        |                                        |
                        |______________________________________ */


function entry_ads ($post, $validate_post) {

    if ( !empty($post) && empty($validate_post) ) {

        if ( empty($post['id'] ) && $post['id'] !== '0') {

            $filename = 'file/ads.html';
            $file_ads = file_get_contents($filename);

            if ( empty($file_ads) ) {

                /* {Проверяем, готов ли файл для записи} */
                if (is_writable($filename)) {

                    /* {Шифруем данные сохраненные в сиссии} */
                    $_SESSION['ads'][] = $post;
                    $file_ads = serialize($_SESSION['ads']);

                    /* {Открываем файл для записи и передаём метку $handle} */
                    if ( !$handle = fopen($filename, 'w') ) {
                        echo 'ОШИБКА! Файл ads.html не был открыт для записи!';
                        exit();
                    }

                    /* {Записываем в файл ads.html содержимое $file_ads} */
                    if ( fwrite($handle, $file_ads) === FALSE) {
                        echo 'ОШИБКА! Объявление не было записанно в файл!';
                        exit();

                    } else {
                        /* {Закрываем файловый поток $handle} */
                        fclose($handle);
                    }

                } else {
                    echo 'ОШИБКА! Файл для не готов для записи!';
                    exit();
                }

            } else {

                /* {Если файл уже содержит данные, выводим объявления} */
                $file = file_get_contents($filename);
                $_SESSION['ads'] = unserialize($file);

                /* {Шифруем данные сохраненные в сиссии} */
                $_SESSION['ads'][] = $post;
                $file_ads = serialize( $_SESSION['ads']);

                /* {Открываем файл для записи и передаём метку $handle} */
                if (!$handle = fopen($filename, 'w') ) {
                    echo 'ОШИБКА! Файл ads.html не был открыт для записи!';
                    exit();
                }

                /* {Записываем в файл ads.html содержимое $file_ads} */
                if ( fwrite($handle, $file_ads) === FALSE ) {
                    echo 'ОШИБКА! Объявление не было записанно в файл!';
                    exit();

                } else {
                    /* {Закрываем файловый поток $handle} */
                    fclose($handle);
                }
            }

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

            $filename = 'file/ads.html';

            if ( isset($filename) && file_exists($filename) ) {

                $id_post = (int)$post['id'];
                $_SESSION['ads'][$id_post] = $post;
                $file_ads = serialize($_SESSION['ads']);

                /* {Проверяем, готов ли файл для записи} */
                if ( is_writable($filename) ) {

                    /* {Ставим метку $handle в файл ads.html} */
                    if ( !$handle = fopen($filename, 'w') ) {
                        echo 'ОШИБКА! Файл ads.html не был открыт для записи!';
                        exit();
                    }

                    /* {Записываем содержимое $file_ads в файл ads.html} */
                    if ( fwrite($handle, $file_ads) === FALSE) {
                        echo 'ОШИБКА! Объявление не было записанно в файл!';
                        exit();

                    } else {
                        /* {Закрываем файловый поток $handle} */
                        fclose($handle);
                    }

                } else {
                    echo 'ОШИБКА! Файл для не готов для записи!';
                    exit();
                }

            } else {
                echo 'Ошибка! Данного пути или файла не существует';
                exit();
            }

            /* {===== Редирект (-- F5 --) =====} */
            header( "Location: {$_SERVER['REQUEST_URI']}" );
            exit();
        }
    }
}

$edit_ads = rewrite_ads($_POST, $display_error);

/* {Проверка полсе редактирования на заполненные обязательные поля} */

if ( (isset($_POST['id']) && (!empty($_POST['id']) || $_POST['id'] === '0') ) && !empty($display_error)) {
    $ads_edit   = $_POST;
    $checked    = isset($ads_edit['checkbox_email']) ? 'checked' : '';
    $submit     = 'Сохранить изменения';
    $city       = isset($ads_edit['city_index'])     ? $ads_edit['city_index'] : '';
    $metro      = isset($ads_edit['metro_index'])    ? (int)$ads_edit['metro_index'] : '';
    $categoryId = isset($ads_edit['category_index']) ? (int)$ads_edit['category_index'] : '';
    $id         = isset($ads_edit['id'])             ? $ads_edit['id'] : '';

    /* {очищаем поля для вывода сообщения об ошибке} */
    if ( isset($display_error['error']['error_price']) ) {
        $ads_edit['price'] = '';
    }

    if ( isset($display_error['error']['error_user_email']) ) {
        $ads_edit['user_email'] = '';
    }

    if ( isset($display_error['error']['error_ads_name']) ) {
        $ads_edit['ads_name'] = '';
    }
}

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |         Запрос на редактирование       |
                    |                                        |
                    |______________________________________ */


if ( isset($_GET['edit']) ) {

    if ( isset($filename) && file_exists($filename) ) {
        $file = file_get_contents($filename);

        if ( !empty($file) ) {
            $_SESSION['ads'] = unserialize($file);

            $ads_edit   = ($_SESSION['ads'][$_GET['edit']]);
            $checked    = isset($ads_edit['checkbox_email']) ? 'checked' : '';
            $submit     = 'Сохранить изменения';
            $city       = isset($ads_edit['city_index'])     ? $ads_edit['city_index'] : '';
            $metro      = isset($ads_edit['metro_index'])    ? (int)$ads_edit['metro_index'] : '';
            $categoryId = isset($ads_edit['category_index']) ? (int)$ads_edit['category_index'] : '';
        }

    } else {
        echo 'Ошибка! Данного пути до файла не существует!';
        exit();
    }
}

                    /*_______________________________________
                    |                                        |
                    |                                        |
                    |            Запрос на удаление          |
                    |                                        |
                    |______________________________________ */

if ( isset($_GET['deleted_ads']) ) {

    if ( file_exists($filename) ) {
        $file = file_get_contents($filename);

        if ( is_writable($filename) ) {

            if ( !empty($file) ) {
                $_SESSION['ads'] = unserialize($file);
                unset( $_SESSION['ads'][$_GET['deleted_ads']] );
                sort($_SESSION['ads']);
                $file_ads = serialize($_SESSION['ads']);
            }

            if (!$handle = fopen($filename, 'w') ) {
                echo 'Ошибка! Не могу открыть файл для записи!';
                exit();
            }

            if ( fwrite($handle, $file_ads) === FALSE ) {
                $file_message = 'Ошибка записи в файла после удаления!';
                exit();

            } else {
                fclose($handle);
            }
        }
    }
}

/* {Если существует данный путь до файла и далее сам файл} */
if ( isset($filename) ) {

    /* {Если файл существует, считываем его содержимое} */
    if ( file_exists($filename) ) {
        $file = file_get_contents($filename);

        if ( !empty($file) ) {

            /* {Если в файле есть данные, то выводим их на страницу} */
            $_SESSION['ads'] = unserialize($file);

        } else {
            $_SESSION['ads'] = array();
        }

    } else {

        /* {Если файла не существует, то создаём его для дальшейших записей} */
        if ( !$handle = fopen($filename, 'w+') ) {
            $file_message = 'Ошибка создания файла!';
            exit();

        } else {
            /* {Закрываем файловый поток $handle} */
            fclose($handle);
        }
    }
}

