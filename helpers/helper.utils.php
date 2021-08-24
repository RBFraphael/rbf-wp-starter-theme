<?php if(!defined('ABSPATH')){ exit; }

function simple_uniqid($length = 8)
{
    $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
    $id = "";
    for($i = 0; $i < $length; $i++){
        $id .= $char_list[rand(0, strlen($char_list)-1)];
    }
    return $id;
}

function letter_uniqid($length = 8)
{
    $char_list = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
    $id = "";
    for($i = 0; $i < $length; $i++){
        $id .= $char_list[rand(0, strlen($char_list)-1)];
    }
    return $id;
}
