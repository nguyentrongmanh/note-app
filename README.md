Follow me on github [https://github.com/nguyentrongmanh](https://github.com/nguyentrongmanh)
## Required enviroiment version

$ php >= 8.1.x
$ php >= 16.16.x

## Installation

``` bash
# install app's dependencies
$ composer install
$ npm install
# copy env
$ cp .env.example .env
# docker run
$ ./vendor/bin/sail up -d
# generate laravel APP_KEY
$ ./vendor/bin/sail artisan key:generate
# run database migration and seed
$ ./vendor/bin/sail artisan migrate --seed
# generate symbolic link
$ ./vendor/bin/sail artisan storage:link
```
## Usage
### Login account
``` bash
test_account@example.com
password
```

## Format code

``` bash
$ ./vendor/bin/pint
```

## Check test coverage 

``` bash
$ ./vendor/bin/sail artisan test --coverage
```

## Database connection

``` bash
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=aspise-test
DB_USERNAME=sail
DB_PASSWORD=password
```

