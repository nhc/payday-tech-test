# payday-tech-test

## Instructions

LIVE DEMO: xxx.xxx.com

### Local development machine

1. Install Docker and docker-compose if you don't already have it https://store.docker.com/search?type=edition&offering=community
(hint you should it is awesome!)

The Mac version has both Docker and docker-compose but I can't speak for the other platforms.

2. Clone this repository

3. From the root where you can see the docker-compose.yml file run the following 

```bash
$ docker-compose -up -d
```

That should be it! We build a couple of servers and install a mysql database with the correct tables and load data into it. 

Access the front end here 

```
http://localhost:8080/
```

Access the backend here 

```
http://localhost:80/payday/1/2018
```

### To run unit tests

You need to enter the docker container and run it from in there, so that it has all the right environment variables to work just do this

```bash
$ docker-compose exec php bash 
$ /var/www/html/app/vendor/phpunit/phpunit/phpunit -c ../phpunit.xml
```