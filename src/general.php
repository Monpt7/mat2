<?php
// general.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//
function are_prime($a, $b)
{
    while ($a != $b)
    {
        if ($a > $b)
            $a = $a - $b;
        else if ($a < $b)
            $b = $b - $a;
    }
    return $a == 1;
}

function my_modulo($int, $n)
{
    if ($n == 0)
        return false;
    else 
    {
        $res = $int - $n * floor($int / $n);
        if ($res < 0 && $n > 0)
            $res = $res + $n;
        else if ($res < 0 && $n < 0)
            $res = $res + (-$n);
        return $res;
    }
}

function inv_modulo($a, $n)
{
    if ($n == 0)
        return false;
    else
    {
        $res = $a;
        if ($res < 0)
            $res = -$res;
        for ($i = 1; $i < $res; ++$i)
        {
            if (my_modulo($i * $a, $n) == 1)
                return $i;
            $res = $i * $a;
            if ($res < 0)
                $res = -$res;
        }
        return false;
    }
}

function is_super_increasing($sequence)
{
    $sum = 0;
    foreach ($sequence as &$value) 
    {
        if (!is_numeric($value))
            return false;
        if ($value <= $sum)
            return false;
        $sum = $sum + $value;
    }
    return $sum;
}