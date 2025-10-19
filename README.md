# Laravel Profile Project

This project was created as part of an **Interview Task** for a Laravel Internship. It allows users to build and manage their personal profile, including education details and comments from other users. The app is built using Laravel, Blade, and Bootstrap.

## Features

### Profile Management
Users can create, read, and update their personal information.  
Each profile includes:
- Avatar (Profile Photo)
- Name
- Gender
- Hobbies

### Education Details
Users can add and manage their educational background.  
Each education record contains:
- Degree
- Institute
- Start Date (Day/Month/Year)
- End Year (Year)

### Comments on Portfolio
Other users can leave comments (text or image) on your portfolio or CV.

### Delete Profile
Users can delete their profile and all related data if they wish.

## Technologies Used
- Laravel 11+
- PHP 8+
- SQLite / MySQL
- Blade Template Engine
- Bootstrap 5
- Eloquent ORM
- Factory & Seeder for dummy data

##  Installation Guide
Follow these steps to run the project locally:

```bash
# Clone the repository
git clone https://github.com/manchuriqbal/portfolio-profile

# Go to the project directory
cd portfolio-profile

# Install dependencies
composer install

# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate

# Configure your database in .env (use SQLite/MySQL)

# Run migrations and seed data
php artisan migrate:fresh --seed

# Start the development server
php artisan serve
