# Tests CMG-MAT2

Dans ce document nous allons commencer par un scénario, puis voir ensemble le comportement du programme en cas de mauvaise entrée.

## Scénario

Bob souhaite envoyer un message à Alice. Mais ce message est top secret et ne doit pas être lu par quelqu'un. Nous avons donc proposé à Alice et Bob d'utiliser notre cryptopoject afin que Bob puisse envoyer des messages chiffrés à Alice et que elle seule puisse le déchiffrer.

Alice doit donc commencer par générer sa clé publique. Pour cela, elle lance notre programme et sélectionne l'option numéro 1.

### Alice : Générer sa clé publique
Le programme lui demande donc une clé privée (ou secrète) qui doit être une suite supercroissante.
Elle choisi cette clé : `1,42,100,255,512,1337,3675,6000,12000,24000`.

Ensuite elle doit préciser m, un entier supérieur à la somme des termes de la clé privée. Elle choisi `47977`.

Elle doit maintenant choisir un entier e, compris entre 1 et 47977 et que e et m soient premiers entre eux. Elle choisi `2731`, car le PGCD de 47977 et de 2731 est égal à 1. Ils sont donc premiers entre eux.

Le programme n'a pas généré d'erreur et nous donne donc, notre clé publique et notre permutation.

Clé publique : `2731,3709,5095,6939,7418,9232,18748,24727,25843,33215`
Permutation : `1,7,10,8,4,3,6,9,2,5`

Elle communique donc à Bob sa clé publique.

**Comme indiqué dans la documentation Alice conserve sa clé privée, sa permutation, son m et son m dans un coin et ne les communique pas !**

### Bob : Chiffrer son message

Bob a donc obtenu de Alice sa clé publique. Il execute le programme en sélectionnant l'option 2.

Le programme demande donc d'entrer la clé publique qu'il a obtenu (pour rappel : `2731,3709,5095,6939,7418,9232,18748,24727,25843,33215`).

Il précise le message à chiffrer. Dans son cas il va vouloir chiffrer `Attends moi à la sortie des cours stp`.

Le programme demande un nombre en 4 et 10 (qui correspond au nombre de termes de la clé publique). Il choisi `7`.

Le programme s'est executé normalement, Bob a donc obtenu son message chiffré : `9232,40931,15743,27552,22611,26320,25687,41838,7418,20797,23997,44202,28418,6440,11535,9232,7418,20797,12034,11127,6440,33513,41909,39107,27298,18066,21266,29875,6440,10149,29396,41838,7418,14357,42745,46933,22611,28418,36784,9232,26320,40931,15743,0`.

Il communique donc à Alice le message chiffré et le chiffre qu'il a choisi (en l'occurence `7`).

### Alice : Déchiffrer le message de Bob

Alice a donc maintenant en sa possession :
- Clé privée
- Message chiffré
- Sa permutation
- Son entier m
- Son entier e
- Le chiffre de Bob

Grâce à tous ces élements elle va pouvoir déchiffrer le message en sélectionnant l'option 3 du programme.

Elle commence donc par entrer le message chiffré de Bob (pour rappel : `9232,40931,15743,27552,22611,26320,25687,41838,7418,20797,23997,44202,28418,6440,11535,9232,7418,20797,12034,11127,6440,33513,41909,39107,27298,18066,21266,29875,6440,10149,29396,41838,7418,14357,42745,46933,22611,28418,36784,9232,26320,40931,15743,0`).

Elle entre sa clé secrète, qu'elle avait choisi lors de l'étape 1 (pour rappel : `1,42,100,255,512,1337,3675,6000,12000,24000`).

Elle tape ensuite sa permutation (`1,7,10,8,4,3,6,9,2,5`).

Elle rentre son m (`47977`) puis son e (`2731`) et enfin le chiffre que Bob lui a transmi (`7`).

C'est terminé (ouf), le programme s'est executé avec succès et donne le message déchiffré : `Attends moi à la sortie des cours stp`.

On soulignera le fait que le programme prend en compte le `à`, ce qui n'incitera pas Bob à faire des fautes d'orthographe pour pouvoir envoyer des messages, et ça, c'est une bonne chose pour sa scolarité.

### Conclusion :
Bob a pu, grâce à notre programme transmettre un message chiffré à Alice et faire en sorte qu'elle soit la seule qui puisse déchiffrer le message. Elle l'attendra donc sûrement à la sortie des cours (on espère pour Bob) et personne n'est au courant que c'est Bob qui le lui a demandé.

## Tests des erreurs
Eh oui, c'est bien beau de s'envoyer des mots doux avec ce projet mais Alice et Bob peuvent aussi très bien être têtes en l'air (pour ne pas dire un peu stupides). Que se passe-t-il s'ils entrent (malencontreusement ou pas) des données que le programme n'attend pas et qui risqueraient de le faire planter ?
Nous allons voir ça de suite.

### Générer une clé publique
Pour générer une clé publique on nous demande de préciser une clé privée, qui est une suite super croissante dont les termes sont séparés par des virgules.

Voici les erreurs possibles pour cette étape :
- **Suite non supercroissante** : Le programme s'arrête et affiche un message d'erreur.
- **Suite avec des termes négatifs** : Le programme s'arrête et affiche un message d'erreur.
- **Suite non délimitée avec '`,`'** : Le programme s'arrête et affiche un message d'erreur.
- **Suite ne comportant pas que des nombres** : Le programme s'arrête et affiche un message d'erreur.
- **Suite comportant moins de 4 termes** : Le programme s'arrête et affiche un message d'erreur.