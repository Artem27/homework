<?php

function sort_alphabetic_city($city_array) {

    foreach ($city_array as $key_city => $one_array_city) {
        $city_category[$one_array_city['id']] = $one_array_city['city_name'];
    }

    asort($city_category);

    foreach ($city_category as $index_city => $one_city) {
        $first_letter_city = mb_substr ($one_city, 0, 1, 'utf8');
        $alphabet_city[$first_letter_city][$index_city] = $one_city;
    }
    return $alphabet_city;
}



