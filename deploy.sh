#!/usr/bin/env bash

ssh bde@bde.oprax.fr "cd ~/www; git pull origin master; composer update --no-dev; php artisan migrate --force"
