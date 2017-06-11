<?php
function full_news($value){
    echo '<h3 style="text-align: center">Извените, такой новости на данной странице нет!</h3>';
    echo '<h3 style="text-align: center">Возможно Вы искали что-то из этого?</h3>';
    echo '<h2 style="text-align: center">Все новости</h2>';
    foreach($value as $v){
        echo "<ul><li>$v</li></ul>";
    }
     echo '<a href="form.html">Вернуться назад</a>';
}
function one_news($value){
    echo "<h2>$value</h2><br>";
    echo '<a href="form.html">Вернуться назад</a>';
}


