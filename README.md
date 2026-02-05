# Staff Attendance System

A simple staff attendance & leave management system built with Laravel.

## Tech Stack

-   Laravel 12
-   Laravel Breeze (Blade)
-   MySQL
-   Tailwind CSS

## Features

### Admin

-   Manage staff (CRUD)
-   View attendance
-   Approve/reject leave requests
-   Dashboard

### Staff

-   Submit leave request
-   View leave history
-   Attendance check-in/out

## Demo Login

### Admin

Email: admin@mail.com  
Password: admin123

### Staff

Email: staff@mail.com  
Password: staff123

## Installation

git clone ...
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
