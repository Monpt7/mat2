<?php
// main_encrypt.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

function main_encrypt()
{
    clear_screen();
    echo "Entrez la clé publique qui vous a été communiquée sous forme : 1,2,5,10...\n";
    $public_key = readline();
    $public_arr = explode(',', $public_key);
    $nbr_terms_public_key = count($public_arr);
    echo "Entrez votre message à chiffrer\n";
    $to_encrypt = readline();
    $binary_arr = [];
    foreach (str_split($to_encrypt) as &$char) 
    {
        $tmp = decbin(ord($char));
        while (strlen($tmp) < 8)
            $tmp = "0".$tmp;
        $binary_arr[] = $tmp;
    }
    $binary = implode('', $binary_arr);
    echo "Entrez un nombre entre 4 et $nbr_terms_public_key\n";
    $nbr_group = readline();
    if ($nbr_group < 4 || $nbr_group > $nbr_terms_public_key)
    {
        echo "Le nombre entré est inférieur à 4 ou supérieur à $nbr_terms_public_key\n";
        return (false);
    }
    $splited_binary = str_split($binary, $nbr_group);
    $last_entry = count($splited_binary) - 1;
    while (strlen($splited_binary[$last_entry]) < $nbr_group)
        $splited_binary[$last_entry] = $splited_binary[$last_entry]."0";
    $encrypted_arr = [];
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
    echo "\nVoici le message chiffré : ".implode(',', $encrypted_arr)."\n";
    echo "N'oubliez pas de transmettre également ce chiffre à votre interlocuteur : $nbr_group\n\n";
}