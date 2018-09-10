# SimpleSymfonyStore

Installation
Clone the project:
 -  git clone https://github.com/felipepinson/SimpleSymfonyStore.git

Access the project folder:
  - cd SimpleSymfonyStore

Install composer packages:
  - docker run --rm -v $(pwd):/app composer:latest install

Copy .env file:
 -  cp .env.example .env (criar o arquivo .env com os dados do .env.example)

Upload containers with docker-compose:
 -  docker-compose build
 -  docker-compose up -d

Install database:
 -  docker exec -ti mysymplestore php bin/console doctrine:schema:update --force

Generate fake data:
 -  docker exec -ti mysymplestore php bin/console doctrine:fixtures:load

Run unit tests:
 -  docker exec -ti mysymplestore php ./bin/phpunit tests/Unit

Access environment: http://172.8.1.5:8080

About:

    Requirements
        This app works with PHP (^7.0)
        Docker (^17.05.0-ce)
        docker-compose (^1.20.1)
         - docker-compose.yml - version:3.5
        Docker images
        mysql:5.6
        composer:latest
        phpunit:phpunit

Author
        Felipe Tadeu Pinson Machado - felipepinson@gmail.com
