<?php
// main_encrypt.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

require_once('display.php');

function main_encrypt($a_mess)
{
    $public_key = readline($a_mess[6]);
    $public_arr = explode(',', $public_key);
    $nbr_terms_public_key = count($public_arr);
    $to_encrypt = readline($a_mess[0]);
    $binary_arr = [];
    foreach (str_split($to_encrypt) as &$char) {
        $tmp = decbin(ord($char));
        while (strlen($tmp) < 8)    $tmp = "0".$tmp;
        $binary_arr[] = $tmp;
    }
    $binary = implode('', $binary_arr);
    $nbr_group = readline($a_mess[12].$nbr_terms_public_key."\n");                                                         //**
    if ($nbr_group < 4 || $nbr_group > $nbr_terms_public_key)
        return (set_out2($nbr_terms_public_key, 4));                                                                    //**
    $splited_binary = str_split($binary, $nbr_group);
    $last_entry = count($splited_binary) - 1;
    while (strlen($splited_binary[$last_entry]) < $nbr_group)
        $splited_binary[$last_entry] = $splited_binary[$last_entry]."0";
    $encrypted_arr = [];
    foreach ($splited_binary as &$value) {
        $tmp = strrev($value);
        $sum = $i = 0;
        while ($i < strlen($tmp)) {
            if ($tmp[$i] == "1")    $sum = $sum + $public_arr[$i];
            $i++;
        }
        $encrypted_arr[] = $sum;
    }
    echo $a_mess[13].implode(',', $encrypted_arr).$a_mess[11].$nbr_group."\n\n";
}