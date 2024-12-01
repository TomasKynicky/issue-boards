PROJECT_NAME := issue-boards
COMPOSE_FILE := docker-compose.yml

# Start project

# Build database
up:
	symfony server:start
	@echo 'App is running on http://localhost'

init:
	docker-compose -f docker-compose.yml up
	php bin/console doctrine:database:create
	php bin/console doctrine:migrations:migrate

# Turn off project
down:
	docker-compose -f $(COMPOSE_FILE) -p $(PROJECT_NAME) down
	@echo 'App is stopped on http://localhost'

phpstan:
	docker-compose -f $(COMPOSE_FILE) -p $(PROJECT_NAME) run --rm phpstan /app/phpstan.phar analyse src --level=7 --memory-limit=1G