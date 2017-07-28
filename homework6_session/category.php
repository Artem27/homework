<?php

/* {Константы для подключения к БД} */
define ('MYSQL_SERVER', 'localhost');
define ('MYSQL_USER',   'root');
define ('MYSQL_PASS',   '');
define ('MYSQL_DB',     'category');

/* {} */
/* {Подключение к серверу} */
$link_db = mysqli_connect (MYSQL_SERVER, MYSQL_USER, MYSQL_PASS, MYSQL_DB)
           or die ( 'Error: MySQL Server недоступен '.mysqli_connect_errno().'<br>'.mysqli_connect_error($link_db) );

/* {Выбор БД} */
mysqli_select_db ($link_db, 'category') or die ( 'Error: Неудалось выбрать базу данных '.mysqli_error($link_db) );
mysqli_query ($link_db, 'SET NAMES utf8');

/*------------------------------------- {CITY} -------------------------------------*/

/* {SQL QUERY} */
$query_city = "SELECT * FROM `city`";

/* {SQL QUERY TABLE CITY} */
$result_query_city = mysqli_query ($link_db, $query_city) or die ( 'Error: Не удалось выполнить запрос! '.mysqli_error($link_db) );

/* {STRING TABLE} */
$sum_string_city = mysqli_num_rows ($result_query_city);

/* {Достаём все строки и ложим в ассациативный массив $city_array} */
for ($i = 0; $sum_string_city > $i; $i++) {
    $city_array[] = mysqli_fetch_assoc ($result_query_city);
}

foreach ($city_array as $key_city => $one_array_city) {
    $city_category[$one_array_city['id']] = $one_array_city['city_name'];
}

asort ($city_category);

/* {Собираем алфавитный массив} */
foreach ($city_category as $index_city => $one_city) {
    $first_letter_city = mb_substr ($one_city, 0, 1, 'utf8');
    $alphabet_city[$first_letter_city][$index_city] = $one_city;
}

/*------------------------------------- {STATIONS} -------------------------------------*/

/* {SQL QUERY} */
$query_stations = "SELECT * FROM `stations`";

/* {SQL QUERY TABLE STATIONS} */
$result_query_stations = mysqli_query ($link_db, $query_stations) or die ('Error: Неудалось выполнить запрос! '.mysqli_error($link_db));

/* {STRING TABLE} */
$sum_string_station = mysqli_num_rows($result_query_stations);

for ($i = 0; $sum_string_station > $i; $i++) {
    $stations_array[] = mysqli_fetch_assoc($result_query_stations);
}

foreach ($stations_array as $key_stations => $one_array_station) {
    $stations_category[$one_array_station['id']] = $one_array_station['station_name'];
}

asort ($stations_category);

foreach ($stations_category as $index_station => $one_station) {
    $first_letter_station = mb_substr ($one_station, 0, 1, 'utf8');
    $alphabet_station_metro[$first_letter_station][$index_station] = $one_station;
}

/*------------------------------------- {CATEGORY} -------------------------------------*/

/* {SQL QUERY} */
$query_category_transport = "SELECT * FROM `transport`";
$query_category_realty    = "SELECT * FROM `realty`";
$query_category_things    = "SELECT * FROM `things`";
$query_category_home      = "SELECT * FROM `home`";

/* {SQL QUERY TABLES} */
$result_query_transport = mysqli_query ($link_db, $query_category_transport) or die ('Error: Неудалось выполнить запрос! '.mysqli_error($link_db));
$result_query_realty    = mysqli_query ($link_db, $query_category_realty)    or die ('Error: Неудалось выполнить запрос! '.mysqli_error($link_db));
$result_query_things    = mysqli_query ($link_db, $query_category_things)    or die ('Error: Неудалось выполнить запрос! '.mysqli_error($link_db));
$result_query_home      = mysqli_query ($link_db, $query_category_home)      or die ('Error: Неудалось выполнить запрос! '.mysqli_error($link_db));

/* {STRING TABLE} */
$sum_string_transport = mysqli_num_rows ($result_query_transport);
$sum_string_realty    = mysqli_num_rows ($result_query_realty);
$sum_string_things    = mysqli_num_rows ($result_query_things);
$sum_string_home      = mysqli_num_rows ($result_query_home);

for ($i = 0; $sum_string_transport > $i; $i++) {
    $category_array_transport[] = mysqli_fetch_assoc ($result_query_transport);
}

for ($i = 0; $sum_string_realty > $i; $i++) {
    $category_array_realty[] = mysqli_fetch_assoc ($result_query_realty);
}

for ($i = 0; $sum_string_things > $i; $i++) {
    $category_array_things[] = mysqli_fetch_assoc ($result_query_things);
}

for ($i = 0; $sum_string_home > $i; $i++) {
    $category_array_home[] = mysqli_fetch_assoc ($result_query_home);
}

$full_array_category = array_merge ($category_array_transport, $category_array_realty, $category_array_things, $category_array_home);

foreach ($full_array_category as $key_id => $one_array_category) {
    $category_type = $one_array_category['category_type_name'];

    $category[$category_type][$one_array_category['id']] = $one_array_category['category_name'];
}

/*------------------------------------- {-/-} -------------------------------------*/

// Сделать на ООП



