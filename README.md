# Project Title

Test app - Acme Widget Co for Andy Fletcher at Convertri

### Prerequisites

This app is built on Symfony 4.2.7 and has been tested on PHP 7.3.4 and MariaDB 10.2.4. It should run on any PHP version > 7.1.x. Composer is required.
See https://symfony.com/doc/current/setup.html for full environment details.

### Installing

Installation should be as simple as:

1. set up offial Symfony test web server as described at https://symfony.com/doc/current/setup.html (e.g. "composer create-project symfony/website-skeleton basket")
2. check out git repo into the project directory ("basket"), overwrite any existing files
3. update dependencies (run `composer update` from your shell in the root directory of the project)
4. modify DB params in .env with connection to an empty DB
5. execute migrations to create & populate DB with test products. Alternatively, restore DB from _db.sql in the root directory
6. Open http://127.0.0.1:8000 in your browser

Enjoy!

### Testing

The app is reading products from the DB so if you want to add more products or update existing products, simply add/modify rows in the `product` DB table. 
The same is true for delivery charges & special offer (discount) calculation.

## Authors

* **Pavel Kolas** - pk@majstar.com
