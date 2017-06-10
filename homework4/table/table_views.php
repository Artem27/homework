<?php if ( !empty($bd) ) :

    /* {Вывод информации} */
    echo '<table border=1px>';
        echo '<tr>';

            echo '<th>Наименование</th>';
            echo '<th>Цена</th>';
            echo '<th>Количество заказано</th>';
            echo '<th>Уведомление</th>';
            echo '<th>Остаток на складе</th>';
            echo '<th>Скидка на товар</th>';
            echo '<th>Цена со скидкой</th>';
        echo '</tr>';

        foreach ($bd as $key1 => $value){
            echo '<tr>';

                echo "<td style='text-align:center'>{$key1}</td>";
                echo "<td style='text-align:center'>{$value['цена']}$</td>";
                echo "<td style='text-align:center'>{$value['количество заказано']} шт.</td>";
                echo "<td style='text-align:center'>{$value['уведомление']}</td>";
                echo "<td style='text-align:center'>{$value['осталось на складе']} шт.</td>";
                echo "<td style='text-align:center'>{$value['скидка на товар']}</td>";
                echo "<td style='text-align:center'>{$value['цена со скидкой']}$</td>";

            echo '</tr>';
        }
    echo '</table>';

endif;

