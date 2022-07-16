Requirements
- PHP 8.1
- Composer
- Docker 




To start Laravel in Docker :

1.  Rename .env.docker to .env
2.  run composer install :
    + composer install
3.  Run 
    + ./vendor/bin/sail up


Swagger docs

http://localhost/api/documentation





Generate Swagger

php artisan l5-swagger:generate
