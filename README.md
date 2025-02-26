<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# <h1 style="text-align:center;">ShedU Readme</h1>

This is the backend of SchedU. Be sure to clone this and the frontend to ensure the good working of a project. You should ensure that you have `composer`  with `php 8.3` and node js installed on you computer. If you don't, you can use [this](https://kinsta.com/blog/install-composer/) for composer and [this](https://kinsta.com/blog/how-to-install-node-js/) for node js. You can know if you have composer installed by making: `composer --version` and for node, you can use `node -v`

For runing this project you need to follow this step:

## 1. Clone the projet

Use `git clone` command to get the project.

## 2. Install dependances

Use `composer install` command to install the php dependences and `npm install` for node js dependences.

## 3. Generate composer key

Use `php artisan key:generate` command to create a new key for the application

## 4. Configure the  environnement

Create a ".env" file in the project root. Copy the content of "env.exemple" file and past it in the ".env" file. Update the ".env" file with the good value for the environement data. 

## 5. Run the migration and seeders

Create a new database corresponding to the database name provide in the .env file. Use `php artisan migrate --seed` command to run the migration and seeder. You shoudn't get any errors.

## 6. Run the project

Use php `artisan serve command` to run the project.

# <h1 style="text-align:center;">Step to dockerize</h1>
## 🚀 Résumé du processus de dockerisation avec Apache et MySQL
Voici les étapes que tu as suivies pour dockeriser ton application Laravel avec Apache et MySQL :

### 1️⃣ Création du Dockerfile pour Laravel avec Apache
Choisir l’image de base : php:8.2-apache
Installer les extensions PHP nécessaires :
pdo et pdo_mysql pour la connexion à MySQL
gd pour la gestion des images
Activer mod_rewrite d'Apache pour permettre l'utilisation du .htaccess
Définir le ServerName dans Apache pour éviter l’avertissement
Copier les fichiers du projet dans le conteneur (/var/www/html/)
Assurer que le fichier .htaccess est bien copié pour gérer les URLs propres
Donner les permissions nécessaires (777) aux dossiers storage et bootstrap/cache
Changer le propriétaire des fichiers pour Apache (www-data)
Modifier la config Apache pour autoriser .htaccess (AllowOverride All)
Exposer le port 80 pour le serveur Apache
Démarrer Apache en mode foreground (CMD ["apache2ctl", "-D", "FOREGROUND"])
### 2️⃣ Construction et Exécution du Conteneur Laravel
Construire l’image Docker :
bash
Copy
Edit
docker build -t laravel_app .
Démarrer le conteneur Laravel :
bash
Copy
Edit
docker run -d -p 8000:80 --name laravel_container laravel_app
### 3️⃣ Configuration de MySQL
Aucun conteneur MySQL n’était en cours d’exécution, donc Laravel ne pouvait pas se connecter à la base de données.
Ajout d’un conteneur MySQL manuellement :
bash
Copy
Edit
docker run -d --name mysql_container -e MYSQL_ROOT_PASSWORD=root -e MYSQL_DATABASE=laravel -p 3306:3306 mysql:5.7
Vérification du bon fonctionnement de MySQL :
bash
Copy
Edit
docker ps
Vérifier si le conteneur Laravel peut ping MySQL :
bash
Copy
Edit
docker exec -it laravel_container ping mysql_container
Problème : "Connection refused" → Solution : Ajouter une entrée hosts manuellement dans le conteneur Laravel
bash
Copy
Edit
echo "127.0.0.1 mysql_container" >> /etc/hosts
Problème de permission sur /etc/hosts → Résolu avec une autre approche
### 4️⃣ Configuration de Laravel
Modifier le fichier .env pour pointer vers mysql_container :
ini
Copy
Edit
DB_CONNECTION=mysql
DB_HOST=mysql_container
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=root
Lancer les migrations pour tester la connexion :
bash
Copy
Edit
docker exec -it laravel_container php artisan migrate
✅ Résultat Final
Laravel est accessible sur http://localhost:8000
Connexion MySQL fonctionnelle
Fichiers accessibles et .htaccess pris en compte
Apache fonctionne sans erreurs
