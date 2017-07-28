<?php

function action_index($page_file) {
    $data = array(
        'title' => 'Главная страничка!'
    );

    extract($data);

    include 'application/views/template_page.php';
}


