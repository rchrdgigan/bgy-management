
# Barangay Management System

## Installation

Before you use the Barangay Management System make sure that you install it in your computer.

* First open your git bash and clone this reporsitory

```bash
git clone https://github.com/rchrdgigan/bgy-management.git
```

* Second to change your working directory

```bash
cd bgy-management
```

* Third to install the laravel dependencies and libraries required

```bash
composer install
```

* Fourth to copy the environment file and change the values according to your development environment

```bash
cp .env.example .env
```

* To generate laravel key

```bash
php artisan key:generate
```

* To migrate and seed the database

> Note! make it sure that you have already created a database before doing this and assign it to your .env file

```bash
php artisan migrate --seed
```

* Create the symbolic links configured for the application

```bash
php artisan storage:link
```
