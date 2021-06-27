# FizzBuzz

### Requirments

* PHP >= 7.4
* Composer
* Docker
* Docker-compose
* Phpunit

### Installation guide

```docker-compose up -d```

```docker-compose exec php composer install```


### Run the FizzBuzz
```docker-compose exec php php bin/console app:fizzbuzz  -l 100```


### Run the unit test

```docker-compose exec php ./vendor/bin/phpunit```


### Run CodeSniffer

To check your app code to accordance to PSR standards, run the following script

```bash
    docker-compose exec php php vendor/bin/phpcs --encoding=utf8
```

To fix your code according to PSR standards, run the following script

```bash
    docker-compose exec php php vendor/bin/phpcbf
```
