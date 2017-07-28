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
	"Entrez votre clé secrète (suite supercroissante) de la forme : 1,2,5..\n",
	"Entrez votre permutation\n",
	"Entrez m que vous aviez défini lors de la génération de la public key\n",
	"Entrez e que vous aviez défini lors de la génération de la public key\n",
	"Entrez n qui vous a été communiqué avec le message chiffré\n",
	"Entrez la clé publique qui vous a été communiquée sous forme : 1,2,5..\n",
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
	"Les entiers e et m ne sont pas premiers entre eux\n",
	"Votre clé publique ne peut être composé de moins de 4 termes\n",
	"Votre clé privée et votre permutation n'ont pas la même taille\n",
	"Votre entrée ne comporte pas que des chiffres\n");
	echo $a_error[$error_numb];
}

function	set_out2($i, $error_numb) {
	$a_error = array("La suite entrée n'est pas supercroissante !\n",
	"Votre entrée n'est pas supérieure à ",
	"Votre entrée n'est pas supérieure à 1 et inférieure à ",
	"Le nombre entré est inférieur à 4 ou supérieur à ",
	"Entrez un nombre entre 4 et ");
	echo $a_error[$error_numb]."".$i."\n";
}
