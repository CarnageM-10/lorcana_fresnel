First install

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php84-composer:latest \
    composer install --ignore-platform-reqs

Then

cp .env.example .env

Then 


sail up -d

Configuration du projet

📌 Prérequis

Avant d'installer le projet, assurez-vous d'avoir les outils suivants :

PHP (>=8.1)

Composer

MySQL

Laravel Sail (Docker)

Git

📥 Installation

Cloner le dépôt Git

git clone https://github.com/votre-utilisateur/lorcana-api.git
cd lorcana-api

Installer les dépendances PHP avec Composer

composer install

Copier le fichier `` et configurer l'environnement

cp .env.example .env

Générer la clé d'application

php artisan key:generate

Exécuter les migrations et seeders

php artisan migrate --seed

Démarrer le serveur Laravel

php artisan serve

L'API est maintenant accessible à http://127.0.0.1:8000

🏗 Instructions pour exécuter l'API

🔐 Authentification

L'API utilise l'authentification par token JWT. Après l'inscription ou la connexion, utilisez le token retourné dans chaque requête avec un header Authorization: Bearer {token}.

📌 Endpoints disponibles

🔑 Gestion des utilisateurs

Méthode

Endpoint

Description

POST

/register

Inscription d'un utilisateur

POST

/login

Connexion d'un utilisateur

POST

/logout

Déconnexion

GET

/me

Récupérer les informations utilisateur

📦 Gestion des cartes utilisateurs

Méthode

Endpoint

Description

GET

/me/cards

Liste des cartes possédées

POST

/me/{id}/update-owned

Mise à jour des cartes possédées

📚 Gestion des chapitres et cartes

Méthode

Endpoint

Description

GET

/sets

Lister les chapitres

GET

/sets/{id}

Détails d'un chapitre

GET

/sets/{id}/cards

Lister les cartes d'un chapitre

🎯 Gestion de la Wishlist

Méthode

Endpoint

Description

POST

/wishlist/add

Ajouter une carte à la wishlist

POST

/wishlist/remove

Retirer une carte de la wishlist

GET

/wishlist

Lister les cartes de la wishlist

✅ Tests des Endpoints

Utilisez Postman ou Insomnia pour tester l'API.


