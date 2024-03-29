# O Parlador Ideal

## About O Parlador Ideal

O Parlador Ideal is a web application for _Parlador Ideal_ facilitate the exchange of libertarian ideas.

## Configuring your enviroment

Clone the repository from GIT, and then:

```bash
cp .env.example .env
composer install --no-progress
php artisan key:generate
```

Install NPM dependencies:

```bash
npm install
```

With the DB already created and set on `.env`, run:

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
php artisan test
```

-   To apply the `app.css` changes, run:

```bash
npm run watch
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
