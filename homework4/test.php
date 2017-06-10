<?php header ('Content-type: text/html; charset=utf-8'); ?>

<?php
    error_reporting(E_ERROR | E_WARNING | E_NOTICE);
    ini_set('display_errors', 1);
    
    $ini_string = '
[игрушка мягкая мишка белый]
цена = '.mt_rand(1, 10).';
количество заказано = '.mt_rand(1, 10).'
осталось на складе = '.mt_rand(0, 10).';
diskont = diskont '.mt_rand(0, 2).';

[одежда детская куртка синяя синтепон]
цена = '.mt_rand(1, 10).';
количество заказано = '.mt_rand(1, 10).';
осталось на складе = '.mt_rand(0, 10).';
diskont = diskont '.mt_rand(0, 2).';

[игрушка детская велосипед]
цена = '.mt_rand(1, 10).';
количество заказано = '.mt_rand(1, 10).';
осталось на складе = '.mt_rand(0, 10).';
diskont = diskont '.mt_rand(0, 2).';';    
    
    $bd = parse_ini_string($ini_string, true);
    echo '<pre>';
    print_r($bd);
    echo '</pre>';
    
      
include 'My_functions.php';
    
foreach($bd as $key => $value){
    switch ($bd[$key]['diskont']) {
        case 'diskont 1':
            $product = discount10($bd[$key]['цена']);
            $bd[$key]['скидка на товар'] = $product.'$';
            $price_a_bike = price_discount10($bd[$key]['цена']);
            $bd[$key]['цена со скидкой'] = $price_a_bike;
            break;
        case 'diskont 2':
            $product = discount20($bd[$key]['цена']);
            $bd[$key]['скидка на товар'] = $product.'$';
            $price_a_bike = price_discount20($bd[$key]['цена']);
            $bd[$key]['цена со скидкой'] = $price_a_bike;
            break;
        case 'diskont 0':
            $bd[$key]['скидка на товар'] = No_discount();
            $price_a_bike = $bd[$key]['цена'];
            $bd[$key]['цена со скидкой'] = $price_a_bike;
            break;
        default: 'Что-то пошло не так';
            break;
    }
    $bd[$key]['уведомление'] = '';
    
    if($bd['игрушка детская велосипед']['количество заказано'] >= 3){
        $result_price_a_bike = result_discount30($bd['игрушка детская велосипед']['цена']);
        $bd['игрушка детская велосипед']['скидка 30%'] = $result_price_a_bike;
        if ($bd['игрушка детская велосипед']['diskont'] == 'diskont 0'){
            $bd['игрушка детская велосипед']['скидка на товар'] = $result_price_a_bike.'$'.'<br>'.discount30();
            $bd['игрушка детская велосипед']['цена со скидкой'] = $bd['игрушка детская велосипед']['цена'] - $result_price_a_bike;
        }
        if ($bd['игрушка детская велосипед']['diskont'] == 'diskont 1'){
            $product = discount10($bd[$key]['цена']);
            $sum_discount = $product + $result_price_a_bike;
            $bd['игрушка детская велосипед']['скидка на товар c дисконтом 10%'] = $product;
            $bd['игрушка детская велосипед']['скидка на товар'] = $sum_discount.'$'.'<br>'.discount30();
            $bd['игрушка детская велосипед']['цена со скидкой'] = $bd['игрушка детская велосипед']['цена'] - $sum_discount;
        }
        if ($bd['игрушка детская велосипед']['diskont'] == 'diskont 2'){
            $product = discount20($bd[$key]['цена']);
            $sum_discount = $product + $result_price_a_bike;
            $bd['игрушка детская велосипед']['скидка на товар c дисконтом 20%'] = $product;
            $bd['игрушка детская велосипед']['скидка на товар'] = $sum_discount.'$'.'<br>'.discount30();
            $bd['игрушка детская велосипед']['цена со скидкой'] = $bd['игрушка детская велосипед']['цена'] - $sum_discount;
        }
    }
    if($bd[$key]['количество заказано'] > $bd[$key]['осталось на складе']){
            $message = "<strong style='text-align:center'>Уведомление!</strong><br>Извините, данного товара не хватает! Вы хотите заказать {$bd[$key]['количество заказано']} товаров,".
                    " но на складе осталось всего {$bd[$key]['осталось на складе']}"; 
            $bd[$key]['уведомление'] = $message; 
            $bd['ИТОГО']['уведомление'] = '';   
        }
    $bd['ИТОГО']['цена'] = total_sum($bd[$key]['цена']); //общая цена
    $bd['ИТОГО']['количество заказано'] = total_product($bd[$key]['количество заказано']);//общее кол-во заказанно
    $bd['ИТОГО']['цена со скидкой'] = total_price_discount($bd[$key]['цена со скидкой']); //общая цена со скидкой
    $bd['ИТОГО']['осталось на складе'] = total_balance_product($bd[$key]['осталось на складе']);//общий остаток на складе
    $bd['ИТОГО']['скидка на товар'] = discount_product($bd[$key]['скидка на товар']).'$';//общий остаток на складе
    $bd['ИТОГО']['уведомление'] = '';
}
    //html  

echo '<pre>';
print_r($bd);
echo '</pre>';

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

//    foreach ($value as $key => $v){
//        echo '<tr>';
//            echo "<td style='text-align:center'>{$v['общая цена']}</td>";
//        echo '</tr>'; 
//    }
echo '</table>';