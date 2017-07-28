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
    $encrypted_arr = explode(',', readline(disp(0)));
    $secret_arr = explode(',', readline(disp(1)));
    if (!is_super_increasing($secret_arr))
        return set_out(0);
    $permutation_arr = explode(',', readline(disp(2)));
    if (count($permutation_arr) != count($secret_arr))
        return set_out(3);
    $m = readline(disp(3));
    if (!is_numeric($m))
            return set_out(4);
    $e = readline(disp(4));
    if (!is_numeric($e))
            return set_out(4);
    if ($e > $m || $e < 1)
        return set_out2($m, 2);
    $n = get_n($m, $e);
    $d = inv_modulo($e, $m);
    $res = get_res_d($encrypted_arr, $d, $m);
    $permuted = get_permuted($n, $permutation_arr, $secret_arr);
    $sorted = $permuted;
    rsort($sorted);
    $bin_arr = get_bin_arr($res, $sorted, $permuted, $n);
    if (strlen(end($bin_arr)) != 8)
        array_pop($bin_arr);
    $fin_arr = get_fin_arr($bin_arr);
    echo "\nLe message dechiffré est : ".implode('', $fin_arr)."\n";
}

function get_permuted($n, $permutation_arr, $secret_arr)
{
    $i = 0;
    $permuted = [];
    while ($i < count($permutation_arr))
    {
        $nbr = $permutation_arr[$i] - 1;
        $permuted[$nbr] = $secret_arr[$i];
        $i++;
    }
    ksort($permuted);
    return array_slice($permuted, 0, $n);
}

function get_bin_arr($res, $sorted, $permuted, $n)
{
    $bin_arr = [];
    foreach ($res as &$value)
    {
        $tmp = "00000000";
        foreach ($sorted as &$val_sort)
        {
            if ($value / $val_sort >= 1 && $value != 0)
            {
                $value = $value - $val_sort;
                $key = array_search($val_sort, $permuted);
                $tmp[$key] = "1";
            }
        }
        $bin_arr[] = strrev(substr($tmp, 0, $n));
    }
    return str_split(implode('', $bin_arr), 8);
}

function get_n($m, $e)
{
    $n = readline(disp(5));
    if ($n < 4 || $n > 8)
        return set_out2(8, 3);
    if (!are_prime($e, $m))
        return set_out(1);
    return $n;
}

function get_res_d($encrypted_arr, $d, $m)
{
    $res = [];
    foreach ($encrypted_arr as &$value)
    {
        $tmp = $value * $d;
        $res[] = my_modulo($tmp, $m);
    }
    return $res;
}