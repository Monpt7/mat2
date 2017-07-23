<?php
// main_gen_key.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

function main_gen_key()
{
    clear_screen();
    echo "Entrez une suite supercroissante sous la forme suivante : 1,2,5,10...\n";
    $incr_sequence = readline();
    $sequence = explode(',', $incr_sequence);
    $sum = is_super_increasing($sequence);
    if ($sum == false)
    {
        echo "La suite entrée n'est pas supercroissante !\n";
        return (false);
    }
    echo "Entrez un entier m supérieur à $sum\n";
    (int) $m = readline();
    if ($m <= $sum)
    {
        echo "Votre entrée n'est pas inférieure à $sum\n";
        return (false);
    }
    echo "Entrez un entier e supérieur à 1 et inférieur à $m\n";
    (int) $e = readline();
    if ($e <= 1 || $e >= $m)
    {
        echo "Votre entrée n'est pas supérieure à 1 et inférieure à $m\n";
        return (false);
    }
    if (!are_prime($e, $m))
    {
        echo "Les entiers e et m ne sont pas premiers entre eux\n";
        return (false);
    }
    $inter_sequence = get_inter_sequence($sequence, $e, $m);
    $sorted_sequence = $inter_sequence;
    sort($sorted_sequence);
    $permutation = get_permutation($inter_sequence, $sorted_sequence);
    echo "\n---------------------------------------------\n";
    echo "Votre clé publique : ".implode(',', $sorted_sequence)."\n";
    echo "\nAttention ! Gardez votre permutation secrète !\n";
    echo "Votre permutation : ".implode(',', $permutation)."\n";
    echo "\n---------------------------------------------\n";
}

function is_super_increasing($sequence)
{
    $sum = 0;
    foreach ($sequence as &$value) {
        if ($value <= $sum)
            return (false);
        $sum = $sum + $value;
    }
    return ($sum);
}

function get_inter_sequence($sequence, $e, $m)
{
    $inter_sequence = [];
    foreach ($sequence as &$value) {
        $tmp = my_modulo(($value * $e), $m);
        if ($tmp != false)
            array_push($inter_sequence, $tmp);
    }
    return ($inter_sequence);
}

function get_permutation($inter_sequence, $sorted_sequence)
{
    $permutation = [];
    foreach ($inter_sequence as &$inter_value) {
        $i = 0;
        foreach ($sorted_sequence as &$sorted_value) {
            if ($sorted_value == $inter_value)
                $permutation[] = $i+1;
            $i++;
        }
    }
    return ($permutation);
}