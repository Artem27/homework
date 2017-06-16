<?php header ('Content-type: text/html; charset=utf-8');
      error_reporting(E_ALL | E_ERROR | E_WARNING | E_NOTICE);
      ini_set('display_errors', 1);

//путь до нашего проекта
$project_root = $_SERVER['DOCUMENT_ROOT'];
$smarty_dir   = $project_root.'/bulletiBoard_smarty/smarty/';

require($smarty_dir.'libs/Smarty.class.php');

// Объект Smarty
$smarty = new Smarty();

$smarty->compile_check = true;
$smarty->debugging     = true;

$smarty->template_dir = $smarty_dir.'templates';
$smarty->compile_dir  = $smarty_dir.'templates_c';
$smarty->cache_dir    = $smarty_dir.'cache';
$smarty->config_dir   = $smarty_dir.'configs';

$array = array(
    'first' => 'Книги',
    '0'     => 'Тетради'
);

/* {объявление переменных} */
$smarty->assign('name', 'Артём');
$smarty->assign('array', $array);
$smarty->assign('title', 'SMARTY');
$smarty->assign( 'raz', time() );

/* {Вывод} */
$smarty->display('index.tpl');
//$smarty->display('index.html');

/* {Массивы} */

$item_list = array ( 24 => array ('no' => '2456', 'label' => 'Salad'),
                     96 => array ('no' => '4889', 'label' => 'Cream')
                    );

$smarty->assign ('items', $item_list);
?>
/* --------------------------{TPL}-------------------------- */
/* {Метки} */
/* {Всё это делается в .tpl} */
/* {Для того, чтобы смарти смог прочитать фигурные скобки} */
/* {Смотреть документацию} */
<script type="text/javascript">

    function getAlert() {ldelim}
        alert('alert');
    {rdelim}
    getAlert();
</script>

/* {Если кода очень много, то используется конструкция literal} */
{literal}
<script type="text/javascript">

    function getAlert() {
    alert('alert');
    }
    getAlert();
</script>
{/literal}

/* {Если нужно вывести переменную внутри конструкции literal} */
{literal}
<script type="text/javascript">

    function getAlert() {
        alert('{/literal}{$title}{literal}');
    }
    getAlert();
</script>
{/literal}

/* {Массивы} */
/* {Глобальные массивы через зарезервированную переменную $smarty} */
{$smarty.post.username}
{$smarty.get.page}
{$smarty.server.SERVER_NAME}
{$smarty.session.ads}

{$array.key}

/* {Модификатор метки} */
$smarty->assign ('name', 'Артём');
привет, {$name|replace:'ртём':'нна'}, как дела?

/* {Модификаторы можно ставить бесконечно} */
/* {Многие функции не работаю на русских символах, поэтому преобразования делать средствами php} */
привет, {$name|replace:'ртём':'нна'|count_characters|upper}, как дела?

/* {Преобразование из юниксовой даты в нормальный вид} */
Time: {$raz|date_format:"%d.%m.%Y"}

<ul>
    {foreach from=$items key=my_id item=i} /* {foreach ($items as $my_id => $i )} */
    <li><a href="item.php?id={$my_id}">{$i.no} : {$i.label}</a></li>
    {/foreach}
</ul>

/* {Показывает индекс элемента} */
<ul>
    {foreach from=$items key=my_id item=i name='href'} /* {foreach ($items as $my_id => $i )} */
    <li><a href="item.php?id={$my_id}">{$i.no} : {$i.label} | {$smarty.foreach.href.index}</a></li>
    {/foreach}
</ul>

/* {Показывает итерации цикла} */
<ul>
    {foreach from=$items key=my_id item=i name='href'} /* {foreach ($items as $my_id => $i )} */
    <li><a href="item.php?id={$my_id}">{$i.no} : {$i.label} | {$smarty.foreach.href.iteration}</a></li>
    {/foreach}
</ul>

/* {Последний элемент в массиве} */
<ul>
    {foreach from=$items key=my_id item=i name='href'} /* {foreach ($items as $my_id => $i )} */
    <li><a href="item.php?id={$my_id}">{$i.no} : {$i.label} | {$smarty.foreach.href.iteration} | {$smarty.foreach.href.last}</a></li>
    {/foreach}
</ul>

<ul>
    {foreach from=$items key=my_id item=i name='href'} /* {foreach ($items as $my_id => $i )} */
    <li><a href="item.php?id={$my_id}">{$i.no} : {$i.label} | {$smarty.foreach.href.iteration} | {$smarty.foreach.href.last}</a></li>
    {foreachelse} Ничего не найдено
    {/foreach}
</ul>




