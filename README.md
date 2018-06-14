# A Demo explain how vueJs works in laravel
INSTALLATION:
1- edit .env file to your database configuration.
2- open the terminal and execute this to build up the project:
# composer install
# npm install
# php artisan migrate
# php artisan serve
3- to fill products table with 10 dummy products run this:
# php artisan tinker
>>> factory(App\Product::class, 10)->create();
