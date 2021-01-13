FROM mysql/mysql-server:5.7
LABEL maintainer="j.camilo.garcia@hotmail.com"

# Copy the database script
COPY conf/ /docker-entrypoint-initdb.d/

## docker pull juancode528/analogues_database_mysql:latest
## docker run -p 3306:3306 --env-file ./.env --name analogues_db -d juancode528/analogues_database_mysql:latest