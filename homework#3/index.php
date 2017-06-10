<?php header ('Content-type: text/html; charset=utf-8');
      error_reporting(E_ERROR | E_WARNING | E_NOTICE);
      ini_set('display_errors', 1);

            //<========== Домашнее задание № 3 ==========>\\

    error_reporting(E_ERROR | E_WARNING | E_NOTICE);
    ini_set('display_errors', 1);

    //Создайте массив $date с пятью элементами
    //C помощью генератора случайных чисел забейте массив $date юниксовыми метками
          
    $date = array(
          mt_rand( 1, time() ),
          mt_rand( 1, time() ),
          mt_rand( 1, time() ),
          mt_rand( 1, time() ),
          mt_rand( 1, time() ));

    echo '<h3>Данный массив забит юниксовыми метками:</h3>';

    foreach ($date as $oneDate){

        echo '<ul>';
            echo "<li style='list-style:none'> $oneDate </li>";
        echo '</ul>';
    }

    echo '<hr>';

    //Сделайте вывод сообщения на экран о том, какой день в сгенерированном массиве
    //получился наименьшим, а какой месяц наибольшим

    $minDay = min(
             date('d - l', $date[0]),
             date('d - l', $date[1]),
             date('d - l', $date[2]),
             date('d - l', $date[3]),
             date('d - l', $date[4]));		

    $maxMonth = max(		
               date('m - F', $date[0]),		
               date('m - F', $date[1]),		
               date('m - F', $date[2]),		
               date('m - F', $date[3]),		
               date('m - F', $date[4]));		

    echo "Наименьший день в сгенерированном массиве: $minDay <br>
    Наибольший месяц: $maxMonth <br>";

    //Сортировка массива $date по возрастанию

    sort($date);

    foreach ($date as $oneDate){

        echo '<ul>';
            echo "<li style='list-style:none'> $oneDate </li>";
        echo '</ul>';
    }
                
    //Преобразование в привычный для нас формат даты

    for($i = 0; $i < 5; $i++){

        $normalDateFormat = date('d. m. Y', $date[$i]);
        echo "$normalDateFormat <br>";
    }

    echo '<hr>';

    //С помощью функция для работы с массивами извлеките последний элемент массива в новую переменную
    //C помощью функции date() выведите $selected на экран в формате "дд.мм.ГГ ЧЧ:ММ:СС"  

    echo '<br>';

    $selected = ( array_pop($date) );
    echo 'Последний элемент массива: ';

    echo "$selected <br>";


    //Привычный для нас формат даты

    echo 'Привычный для нас формат даты: ';

    $normalDateFormat_2 = ( date('d. m. Y H:i:s',$selected) );

    echo "$normalDateFormat_2 <br>";

    echo '<hr>';

    //Выставьте часовой пояс для Нью-Йорка, и сделайте вывод снова, 
    //чтобы проверить, что часовой пояс был изменен успешно

    echo 'Часовой пояс - '.date_default_timezone_get().'.<br>';
    echo "\n".'Текущее число и время - '.date('d. m. Y H:i:s');

    echo '<br>';

    date_default_timezone_set('America/New_York');

    echo '<br>';

    echo 'Часовой пояс - '.date_default_timezone_get().'. <br>';
    echo "\n".'Текущее число и время - '.date('m-F l, d. m. Y | H:i:s');
