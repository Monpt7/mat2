<?php
// main_decrypt.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

require_once('display.php');

function main_decrypt()
{
    $encrypted = readline(disp(0));
    $encrypted_arr = explode(',', $encrypted);
    $secret = readline(disp(1));
    $secret_arr = explode(',', $secret);
    $permutation = readline(disp(2));
    $permutation_arr = explode(',', $permutation);
    $m = readline(disp(3));
    $e = readline(disp(4));
    $n = readline(disp(5));
    $d = inv_modulo($e, $m);
    $res = [];
    foreach ($encrypted_arr as &$value) {
        $tmp = $value * $d;
        $res[] = my_modulo($tmp, $m);
    }
    $i = 0;
    $permuted = [];
    while ($i < count($permutation_arr)) {
        $nbr = $permutation_arr[$i] - 1;
        $permuted[$nbr] = $secret_arr[$i];
        $i++;
    }
    ksort($permuted);
    $permuted = array_slice($permuted, 0, $n);
    var_dump($permuted);
}