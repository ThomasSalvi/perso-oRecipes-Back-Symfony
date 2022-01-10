# Deroulement
- Créer la bdd
- Editer le fichier .env

## Creation des entités
- (Symfony console make:user)
- Symfony console make:entity
- Symfony console make:migration
- Symfony console d:m:m

## Test unitaire
- Symfony consome make:unit-test (lui donner un nom)
- php bin/phpunit
- php bin/phpunit --testdox (lancer le test)

## Controller
- Symfony console make:controller Home

## Authentification
- Symfony console make:auth
- [1]

## Fixtures pour peupler la bdd
- composer require --dev orm-fixtures
- composer require --dev fakerphp/faker
dans datafixtures/ appFixtures
- use Faker\Factory
- $faker = Factory::create('fr_FR')
- symfony console doctrine:fixtures:load

## Renvoyer les 5 dernières recettes
- RecipeRepository: function lastFive()
- HomeController: function index avec return de la vue