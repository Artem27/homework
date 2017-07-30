<?php

function action_index() {
    $data = array(
        'title' => 'Главная страничка!'
    );

    extract($data);
    
    return $data;
}


