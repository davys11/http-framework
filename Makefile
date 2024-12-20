init: docker-down docker-pull docker-build docker-up
up: docker-up
down: docker-down
restart: down up

docker-up:
	docker compose up -d

docker-down:
	docker compose down --remove-orphans

docker-down-clear:
	docker compose down -v --remove-orphans

docker-pull:
	docker compose pull

docker-build:
	docker compose build --pull

lint:
	docker compose run --rm php-cli composer php-cs-fixer fix -- --dry-run --diff

cs-fix:
	docker compose run --rm php-cli composer php-cs-fixer fix

test:
	docker compose run --rm php-cli composer test
