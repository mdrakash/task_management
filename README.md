# Task Management System

This is a Laravel-based Task Management System for organizing, tracking, and managing tasks efficiently.

## Installation Guide

Follow the steps below to set up the project on your local machine.

### 1. Clone the Repository

Clone the project from the GitHub repository using the following command:

```
git clone https://github.com/mdrakash/task_management.git
```

Navigate into the project directory:

```
cd task_management
```

### 2. Copy .env File

```
cp .env.example .env
```

Edit the .env file to configure your environment settings (e.g., database, mail, etc.).

### 3. Install Composer Dependencies
Install all the necessary PHP dependencies by running:

```
composer install
```

### 4. Generate Application Key
Generate the application encryption key:

```
php artisan key:generate
```


### 5. Install NPM Dependencies
Install all the required Node.js dependencies:

```
npm install
```
### 6. Run Migrations and Seeder file

```
php artisan migrate --seed
```

### 7. Install Passport Clinet Access Token

```
php artisan passport:client --personal
```
enter any name for client

### 8. Run Local Server

```
php artisan serve
```

## Built With

- **Laravel** - PHP Framework for web artisans
- **Vue.js** - Progressive JavaScript Framework for building user interfaces

## License

This project is licensed under the MIT License.

---

This `README.md` provides clear instructions for cloning, setting up, and running the Laravel project.
