<?php
// main_gen_key.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

require_once('src/display.php');

function main_gen_key()
{
    $incr_sequence = readline(disp(1));
    $sequence = explode(',', $incr_sequence);
    $sum = is_super_increasing($sequence);
    if ($sum == false)
        return (set_out(0));
    (int) $m = readline("Entrez un entier m supérieur à $sum\n");
    if ($m <= $sum)
        return (set_out2($sum, 1));
    (int) $e = readline("Entrez un entier e supérieur à 1 et inférieur à $m\n");
    if ($e <= 1 || $e >= $m)
        return (set_out2($m, 2));
    else if (!are_prime($e, $m))
        return (set_out(3));
    $inter_sequence = get_inter_sequence($sequence, $e, $m);
    $sorted_sequence = $inter_sequence;
    sort($sorted_sequence);
    $permutation = get_permutation($inter_sequence, $sorted_sequence);
    echo disp(9)."Votre clé publique : ".implode(',', $sorted_sequence);
    echo "\nAttention ! Gardez votre permutation secrète !\n";
    echo "Votre permutation : ".implode(',', $permutation)."\n".disp(9);
}

function is_super_increasing($sequence)
{
    $sum = 0;
    foreach ($sequence as &$value) 
    {
        if ($value <= $sum)
            return (false);
        $sum = $sum + $value;
    }
    return ($sum);
}

function get_inter_sequence($sequence, $e, $m)
{
    $inter_sequence = [];
    foreach ($sequence as &$value)
    {
        $tmp = my_modulo(($value * $e), $m);
        if ($tmp != false)
            array_push($inter_sequence, $tmp);
    }
    return ($inter_sequence);
}

function get_permutation($inter_sequence, $sorted_sequence)
{
    $permutation = [];
    foreach ($inter_sequence as &$inter_value)
    {
        $i = 0;
        foreach ($sorted_sequence as &$sorted_value)
        {
            if ($sorted_value == $inter_value)
                $permutation[] = $i + 1;
            $i++;
        }
    }
    return ($permutation);
}