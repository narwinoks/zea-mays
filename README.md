

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_CONNECTION` =`mysql`
`DB_HOST` =`DB_HOST`
`DB_PORT` =`DB_PORT`
`DB_DATABASE` =`DB_DATABASE`
`DB_USERNAME` =`DB_USERNAME`
`DB_PASSWORD` =`DB_PASSWORD`



## Run Locally

Clone the project


```bash
https://github.com/narwinoks/winarno-javan-test
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer Install
```

generate key

```bash
  php artisan key:generate
```

migrate database or export database

```bash
  php artisan migrate:fresh --seed
```

Start the server

```bash
  php artisan serve
```

bash path is

```bash
<host>/api/desa
```

for unit test

```bash
php artisan test
```

## Documentation

[postman](https://documenter.getpostman.com/view/25087361/2s9XxvTEhM)

