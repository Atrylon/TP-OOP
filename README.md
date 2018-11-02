# TP-OOP

## Part 1
Voir dossier Part1

## Part2
Voir dossier Part2

Pour les pratiques à éviter :
    - Ne pas mettre les classes à l'état "final", leur permettant d'etre modifiées
    - Utilisation des getters et des setters dans les entités et surtout en public permettant un accès à toutes les 
informations -> problème potentiel de sécurité
    - L'utilisation de controleur et la non-répartition pas les tâches tout est effectué dans la même classe
-> plus difficile à débugger en cas de lourd programme et de bug

## Part 3

### Injection de dépendance
Elle consiste en l'utilisation en paramètres d'un objet ou d'une classe afin d'eviter d'avoir besoin de l'instancier 
elle-même et ainsi éviter de coupler les deux classes, les rendant totalement dépendants l'un de l'autre.

En utilisant l'injection de dépendance cela rend les classes et méthodes plus facilement réutilisables et moins complexe
à débugguer évitant de multiplier les points du code à débug.


### Design pattern Observer
Cela désigne une relation entre objets/classes.
Une classe abstraite joue le rôle d'observateur qui va attendre et traiter les données envoyées par des classes dites 
"observables" qui vont communiquer à chaque fois que necessaire une évolution ou modification de ses données à 
l'observateur qui va alors répercuter les changements et effectuer les mises à jours necessaires sur les objets qui
dépendent de l'observable modifié.

### Temporal Coupling
Désigne un couplage effectué lorsque deux actions/modifications ont eu lieu au même moment.
