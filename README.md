# README
## Setup Laravel using Docker
This guide will walk you through the steps to set up a Laravel development environment using Docker.
### Prerequisites
Before you begin, make sure you have the following installed on your machine:
- Docker: [https://www.docker.com/get-started](https://www.docker.com/get-started)
- Docker Compose: [https://docs.docker.com/compose/install/](https://docs.docker.com/compose/install/)

### Step 1: Clone the Laravel repository

```
git clone git@github.com:Kunjky/porto_laravel.git
```

### Step 2: Create .env

```
cd porto_laravel
cp .env.example .env
```

### Step 3: Build and start containers

```
docker-compose up
```

### Step 4: Run following commands

```
docker exec base_laravel_api composer install
docker exec base_laravel_api php artisan key:generate
docker exec base_laravel_api php artisan migrate
```

### Step 5: Make a request to app

```
curl --location --request GET 'http://localhost:8081/api/app/v1/todos' --header 'Content-Type: application/
```


## Code quality check tools

### [Larastan](https://github.com/nunomaduro/larastan)

```
./vendor/bin/phpstan analyse --memory-limit=-1
```

### [PHPCS](https://github.com/squizlabs/PHP_CodeSniffer)

```
./vendor/bin/phpcs -n --standard=phpcs.xml
```

### [PHP Insights](https://phpinsights.com/)

- The goal is for 90% code to pass the check

```
php artisan insights --no-interaction \
  --min-quality=90 --min-complexity=90 \
  --min-architecture=90 --min-style=90
```

## Project structure

###  Using [Porto architectural pattern](https://github.com/Mahmoudz/Porto)

```markdown
app
├── Ship (Other sections should extends base class from Ship)
├── SectionApp (This section contains all api for app)
├── SectionCrm (This section contains all api for crm)
└── SectionBatch (This section contains all scheduled commands)
```

>Note: A Section MUST be isolated and SHOULD NOT depend on any other Section.

The Request Life Cycle is the process through which an API call navigates through the main components of a Porto application. The following steps describe a basic API call scenario:

1. The User calls an `Endpoint` in a `Route` file.
2. `Endpoint` calls a `Middleware` to handle the Authentication.
3. `Endpoint` calls its corresponding `Controller` function.
4. The `Request` object, which is automatically injected in the `Controller`, applies the request validation and authorization rules.
5. `Controller` calls an `Action` and passes the data from the `Request` object to it.
6. `Action` executes the business logic, or it can call as many `Tasks` as needed to execute reusable subsets of the business logic.
7. `Tasks` execute reusable subsets of the business logic, with each `Task` responsible for a single portion of the main `Action`.
8. `Action` prepares the data to be returned to the `Controller`, and may collect data from the `Tasks` if needed.
9. `Controller` builds the response using a `View` or `Transformer`, and sends it back to the User.

It is important to note that the `Request` object handles request validation and authorization rules, while the `Action` executes the business logic. The `Tasks` can be used to execute reusable subsets of the business logic, with each `Task` responsible for a single portion of the main `Action`. The `View` or `Transformer` is used to build the response that is sent back to the User.


### Updating...
