# Information Web
Rest API Pakir
## Requirement
1. [PHP 8]
2. [Laravel 9]


## Installation
1. `git clone https://github.com/salak96/Rest-api-Parkir.git`
2. Run `composer update` atau `composer install`
3. Edit file `env.example` ke `env`
4. Edit `DB_DATABASE=`  ke  `DB_DATABASE=database_api`
5. Run `php artisan key:generate`
6. Migrate database `php artisan migrate`
7. Seeder table User, Pengaturan Run `php artisan db:seed`
8. Run `npm run dev`
9. Run the server with command `php artisan serve`
10. Open Browser http://127.0.0.1:8000/
