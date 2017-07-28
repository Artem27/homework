<?php

function ads_validate($post = '') {
    $post['user_name'] = htmlspecialchars(trim($post['user_name']));
    $post['ads_name']  = htmlspecialchars(trim($post['ads_name']));
    $post['email']     = htmlspecialchars(trim($post['email']));
    $post['price']     = htmlspecialchars(trim($post['price']));
    $post['description_ads'] = htmlspecialchars(trim($post['description_ads']));

    return $post;
}
