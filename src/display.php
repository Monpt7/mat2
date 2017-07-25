<?php
// display.php for mat2 in /home/louis/mat2/src
//
// Made by VIALLON Louis
// Login   <viallo_l@etna-alternance.net>
//
// Started on  Mon Jul 10 19:01:00 2017 VIALLON Louis
// Last update Mon Jul 10 19:01:00 2017 VIALLON Louis
//

function clear_screen()
{
    $i = 0;
    while ($i < 100)
    {
        echo "\n";
        $i++;
    }
}
function disp($error_numb)
{
	$a_mess = array("Entrez le message chiffré\n",
	"Entrez votre clé secrète\n","Entrez votre permutation\n",
	"Entrez m que vous aviez défini lors de la génération de la clé publique\n",
	"Entrez e que vous aviez défini lors de la génération de la clé publique\n",
	"Entrez n qui vous a été communiqué avec le message chiffré\n",
	"Entrez la clé publique qui vous a été communiquée sous forme : 1,2,5,10...\n",
	"Entrez votre message à chiffrer\n",
	"La suite entrée n'est pas supercroissante !\n",
	"\n---------------------------------------------\n",
	"Le nombre entré est inférieur à 4 ou supérieur à nbr_terms_public_key\n",
	"\nN'oubliez pas de transmettre également ce".
	" chiffre à votre interlocuteur : ",
	"Entrez un nombre entre 4 et ",
	"\nVoici le message chiffré : ");
	return ($a_mess[$error_numb]);
}


function	set_out($error_numb) {
	$a_error = array("La suite entrée n'est pas supercroissante !\n",
	"Votre entrée n'est pas inférieure à ",
	"Votre entrée n'est pas supérieure à 1 et inférieure à ",
	"Les entiers e et m ne sont pas premiers entre eux\n",
	"Le nombre entré est inférieur à 4 ou supérieur à ");
	echo $a_error[$error_numb];
}

function	set_out2($i, $error_numb) {
	$a_error = array("La suite entrée n'est pas supercroissante !\n",
	"Votre entrée n'est pas supérieure à ",
	"Votre entrée n'est pas supérieure à 1 et inférieure à ",
	"Les entiers e et m ne sont pas premiers entre eux\n",
	"Le nombre entré est inférieur à 4 ou supérieur à ");
	echo $a_error[$error_numb]."".$i."\n";
}

