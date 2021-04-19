Application test - Recrutement CCM Benchmark Group
--------------------------------------------------

## Prérequis

Pour faire fonctionner cette application, vous devez disposer d'une version de PHP >= 7.4 et du
[binaire symfony](https://symfony.com/download). Si vous préférez utiliser docker, un Dockerfile est fourni. Il vous faut
disposer de git sur votre machine.

## Extraire le repo
A partir du bundle test_recrutement.git, il vous faut récupérer un `working tree` fonctionnel. Pour cela il faut exécuter
les commandes suivantes:

1. `git clone test_recrutement.git test_recrutement`
2. `cd test_recrutement`
3. `git switch -c master`

A cette étape vous disposez d'une copie fonctionnelle, devant vous permettre de démarrer le projet.

## Démarrage

Vous pouvez choisir de faire tourner l'application sur votre machine ou via docker, en fonction de votre préférence.

### Sans docker

1. Installer les dépendances: `composer install`
2. Alimenter la base SQLIte à partir des données contenues dans un fichier CSV: `php bin/console app:update-db`
3. Démarrer le serveur symfony: `symfony server:start`

### A l'aide de docker

1. Installer les dépendances: `docker run --rm -it -v $PWD:/app --user $(id -u):$(id -g) composer install`
2. Builder et démarrer le conteneur: `docker build -t ccm_test . && docker run --rm -it --name="test_recrutement" -v $PWD:/app -p8000:8000 ccm_test`
3. Alimenter la base SQLIte à partir des données contenues dans un fichier CSV: `docker exec -it test_recrutement bin/console app:update-db`

## C'est parti

L'aplication est désormais disponible à l'adresse `http://127.0.0.1:8000/`. Sur cette page vous trouverez les différents
exercices à réaliser pour accomplir le test technique.

Bon codage !