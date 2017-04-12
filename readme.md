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
 