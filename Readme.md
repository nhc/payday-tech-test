# payday-tech-test

### Local development machine

1. Install Docker and docker-compose if you don't already have it https://store.docker.com/search?type=edition&offering=community
(hint: you should - it is awesome!)

The Mac version has both Docker and docker-compose but I can't speak for the other platforms.

2. Clone this repository

3. From the root where you can see the docker-compose.yml file run the following 

```bash
$ docker-compose -up -d
```

That should be it! Yes thats right, you are ready to go !

We build a couple of servers, one for the form and one for the backend. We also install a mysql database with the correct tables and load data into it. 

Access the front end here 

```
http://localhost:8080/
```

Access the backend here 

```
http://localhost:8081/payday/1/2018
```

### To run unit tests

You need to enter the docker container and run it from in there. This is neccessary so that it can run in the right context. Think of it as a seperate server somewhere.

```bash
$ docker-compose exec php bash 
$ vendor/phpunit/phpunit/phpunit -c phpunit.xml
```

### A quick explanation

The front end is a simple site built with ReactJS which takes the input and sends it to the web service. So it is completely decoupled from the backend. 

The backend is built with Lumen of the Laravel family. 

The controller is here [images/server/app/app/http/Controllers/PaydayController](https://github.com/nhc/payday-tech-test/blob/master/images/server/app/app/Http/Controllers/PaydayController.php) and the other files that handle the logic I put in [images/server/app/app/Models](https://github.com/nhc/payday-tech-test/tree/master/images/server/app/app/Models).

It is probably overkill for this project but I wanted to demonstrate splitting out the classes into 3 parts and also the use of an MVC framework. 

### Troubleshooting

The whole thing should be painless and just build itself. However if something doesnt seem right you can try this

```bash
$ docker-compose ps
```

And this should return something like this

```bash
       Name                     Command               State               Ports
--------------------------------------------------------------------------------------------
backend_db_1         docker-entrypoint.sh mysqld      Up      0.0.0.0:3306->3306/tcp
backend_frontend_1   docker-php-entrypoint apac ...   Up      0.0.0.0:8080->80/tcp
backend_server_1     docker-php-entrypoint apac ...   Up      0.0.0.0:8081->80/tcp, 8081/tcp
```

If anything is not running (state: Up) you can try this again.

```bash
$ docker-compose -up -d
```

or 

```bash
$ docker-compose restart
```

### Improvements

I can think of plenty. Why not discuss them with me? 