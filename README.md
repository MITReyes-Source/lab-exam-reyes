# Student Manager — Web-Based Programming Midterm Lab

**Student:** Replace with your full name  
**Project:** Laravel Student Manager  
**Purpose:** Student CRUD, course relationships, authentication, ownership authorization, and Sanctum token API.

## Requirements
- PHP version supported by the Laravel version installed
- Composer
- MySQL/MariaDB or another Laravel-supported database
- Git

## Setup
1. Create the Laravel application:
   ```bash
   composer create-project laravel/laravel lab-exam-reyes
   cd lab-exam-reyes
   ```
2. Install API/Sanctum support (Laravel 11/12):
   ```bash
   php artisan install:api
   ```
   If prompted to run migrations before configuring the database, answer no, configure `.env`, then migrate later.
3. Copy the contents of this starter ZIP into the matching paths in the Laravel project, allowing files to merge/overwrite where indicated. Keep the original Laravel `User.php` and merge in the `HasApiTokens` trait if needed.
4. Configure `.env` database values. Do not commit `.env`.
5. Run:
   ```bash
   php artisan key:generate
   php artisan migrate --seed
   php artisan serve
   ```
6. Open http://127.0.0.1:8000/login

## Test accounts
Seeder creates:
- `maroj@example.com` / `Password123!`
- `harvey@example.com` / `Password123!`

Change these sample credentials before using this application outside a local classroom exercise.

## Web features
- Login/logout
- Auth-protected student resource routes
- Course dropdown
- Student CRUD and validation
- Only the student creator can edit/delete their record
- API token creation and token-protected student list

## API quick test
Create a token:
```bash
curl -X POST http://127.0.0.1:8000/api/tokens/create \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{"email":"maroj@example.com","password":"Password123!"}'
```
Copy the returned `plainTextToken`, then:
```bash
curl http://127.0.0.1:8000/api/students \
  -H "Accept: application/json" \
  -H "Authorization: Bearer PASTE_TOKEN_HERE"
```
Without a token, `/api/students` should return HTTP 401.

## GitHub
Create a **public** empty repository on GitHub, then from the project directory:
```bash
git init
git add .
git commit -m "Task 1: create Laravel project and README"
git branch -M main
git remote add origin https://github.com/YOUR-USERNAME/lab-exam-reyes.git
git add .
git commit -m "Complete Student Manager CRUD, auth, policy, and API"
git push -u origin main
```
For the exam's one-meaningful-commit-per-task requirement, make separate commits as you finish each task instead of only the two example commits above. Never add `.env`, passwords, or API tokens to Git.
