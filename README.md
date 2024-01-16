
# SDataHealthCare

Secure Data Health Care

## Demo

🔗 Demo Url: https://sdatahealthcare.wafiq.my.id/


## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

Install dependencies

```bash
  composer install
```

Copy .env

```bash
  cp .env.example .env / cp .env.example /env
```

Migrate Database

```bash
  php artisan migrate --seed
```

Generate secret key

```bash
  php artisan key:generate 
```

Run laravel

```bash
  php artisan serve --port==4000
```
