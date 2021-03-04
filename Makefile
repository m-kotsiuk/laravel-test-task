init: clear build up load-db

up:
	docker-compose up -d

down:
	docker-compose down --remove-orphans

restart: up down

clear:
	docker-compose down -v --remove-orphans

build:
	docker-compose pull
	docker-compose build

load-db:
	docker-compose run --rm php-cli php artisan migrate:refresh --seed

cli:
	read COMMAND; \
	docker-compose run --rm php-cli $$COMMAND

node:
	read COMMAND; \
	docker-compose run --rm node $$COMMAND

test:
	docker-compose run --rm php-cli php vendor/bin/phpunit
