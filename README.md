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
