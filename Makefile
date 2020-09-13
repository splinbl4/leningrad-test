init: docker-down-clear docker-build docker-up leningrad-init

docker-up:
	docker-compose up -d

docker-build:
	docker-compose build

docker-down:
	docker-compose down --remove-orphans

docker-down-clear:
	docker-compose down -v --remove-orphans

leningrad-init: leningrad-composer-install app-key-generate perm leningrad-wait-db leningrad-migrations leningrad-seed

leningrad-composer-install:
	docker-compose run --rm leningrad-php-cli composer install

leningrad-composer-install-mongodb:
	docker-compose run --rm leningrad-php-cli composer require jenssegers/mongodb

leningrad-wait-db:
	sleep 10

leningrad-migrations:
	docker-compose run --rm leningrad-php-cli php artisan migrate

leningrad-seed:
	docker-compose run --rm leningrad-php-cli php artisan db:seed

leningrad-test:
	docker-compose run --rm leningrad-php-cli php artisan test

app-key-generate:
	docker-compose run --rm leningrad-php-cli php artisan key:generate

perm:
	sudo chmod -R 777 storage bootstrap/cache
	sudo chmod -R 777 storage storage/logs
