<?php
/* {Знакомство с пользовательскими функциями} */

function discount10($price){
    return $product = $price * 10/100;
}

function discount20($price){
    return $product = $price * 20/100;
}

function No_discount(){
    return 'У данного товара нет скидок!:(';
}

function result_discount30($price){
    return $price * 30/100;
}

function price_discount10($price){
    $price_discount = $price - $price * 10/100;
    return $price_discount;
}

function price_discount20($price){
    $price_discount = $price - $price * 20/100;
    return $price_discount;
}

function discount30(){
    return 'У вас скидка 30%! <br> Вы заказали 3 или более товара(ов) данного типа!';
}

/* {Согласно домашнему заданию использовать static variable} */

function total_sum($value){
    static $result_total = 0;
    return $result_total += $value;
}

function total_product($value){
    static $result_total = 0;
    return $result_total += $value;
}

function total_price_discount($value){
    static $result_total = 0;
    return $result_total += $value;
}

function total_balance_product($value){
    static $result_total = 0;
    return $result_total += $value;
}

function discount_product($value){
    static $result_total = 0;
    return $result_total += $value;
}

     

       



