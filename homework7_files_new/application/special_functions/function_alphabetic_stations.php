<?php

function sort_alphabetic_stations($stations_array) {

    foreach ($stations_array as $station_key => $one_station_array) {
        $station_category[$one_station_array['id']] = $one_station_array['station_name'];
    }

    asort($station_category);

    foreach ($station_category as $index_station => $one_station) {
        $first_letter_station = mb_substr($one_station, 0, 1, 'utf-8');
        $alphabet_station[$first_letter_station][$index_station] = $one_station;
    }
    return $alphabet_station;
}