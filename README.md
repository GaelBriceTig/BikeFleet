# Bike Manager

- Authentification
    - Enregistrement de compte
      - gestion des mdp
      - Gestion des cookies avec popup
      - suppression des comptes / roles

- rôle secrétariat
  - Gestion des utilisateurs & entreprises.
  - Gestion de l'attribution des véhicules, agendas des attributions

Attention : vérifier qu'il y a de l'anti forgery et aussi vérifier les tags html dans les inputs et attention aux injections sql.

## EPICS

- EPIC 1 / Authentification administrateur
    - STORY A / USER - MDP pour l'admin
        - check password by regex and username then check password server side
        - adresse email dans le bon format
    - STORY B / récupération de mot de passe
- EPIC 2 / Authentifcaton employé(usser)
    - STORY A / login user - password
    - Story b / password recover
- EPIC 3 / user subscription
    - Contraintes techniques :
        - encodage du mdp avec une clé d'encryptage
            - utiliser les fonctions buit in de php
        - recaptcha pour l'inscription ou recaptcha 3 sur tout le site
        - check username(email) already exists (server side)
        - regex pour validation password (front side)
        - affichage erreurs pour le user
        - mail de confirmation d'inscription (ou autre méthode)
        - validation de l'email pour activation du compte
    - story A / user (email), password, confirmation password, firstname, lastname, (birthdate), (phone)
        - check user already exists
- EPIC 4 / Encodage des vélos avec leurs caractéristiques
    - Crud avec désactivation - role : secrétaire et employé
        - modèle du vélo
        - Date de fabrication
        - catégorie de vélo (usage)
        - matière
        - Identifiant du vélo
- EPIC 5 / Réservation de vélo par un utilisateur
    - sélection du vélo - check disponibilité
    - demande de réservation sur l'agenda
    - check final pour disponibilité
    - confirmation de la réservation et envoi de mail
- EPIC 6 / Abonnement
    - CRUD des plans d'abonements
    - séléction d'un plan d'abonement par user
    - changement de plans
    - annulation de plan
    - restriction de choix de vélo
    - stripe


## Point de vue technique
Utilisation de Sqlite pour la base de données, pour le développement seulement.
Passage à MongoDB en production.

## Liste des tâches

- Liste des taches dans github : Céline
- Design de la db : en groupe
- authentification : migrer la db et paramétrer sqlite
-

## STORY 1 : clem (+ design deb)
    Authentification + gestion de rôles
        - Gestion de rôles
            - administrator
            - secretary
            - employee
            - technician (si on a le temps de développer la partie technicien)
            - customer -> dans une table différente

## STORY 2 :
     Crud avec désactivation 
		- modèle du vélo
		- Date de fabrication
		- catégorie de vélo (usage)
		- matière
		- Identifiant du vélo
        
        -> dans l'objet
            - statut du vélo (en location, disponible à la location, en maintenance, déclassé)
            déclassé est paramétré par le technicien après contrôle technique

## STORY 3 - Gael
    Gestion de la location
        - table pour la location
            - id de la location
            - id du vélo
            - fk_id du customer 
            - datestart
            - dateend
            - fk_userId lié à l'oprétation nullable 
            - fk_customerId lié à l'oprétation nullable
            - timestamps (date created, date updated)
            - isCancelled
            

            -> montant de la location calculé en fonction du prix du vélo et de la durée de la location

            -> dans l'objet 
                - statut de la location (en cours, planifiée, confirmée, en attente de confirmation, annulée (par le client), annulée par la plateforme, terminée en attente de vélo, terminée vélo retourné en stock)
            -> montant de la caution (calculé)
    
            - table des paiements
                - id du paiement
                - id du customer
                - id de la location

        OU
        Système d'abonnement (plus simple à gérer)

## STORY 4
    Abonnement
        -id
        -nom



        


