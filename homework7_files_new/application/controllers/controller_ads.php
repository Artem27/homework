<?php

function action_index($page_file, $data_array = '', $array_ad = ''){
    $data_array = array(
        'title' => 'Доска объявлений',
        'ads'   => $data_array,
        'ad'    => $array_ad
    );

    if (is_array($data_array)) {
        extract($data_array);
    }
    return $data_array;
}
