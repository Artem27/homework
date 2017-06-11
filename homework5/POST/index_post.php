<?php header ('Content-type: text/html; charset=utf-8');
      error_reporting(E_ERROR | E_WARNING | E_NOTICE);
      ini_set('display_errors', 1);

/* {Работа с методом POST} */

require_once ('data/data_post.php');
require_once ('models/my_functions_post.php');

$id_post = filter_input(INPUT_POST , 'id');

/* {Если в массиве с новостями существует определённый номер
    и он является числом или строкой содержащее число, выводим новость} */
if ( isset($array_news[$id_post]) && is_numeric($id_post) ) {
      one_news($array_news[$id_post]);

/* {Если номера номера новости не существует и это не число
    выводим список всех новостей} */
} elseif ( empty($id_post) ) {
      /* {Подключаем форму} */
      echo '<h4> Введите пожалуйста номер новости <h4>';
      include ('views/form.php');

} elseif ( !empty($id_post) ) {

      if ( !isset($array_news[$id_post]) or !is_numeric($id_post) ) {
            include ('views/not_Found_post.html');
      }

} else {
/* {В противном случае выводи 404 ошибку} */
      full_news($array_news);
}




