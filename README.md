# Laravel Mini-CRM Project
## Overview
This project is a mini-CRM system built with the Laravel TALL stack (TailwindCSS, Alpine.js, Livewire, and Laravel). It's designed to manage companies and their employees efficiently. The project demonstrates CRUD operations, file handling, and authentication, offering a practical example of a small business management tool.

## Setup
- Clone the repository using `git clone https://github.com/kuvinci/laravel-mini-CRM.git`.
- Run `composer install` to install PHP dependencies.
- Set up your `.env` file with your database and other environment configurations.
- Run `chmod -R 777 [laravel-project-name]/storage/` and `chmod -R 777 [laravel-project-name]/bootstrap/cache/`
- Run `php artisan migrate --seed` to set up your database tables and seed them with initial data.
  - Please check database/seeders/UserSeeder.php for admin and regular user credentials
- Serve the application using `php artisan serve` and access it at `http://localhost:8000`.
- Run `php artisan storage:link` if company logos aren't accessible.

## Contributions
Contributions are welcome! If you'd like to contribute, please fork the repository and use a feature branch. Pull requests are warmly welcome.

## Licensing
The project is open-sourced under the [MIT license](https://opensource.org/licenses/MIT).
