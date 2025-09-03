Mini Issue Tracker

A small Laravel app to manage **projects, issues, tags**.  
Built as a technical interview task to demonstrate relationships, validation, AJAX data fetching and data filtering. 

## Features
- Projects with name, description, start date, and deadline  
- Issues (status, priority, due date) linked to projects  
- Tags (name + color) many-to-many with issues   
- Filters (status, priority, tag)  

## Tech Stack
- Laravel 11, PHP 8.3  
- MySQL  
- Tailwind + jQuery AJAX  

## Setup
```bash
git clone <repo>
cd issue-tracker
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve

npm run dev
```

## Notes
This project was built under time constraints for an interview.  
Core features are working, but some parts are not fully implemented yet.

## Whats left:
User to Issue Attachment/Detachment
Authorization
Text Search on issues
Comments
