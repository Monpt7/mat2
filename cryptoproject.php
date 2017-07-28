<?php
// cryptoproject.php for mat2 in /home/louis/mat2
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

require_once('src/main_gen_key.php');
require_once('src/main_encrypt.php');
require_once('src/main_decrypt.php');
require_once('src/general.php');
require_once('src/display.php');

function main()
{
    $func_start = array("main_gen_key","main_encrypt","main_decrypt");
    $pick = 0;
    $str = "";
    while ($pick != 1 && $pick != 2 && $pick != 3 && strlen($str) != 1)
    {
        echo "Bonjour, bienvenue sur cryptoproject\n\n";
        echo "1 - Générer une clé publique\n";
        echo "2 - Chiffrer un message\n";
        echo "3 - Déchiffrer un message\n";
        $str = readline("Que souhaitez vous faire ?\n");
        $pick = (int) $str;
        echo "\n\n";
    }
    clear_screen();
    $func_start[$pick - 1]();
}

main();