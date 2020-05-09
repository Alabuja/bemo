Create .env file on the root directory and copy the content of .env.example to it.

Do not forget to set the database details.

Run `php artisan key:generate` on your terminal to generate your key in .env file.
Run `composer install` or `composer update` on your terminal to install the dependencies.
Run `php artisan migrate:refresh --seed` on your terminal to generate the database and some seeder contents.

### Note: In production environment, change the value of APP_DEBUG to false 

### Php version 7.1.3 while laravel version is 5.8.*

### You need to have [composer](https://getcomposer.org/), [php](https://www.php.net/) and [laravel](https://laravel.com/docs/5.8)
