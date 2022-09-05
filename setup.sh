#!/bin/bash
docker exec blog_fpm composer install
docker exec blog_fpm php artisan migrate --seed
docker exec blog_fpm php artisan key:generate
