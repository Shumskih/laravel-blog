FROM nginx:1.23.1

ADD docker/conf/vhost.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/html
