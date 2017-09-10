# lumen-api
===========

### Requirements
----------------
- MongoDB
- PHP >= 5.6
- Extension php_mongodb

### Instalation
---------------
Masuk ke webroot dan clone repository ini, lalu ketikan command
```
composer install
```

### Config
----------
Atur koneksi database di file `./.env`
```
DB_CONNECTION=mongodb
DB_HOST=<dbhost>
DB_PORT=<dbport>
DB_DATABASE=<dbname>
DB_USERNAME=<dbuser>
DB_PASSWORD=<dbpass>
```

Lalu migrasi kan ke database
```
php artisan migrate
```

Jalankan api melalui command
```
php -S localhost:port -t public
```

### Available endpoints
-----------------------
- GET `http://localhost:port/users`
- GET `http://localhost:port/users/{id}`
- PUT `http://localhost:port/users/{id}`
- POST `http://localhost:port/users`
- DELETE `http://localhost:port/users/{id}`
