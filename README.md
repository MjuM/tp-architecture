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

Lorsque nous allons sur localhost:3000, nous arrivons sur la page d'authentification. Ici nous pouvons rentrer un identifiant au hasard qui sera enregistré sur la base de donnée.

![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/PageAuthentification.png)

Lorsque nous sommes connecté, nous arrivons sur la page où les vols sont affichés. Le bloc en bas à gauche correspond au vol que nous avons choisit mais que nous n'avons pas encore acheté et le bloc en bas à droite correspond à l'historique des achats de l'utilisateur.

![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/ConnexionUserPROJETPROG.png)


Nous pouvons observer sur le bloc en bas à droite, le billet que nous avons acheté.
![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/ACHATBILLET.png)

Ici, en changeant d'utilisateur, nous observons que le nombre de place de vol que nous avons acheté avec l'utilisateur PROJETPROG à bien été décrémenté.

![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/DecrementationAutreUser.png)

Voci un exemple d'achat complet et de l'affiche de l'historique même après changement de compte/ou actualisation.

![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/VerificationAchatPLUSAjout.png)

![Image of Home](https://github.com/MjuM/tp-architecture/blob/IA-Voui/IA-Voui/Projet/Pictures/ACHATCOMPLET.png)


