<?php

function sort_alphabetic_category($category_array) {

    foreach ($category_array as $category_key => $one_category_array) {
        $category_type = $one_category_array['category_type'];
        $category_list[$category_type][$one_category_array['id']] = $one_category_array['category_name'];
    }
    return $category_list;
}