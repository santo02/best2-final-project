#### Prerequisites:
- PHP 8
- Laravel [Download Laravel Here](https://laravel.com/docs/9.x/installation)
- Node JS [Download Laravel Here](https://nodejs.org/en/download/)

#### How to Run this Project?
- Clone this project
- Go to the folder application using cd command on your cmd or terminal
- Run composer install and npm install on your cmd or terminal
- Copy .env.example file to .env on the root folder. You can type copy .env.example .env if using command prompt Windows or cp .env.example .env if using terminal, Ubuntu
- Open your .env file and change the database name (DB_DATABASE) to whatever you have, username (DB_USERNAME) and password (DB_PASSWORD) field correspond to your configuration.
- Import marketplaces.sql and risk_values.sql to MySQL
- Run php artisan key:generate
- Run php artisan migrate
- Run php artisan serve
- Run npm run watch
- Go to http://localhost:8000/

```shell
cd file
composer install
php artisan key:generate
php artisan migrate
php artisan serve
npm run watch
```

Arigatou~
