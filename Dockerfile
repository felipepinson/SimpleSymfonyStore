FROM ambientum/php:7.2
COPY ./ /usr/src/app
WORKDIR /usr/src/app/
EXPOSE 8080

ENTRYPOINT bin/console server:run 0.0.0.0:8080