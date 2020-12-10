#!/bin/sh

sudo apt update
sh install-docker.sh
sudo service docker start
alias sail='bash vendor/bin/sail'
sail up -d
sail php artisan migrate
sail php artisan db:seed
sail php artisan storage:link