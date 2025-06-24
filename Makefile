start:
	php artisan serve

install:
	composer install

load:
	composer dump-autoload

lint:
	composer exec phpcs -- --standard=PSR12 app routes tests

lint-fix:
	composer exec --verbose phpcbf -- --standard=PSR12 app routes tests

migrate:
	php artisan migrate

console:
	php artisan tinker

test:
	php artisan test tests/Feature

setup:
	composer install
	cp -n .env.example .env
	php artisan key:gen --ansi
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
	npm ci
	npm run build
