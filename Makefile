## Install Dependencies
install:
	docker run -it --rm -v $(CURDIR):/app composer/composer install

## Run phpunit tests
test-phpunit:
	./vendor/bin/sail test --configuration phpunit.xml

## Web Scrape
web-scrape:
	./vendor/bin/sail php artisan command:web-scraper

## Start Sail
sail-start:
	./vendor/bin/sail up -d




