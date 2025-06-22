.PHONY: help up stop reset enter logs

SAIL := ./vendor/bin/sail
CONTAINER := backend

help: ## show this dictionary
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-20s\033[0m %s\n", $$1, $$2}'

up: ## run application in demon mode
	$(SAIL) up -d

stop: ## stop application
	$(SAIL) stop

reset: ## build and up all application
	$(SAIL) down --rmi all -v && $(SAIL) up -d --build

enter: ## enter backend container
	$(SAIL) exec $(CONTAINER) bash

logs: ## backend container logs
	$(SAIL) logs -f $(CONTAINER)
