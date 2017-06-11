<?php
function full_news($value){
    echo '<h3 style="text-align: center">Извените, такой новости на данной странице нет!</h3>';
    echo '<h3 style="text-align: center">Возможно Вы искали что-то из этого?</h3>';
    echo '<h2 style="text-align: center">Все новости</h2>';
    $num = 0;
    foreach($value as $v){
        $num++;
        echo "<ul><li>$num $v</li></ul>";
    }
    echo '<h3>Воспользуйтесь поиском</h3>';
    
    echo '  <form action="./index_get.php" method="GET" class="search">
                <input class="search__input" value="" type="text" name="id" title="Поиск новостей" placeholder="Введите номер">
                <input type="submit" class="btn" value="Поиск">
            </form>';
}
function one_news($value){ 
    echo "<h2>$value</h2><br>";
}


