install: build up prepare-env reset-db

init: clear build up reset-db

prepare-env:
	cp .env.example .env
	docker-compose run --rm php-cli composer install
	docker-compose run --rm php-cli php artisan key:generate
	docker-compose run --rm php-cli php artisan storage:link


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

seed-db:
	docker-compose run --rm php-cli php artisan migrate:refresh --seed

dump-db:
	docker-compose exec -T mysql /usr/bin/mysqldump --no-tablespaces -u app -psecret app > app.sql

reset-db:
	cat app.sql | docker-compose exec -T mysql /usr/bin/mysql -u app -psecret app

cli:
	read COMMAND; \
	docker-compose run --rm php-cli $$COMMAND

node:
	read COMMAND; \
	docker-compose run --rm node $$COMMAND
