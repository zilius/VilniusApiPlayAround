app_name = vilniusApp

export HTTP_PORT = 8100
export PROJECT_NAME = vilniusApp
export WORK_DIR = $(shell pwd)

init:
	make composer-install
	make non-root
	make up

up:
	make non-root
	docker-compose up

stop:
	docker-compose down

composer-install:
	docker run --rm -v $(WORK_DIR):/app composer install

ssh:
	docker exec -it vilnius-app-php /bin/bash

non-root:
	sudo chown -R $(USER):$(USER) $(WORK_DIR)