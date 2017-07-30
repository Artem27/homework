<?php

function action_index($page_file) {
    $data = array(
        'title' => 'Портфолио'
    );

    extract($data);

    include 'application/views/template_page.php';
}




