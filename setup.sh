#!/bin/bash
if [[ $EUID -ne 0 ]]; then
   echo "Este script debe ser ejecutado como root" 
   exit 1
fi

php artisan migrate:fresh
echo "Usa el siguiente comando: psql -d basededatos -a -f venezuela.sql";
su postgres

php artisan migrate --path=/database/migrations/2020_05_31_154255_create_offices_table.php
php artisan migrate --path=/database/migrations/2020_03_31_054106_create_prices_table.php
php artisan migrate

php artisan storage:link
php artisan serve
