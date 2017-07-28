<?php

function ads_deleted ($number) {
    unset($_SESSION['ads'][$number]);
}