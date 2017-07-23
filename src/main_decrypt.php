<?php
// main_decrypt.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

function main_decrypt()
{
    clear_screen();
    echo "Entrez le message chiffré\n";
    $encrypted = readline();
    $encrypted_arr = explode(',', $encrypted);
    echo "Entrez votre clé secrète\n";
    $secret = readline();
    $secret_arr = explode(',', $secret);
    echo "Entrez votre permutation\n";
    $permutation = readline();
    $permutation_arr = explode(',', $permutation);
    echo "Entrez m que vous aviez défini lors de la génération de la clé publique\n";
    $m = readline();
    echo "Entrez e que vous aviez défini lors de la génération de la clé publique\n";
    $e = readline();
    echo "Entrez n qui vous a été communiqué avec le message chiffré\n";
    $n = readline();
    $d = inv_modulo($e, $m);
    $res = [];
    foreach ($encrypted_arr as &$value) 
    {
        $tmp = $value * $d;
        $res[] = my_modulo($tmp, $m);
    }
    $i = 0;
    $permuted = [];
    while ($i < count($permutation_arr))
    {
        $nbr = $permutation_arr[$i] - 1;
        $permuted[$nbr] = $secret_arr[$i];
        $i++;
    }
    ksort($permuted);
    $permuted = array_slice($permuted, 0, $n);
    var_dump($permuted);

}