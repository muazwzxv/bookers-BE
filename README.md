## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## How to run

-   Make sure you have [composer](https://getcomposer.org/) installed
-   Clone this repository in your desktop directory

```console
$ git clone https://github.com/muazwzxv/bookers-BE.git
```

-   Change directory into the source code

```console
$ cd bookers-BE
```

-   Run composer install to install all dependancy

```console
$ composer install
```

-   Rename the ".env.example file to .env"

```console
// For linux
$ mv .env.example .env
```

-   Edit these section of .env to your mysql configurations

```console
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

-   Run the migration Schema for database migrations

```console
$ php artisan migrate:fresh
```

-   Command to run the application

```console
$ php artisan serve
```
