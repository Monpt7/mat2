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

$func_start = array("main_gen_key","main_encrypt","main_decrypt");

$choice = 9;
while ($choice != 1 && $choice != 2 && $choice != 3)
{
    echo "Bonjour, bienvenue sur cryptoproject\n\n";
    echo "1 - Génération d'une clé publique\n2 - Chiffrement d'un message\n";
    echo "3 - Déchiffrement d'un message\n";
    $choice = (int) readline("Que souhaitez vous faire ?\n");
    echo "\n\n";
}

clear_screen();
$func_start[$choice - 1]($a_mess);