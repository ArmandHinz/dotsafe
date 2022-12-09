#Variables
SYMFONY = symfony
SYMFONY_CONSOLE = $(SYMFONY) console

start: ### Start symfony server
	$(SYMFONY) serve -d

stop: ### Stop symfony server
	$(SYMFONY) serve:stop

install:
	$(SYMFONY) composer install

fixtures_install:
	$(SYMFONY_CONSOLE) d:f:load -n

first-install:
	$(SYMFONY_CONSOLE) d:d:c --no-interaction
	$(SYMFONY_CONSOLE) d:m:m --no-interaction
	$(SYMFONY) composer install
	$(MAKE) fixtures_install
	$(MAKE) start