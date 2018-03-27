# Documentation CMG-MAT2

**Version de PHP : 7.1.7**

Notre projet peut être lancé grâce à la commande : `php cryptoproject.php` lorsque l'on se trouve à la racine du projet.

Le programme va afficher un menu avec un choix de fonctionnalité à executer, numérotées de 1 à 3. Cette documentation a pour but de les expliquer une à une.

## 1 - Générer une clé publique

Lors du lancement du programme, tapez 1 et faites "entrer".
L'écran va alors s'effacer et vous demander les informations suivantes :

### Entrez une clé secrète
Le programme va alors vous demander d'entrer un clé secrète. Il s'agit en fait d'une suite supercroissante, c'est à dire une suite dont la somme des termes précédants Un est inférieure à Un.

Les termes de la suite doivent être séparés d'une virgule et ne peuvent être négatifs.

Exemple : `1,2,5,10,20,50,100,200`

### Entrez un entier m supérieur à X
Il vous suffit d'entrer un entier, supérieur à la somme des termes de la clé secrète précedemment précisée.

### Entrez un entier e supérieur à 1 et inférieur à m
Un entier e vous est demandé, il faut qu'il soit supérieur à 1 et inférieur à m.

**Les entiers e et m doivent être premiers entre eux !**

### Résultat
Si vous n'avez pas eu d'erreur lors de cette étape, le programme vous fourni :
- Votre clé public, sous la même forme que votre clé secrète
- Votre permutation, une suite qui vous sera demandé pour déchiffrer le message de votre interlocuteur.

**Veillez à garder votre clé secrète et votre permutation pour vous, si ces informations sont divulguées, n'importe qui pourra déchiffrer vos échanges.**

## 2 - Chiffrer un message
Pour cette fonctionnalité, tapez 2 et "entrer".

### Entrez la clé publique
Il vous suffit de préciser la clé publique que vous a donnée votre interlocuteur.

Les termes de cette clé publique doivent être séparés par des virgules.

Exemple : `251,255,312,412,462,492,502,510`

### Entrez le message à chiffrer
Rien de plus simple, tapez le message que vous souhaitez chiffrer.

### Entrez un entier entre 4 et X
Encore une fois, une information très simple à fournir. Le programme vous demande un entier compris entre 4 et le nombre de terme dans la clé publique.

### Résultat
Le programme vous donne le message chiffré sous la forme d'une suite dont les termes sont séparés par une virgule ainsi que le chiffre entré à l'instruction précédente.

Ces deux informations sont à fournir à votre interlocuteur afin qu'il puisse déchiffrer votre message.

## 3 - Déchiffrer un message
Pour déchiffrer un message, beaucoup d'informations vous sont demandées.
### Entrez le message chiffré
Entrez le message chiffré qui vous a été founi par votre interlocuteur. Il est de la forme : ` 563,0,563,255,312,563,566`.

### Entrez votre clé secrète
Entrez la clé secrète que vous aviez définie lors de l'étape 1.

Rappel : c'est une suite supercroissante de la forme : `1,2,5,10,20,50,100,200`.

### Entrez votre premutation
Entrez la permutation que le programme vous a générée à l'étape 1.

C'est une suite séparée par des virgules, le nombre de termes dans votre permutation doit être le même que le nombre de termes de votre clé secrète.

### Entrez m défini lors de la génération de la public key
Entrez m que vous aviez fourni au programme lors de l'étape 1.

### Entrer e défini lors de la génération de la public key
Entrez e que vous aviez fourni au programme lors de l'étape 1.

**Si m et e ne sont pas premiers entre eux, le programme va vous retourner une erreur. Vérifiez que m et e sont bien les mêmes que lors de l'étape 1.

### Entrez n qui vous a été communiqué avec le message chiffré
Entrez le chiffre n que votre interlocuteur a choisi et vous a normalement communiqué.

### Résultat
Le programme va alors vous donner le message déchiffré, si vous avez rentré toutes les informations correctement.
