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

function    set_binarray($to_encrypt)
{
    foreach (str_split($to_encrypt) as &$char)
    {
        $tmp = decbin(ord($char));
        while (strlen($tmp) < 8)
            $tmp = "0".$tmp;
        $binary_arr[] = $tmp;
    }
    return ($binary_arr);
}

function    set_encryptedarry($splited_binary, $public_arr)
{
    foreach ($splited_binary as &$value)
    {
        $tmp = strrev($value);
        $sum = 0;
        $i = 0;
        while ($i < strlen($tmp))
        {
            if ($tmp[$i] == "1")
                $sum = $sum + $public_arr[$i];
            $i++;
        }
        $encrypted_arr[] = $sum;
    } 
    return ($encrypted_arr);
}

function main_encrypt($a_mess)
{
    $public_arr = explode(',', readline($a_mess[6]));
    $nbr_terms_public_key = count($public_arr);
    $binary_arr = set_binarray(readline($a_mess[0]));
    $binary = implode('', $binary_arr);
    $nbr_group = readline($a_mess[12].$nbr_terms_public_key."\n");                                                         //**
    if ($nbr_group < 4 || $nbr_group > $nbr_terms_public_key)
        return (set_out2($nbr_terms_public_key, 4));                                                                    //**
    $splited_binary = str_split($binary, $nbr_group);
    $last_entry = count($splited_binary) - 1;
    while (strlen($splited_binary[$last_entry]) < $nbr_group)
        $splited_binary[$last_entry] = $splited_binary[$last_entry]."0";
    $encrypted_arr = set_encryptedarry($splited_binary, $public_arr);
    echo $a_mess[13].implode(',', $encrypted_arr).$a_mess[11].$nbr_group."\n\n";
}