Application test - Recrutement CCM Benchmark Group
--------------------------------------------------

Intro bla bla

## Prérequis

Pour faire fonctionner cette application, vous devez disposer d'une version de PHP >= 7.4 et du
[binaire symfony](https://symfony.com/download). Si vous préférez utiliser docker, un Dockerfile est fourni.

## Démarrage

Vous pouvez démarrer le serveur avec le binaire symfony grâce à la commande `symfony server:start` depuis le répertoire courant.
Vous pouvez également utiliser la commande docker: `docker run --rm -it -v $PWD:/app --user $(id -u):$(id -g) composer install && \
docker build -t ccm_test . && docker run --rm -it -v $PWD:/app -p8000:8000 ccm_test`.

## C'est parti

L'aplication est désormais disponible à l'adresse `http://127.0.0.1:8000/`. Sur cette page vous trouverez les différents
exercices à réaliser pour accomplir le test technique.

Bon codage !