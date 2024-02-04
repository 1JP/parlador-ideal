# O Mentor - Meteora Digital

## About O Mentor

O mentor is a web application for _Meteora Digial_ to shared courses with their clients.

## Configuring your enviroment

Clone the repository from GIT, and then:

```bash
composer create-project -n
sed -i 's/APP_ENV=local/APP_ENV=ci/g' .env
composer install --no-progress
php artisan key:generate
```

Install NPM dependencies:

```bash
npm install
```

With the DB already created and set on `.evn`, run:

```bash
php artisan migrate --seed
```

or

```bash
php artisan migrate
php artisan db:seed
```

### Runing

-   To start a local server

```bash
php artisan serve
```
-   To run PHP tests

```bash
php artisan test --parallel --coverage --min=15
```

-   To apply the `app.css` changes, run:

```bash
npm css:build
```

or, to watch these changes:

```bash
npm css:watch
```

to watch css changes:
```bash
npm dev
```

To run the project, we need to install meilisearch and redis service on linux (wsl on windows) adn run it when code.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
