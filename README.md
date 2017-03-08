# deployer-recipes

## Installation
* Install composer
```bash
curl -sS https://getcomposer.org/installer | php
```
* Install this package via composer
```bash
php composer.phar require ubiedigital/deployer-recipes
```

## Recipes

### Local
* local:shared

### Local npm 
* local:npm-cache:install

### Local bower
* local:bower:install

### Local gulp
* local:gulp:build

### Symfony
* deploy:create_log_dir
* doctrine:schema:drop
* doctrine:schema:update
* doctrine:fixtures:load
* doctrine:migrations:migrate

### Symfony local
* local:assets:install
* local:js-routing:dump
