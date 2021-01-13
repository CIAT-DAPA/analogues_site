FROM wordpress:php7.1-apache
LABEL maintainer="j.camilo.garcia@hotmail.com"

#Copy website into container
COPY analogues_website_wordpress/ /var/www/html


## docker pull juancode528/analogues_website_wordpress:latest
## docker run --env-file ./.env --name analogues_web --link analogues_db:mysql -d juancode528/analogues_website_wordpress:latest