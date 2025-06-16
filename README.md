README - Exercice 1 : Développement Web avec Symfony

Ce projet contient les solutions pour l'exercice 1 du DS, implémentant différentes fonctionnalités avec Symfony.

==========================================
QUESTION 1-1 : Création du projet Symfony
==========================================
- Commande exécutée : 
  symfony new DSB2ex1 --webapp
- Détails :
  * Structure de base Symfony créée
  * Dependencies installées (annotations, twig)
  * Projet prêt pour le développement

==========================================
QUESTION 1-2 : Affichage de la date du jour
==========================================
Fichiers :
- Controller : src/Controller/DSB2ex102Controller.php
- Template : templates/dsb2ex1_q2/index.html.twig

Fonctionnalités :
- Affiche la date courante formatée en français
- Utilisation de strftime() pour le formatage localisé
- Exemple : "Lundi 16 juin 2025"

==========================================
QUESTION 1-3 : Formulaire de saisie
==========================================
Fichiers :
- Controller : src/Controller/DSS2ex103Controller.php
- Templates : 
  * templates/dsb2ex1_q3/index.html.twig (formulaire)
  * templates/dsb2ex1_q3/result.html.twig (résultat)

Champs du formulaire :
- Nom (texte)
- Prénom (texte)
- Date de naissance (sélecteur de date)

Technologies :
- Symfony Form Builder
- Validation des données
- Redirection après soumission

==========================================
QUESTION 1-4 : Gestion des âges
==========================================
Implémenté dans :
- DSB2ex103Controller.php (méthode result())
- templates/dsb2ex1_q3/result.html.twig

Logique :
- Calcul de l'âge à partir de la date de naissance
- Affichage conditionnel selon majorité
- Messages différenciés pour mineurs/majeurs

==========================================
QUESTION 1-5 : Personnalisation par civilité
==========================================
Améliorations apportées :
- Ajout d'un champ "Civilité" (Monsieur/Madame/Autre)
- Adaptation des messages en fonction du genre
- Messages spécifiques :
  * Monsieur -> "le bienvenu"
  * Madame -> "la bienvenue"
  * Autre -> formulation neutre

Structure du code :
- Champ ChoiceType dans le formulaire
- Transmission de la civilité via les paramètres de route
- Conditions multiples dans le template Twig

==========================================
INSTRUCTIONS D'INSTALLATION
==========================================
1. Cloner le dépôt
2. Installer les dépendances :
   composer install
3. Lancer le serveur :
   symfony server:start
4. Accéder aux pages :
   - /dsb2ex1_q2 pour la date
   - /dsb2ex1_q3 pour le formulaire

