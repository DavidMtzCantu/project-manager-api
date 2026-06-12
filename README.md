# Project Manager API

REST API for managing projects and tasks, built with Laravel 13 and Docker.

## Technologies

- **Laravel 13** — PHP Framework
- **MySQL 8** — Database
- **Laravel Sanctum** — API Authentication
- **Docker & Docker Compose** — Containerization

## Requirements

- Docker
- Docker Compose

## Installation

1. Clone the repository

   git clone https://github.com/DavidMtzCantu/project-manager-api.git
   cd project-manager-api

2. Copy the environment file

   cp .env.example .env

3. Start the containers

   docker compose up -d

4. Install dependencies

   docker compose exec app composer install

5. Generate the application key

   docker compose exec app php artisan key:generate

6. Run migrations

   docker compose exec app php artisan migrate

7. The API will be available at `http://localhost/api/v1`