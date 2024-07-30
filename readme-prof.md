# Readme destiné au professeur

## Commandes à exécuter

> composer update

> npm install

> php artisan migrate:fresh

> php artisan db:seed

> npm run dev

> php artisan serve

### Stocker les données en sqlite

Ainsi, afin de faire
fonctionner la base de données, il est nécessaire d'installer le driver sqlite-tools-win32-x86-3400000.zip à l'
adresse https://www.sqlite.org/download.html

Il faut décompresser l'archive et référencer le driver dans la variable PATH (sous windows)

Ensuite, il est nécessaire de modifier la valeur DB_CONNECTION du .env à sqlite.

Dans /config/database.php, modifier la clé sqlite en :

```php
'sqlite' => [
'driver' => 'sqlite',
'url' => env('DATABASE_URL'),
'database' => database_path('database.sqlite'),
'prefix' => '',
'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true)
]
```

Sous Mac OS X : télécharger : sqlite-tools-osx-x86-3400000.zip

note : il est possible que phpstorm propose automatiquement le téléchargement du driver mais nous n'avons pas pu le
vérifier.

## Ajout dans le .env pour le bon fonctionnement de STRIPE

```dotenv
STRIPE_KEY=pk_test_51M0OdvBhvJ8fKFymHQ155tVDclovFOVlWQOgLEDmezE4cpL2Lyi8OwbAKTSHu0bbB23NAYaV0zundFRxvDksjmD000UkmrX562
STRIPE_SECRET=sk_test_51M0OdvBhvJ8fKFymOGngmoCvtUgvS5KTK4x2tCH8wEulkJgtv2e04wJlEHdnoV75Lpm12gHJfuNNfJapQI83tKQN00nnUCPjnZ
STRIPE_WEBHOOK_SECRET=test
CASHIER_CURRENCY=eur
CASHIER_CURRENCY_LOCALE=fr_BE
CASHIER_LOGGER=stack
```

## Identifiants administrateur

> login : admin@bikemanager.com

> mot de passe : Password123*

> chemin vers l'écran d'administration : /admin

## Identifiants client

> login : frodon.saquet@theshire.me

> mot de passe : Pass456*

## STRIPE

Nous avons décidé d'intégrer les paiements STRIPE à notre application.
Pour cela, nous avons créé un compte Stripe et défini plusieurs produits (abonnements) dans l'interface de Stripe.

Nous avons référencé les clés API de notre compte dans l'application et au moyen de la librairier Cashier de Laravel, il
nous a été possible de gérer le paiement d'abonnements avec des données test (données visa factice)

Lors de la souscription à un plan d'abonnement, veuillez entrer les valeurs suivantes :

> nom : au choix

> numéro de carte bancaire : 4242424242424242

## Remarques

1. Nous avons remarqué une différence de fonctionnement entre chrome et firefox lors du clic sur les urls. Sur firefox,
auncun problème ne semble survenir tandis que sur chrome, il est parfois nécessaire de cliquer deux fois sur le lien
afin d'afficher la page souhaitée. Nous cherchons une solution pour remédier à ce problème. Nous avons identifé que la cause provenait du cache du navigateur chrome qui pouvait poser quelques problèmes. Afin d'y remédier, vider le cacher du navigateur ou passer en navigation privée permet de contourner le problème, bien que ce ne soit pas une solution viable pour une mise en production.

2. Nous avons fait le choix de développer l'application avec une base de données au format sqlite.

3. Nous détaillons ci-dessous les étapes à mettre en place pour développer avec une base de données en sqlite.

4. Cependant, il est aussi possible de choisir d'utiliser mysql, si cela est plus simple à mettre en place. Pour cela, il
est nécessaire de conserver la valeur mysql dans présente par défaut dans le .env

5. La fonction getBikeModelsForCustomerList() du RentalService, qui permet de récupérer la liste des modèles de vélo
disponibles pour le client en fonction de son abonnement requiert une mise à jour. En effet, les liaisons sont
actuellement harcodées, ce qui n'est pas le fonctionnement final recherché. Nous prévoyons dans une version plus avancée
d'ajouter une table intermédiaire référencant les modèles de vélo accessibles aux clients pour chaque type d'abonnement.

6. Une amélioration possible sera la possibilité de modifier le statut du vélo en location depuis la liste directement
depuis la liste des locations.
Il sera intéressant de remplacer la table des statuts par une énumération en faisant passer le projet en PHP 8.1, cette fonctionnalité n'étant disponible qu'à partir de cette version.





