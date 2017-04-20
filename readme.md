Projet Web BDE
=========

# 1. Installation

First clone the projet :
```bash
git clone git@github.com:Oprax/projet-web.git
```

Next you need to create a database, we use MySQL, here an example :
```sql
CREATE DATABASE bde;
CREATE USER 'bde'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON bde.* TO 'bde'@'localhost';
FLUSH PRIVILEGES;
```

Then we need to configure laravel with `.env` at root of project, you can copy `.env.example` to have a template, fill it with your information.

Now we need run migration with `php artisan migrate` and you can run a server with `php artisan serve` :)

# 2. Deploy 
 
On server run the `update.sh` in the `$HOME` directory.

# 3. Selenium Test

Please download Selenum 2.x [server](https://selenium-release.storage.googleapis.com/2.53/selenium-server-standalone-2.53.1.jar)

Run it with java : 
```bash
java -jar selenium-server-standalone-2.53.1.jar
```

On root directory project (after a `composer update`) you can run behat :
```bash
vendor/bin/behat
```

Enjoy !
 