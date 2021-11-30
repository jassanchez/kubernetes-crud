FROM mysql:5.6
ENV MYSQL_DATABASE CRUD
ENV MYSQL_ROOT_PASSWORD secret
COPY script.sql /docker-entrypoint-initdb.d/db.sql

RUN /entrypoint.sh mysqld & sleep 30 && killall mysqld
RUN rm /docker-entrypoint-initdb.d/db.sql

EXPOSE 3306