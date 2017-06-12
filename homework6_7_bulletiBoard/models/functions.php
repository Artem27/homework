<?php

/* =        Здесь функционал         = */

// =  Время и дата  = \\
function helloDisplay() {

    $date = explode('.', date('d.m.Y.l'));

    switch ($date[1]) {

        case '01' : $m = 'Января';   break;
        case '02' : $m = 'Февраля';  break;
        case '03' : $m = 'Марта';    break;
        case '04' : $m = 'Апреля';   break;
        case '05' : $m = 'Мая';      break;
        case '06' : $m = 'Июня';     break;
        case '07' : $m = 'Июля';     break;
        case '08' : $m = 'Августа';  break;
        case '09' : $m = 'Сентября'; break;
        case '10' : $m = 'Октября';  break;
        case '11' : $m = 'Ноября';   break;
        case '12' : $m = 'Декабря';  break;
    }

    switch ($date[3]) {

        case 'Monday'    : $l = 'Понедельник'; break;
        case 'Tuesday'   : $l = 'Вторник';     break;
        case 'Wednesday' : $l = 'Среда';       break;
        case 'Thursday'  : $l = 'Четверг';     break;
        case 'Friday'    : $l = 'Пятница';     break;
        case 'Saturday'  : $l = 'Суббота';     break;
        case 'Sunday'    : $l = 'Воскресенье'; break;
    }

    $time = (int) date('H : i');

    if ($time > 4 && $time <= 11) {
        $hello = 'Доброе утро!';

    } elseif ($time > 11 && $time <= 17) {
        $hello = 'Добрый день!';

    } elseif ($time > 17 && $time <= 22) {
        $hello = 'Добрый вечер!';

    } elseif ($time > 22 && $time <= 24) {
        $hello = 'Доброй ночи!';

    } elseif ($time >= 0 && $time <= 4) {
        $hello = 'Доброй ночи!';
    }

    $dateHello = "$hello Сегодня: $date[0] $m $date[2] $l";

    return $dateHello;
}











