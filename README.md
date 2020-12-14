# TP Architecture Distribué

Ce TP fonctionne par groupe de 4 ou 5. Voici les membres du projet:
- DENIS Mathis
- DUBOIS Adam
- FERREIRA Luiz
- MURUGANANTHAN Majuran
- NGIN David
- SOREAU Lohan

Nous avons réalisé une solution, ultra simplifié de reservation de billet d'avion.
Nous gérons 3 aéroports:
- New York qui porte le code JFK
- CDG Paris qui porte le code CDG
- Detroit qui porte le code DTW



## Prérequis :

Installer MySQL
Nous utilisons le terminal Ubuntu afin de lancer le projet. Si vous avez des erreurs en lançant MySQL, lancer Apache aussi.


## Comment lancer le projet ?

### Etape 1 :

Se déplacer dans la racine du projet, c'est à dire dans le dossier code/
Lancer la commande : sudo service mysql start 
Ensuite lancer la commande : sudo mysql -uroot

### Etape 2 :

Dans le terminal MySql lancer la commande : source create-database.sql;
Puis faire dans le même terminal : exit

### Etape 3 :

Lancer dans le terminal la commande : sudo php -S localhost:3000
Si jamais 3000 ne fonctionne pas, utiliser un autre port.
Ensuite ouvrir votre navigateur internet et aller sur localhost:3000

## Présentation du projet :


Implémentez votre solution, votre code devra se trouver dans le dossier ```project/code```


## Etpae 3

Surprise !
