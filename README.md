# Stage Job Explorer

This project is a Laravel-based application for managing internship/job postings, student profiles, and interest matching. It was started as a team assignment and is currently incomplete, so this README is written for the next group picking it up.

## What the app contains

- Laravel 12 application using PHP 8.2
- User authentication and profile pages
- Role-based access for `bedrijf` (company) users
- Student CRUD management
- Interest selection flow for authenticated users
- Vacancy management for companies via `VacatureController`
- Models:
  - `Student`
  - `Bedrijf`
  - `Interesse`
  - `StudentInteresse`
  - `Vacature`
  - `Sollicitatie`

## Key routes

- `/` → login / choose login view
- `/preferences` → user preferences page
- `/students` → student list and CRUD pages
- `/interesses/select/{type?}` → interest selection wizard for authenticated users
- `/vacatures` → vacancy management for `bedrijf` role only
- `/dashboard` → authenticated dashboard

The main route file is `routes/web.php`.

## How to get the project running

1. Install PHP dependencies:
   - `composer install`
2. Copy environment file:
   - `copy .env.example .env`
3. Generate app key:
   - `php artisan key:generate`
4. Run migrations:
   - `php artisan migrate`
5. Install frontend dependencies:
   - `npm install`
6. Build assets:
   - `npm run build`
7. start Vite dev server:
   - `npm run dev`
8. I use HERD for the launching so no need for php artisan serve

## Useful commands

- `php artisan migrate` — run database migrations
- `php artisan db:seed` — seed data if seeders exist or are added
- `php artisan test` — run tests
- `npm run dev` — start Vite dev server
- `npm run build` — build production assets

## What still needs work

- Authentication flow and user roles are present, but not all views and UI paths are finished.
- The interest selection wizard saves data to session and student interests, but may need better validation and completion behavior.
- Vacancy / application workflows are likely incomplete and need end-to-end testing.
- `resources/views` likely has missing or unfinished Blade templates.
- No documentation exists yet for the exact business rules and data relationships.

## Important files to review next

- `routes/web.php`
- `app/Http/Controllers/InteresseController.php`
- `app/Http/Controllers/VacatureController.php`
- `app/Http/Controllers/StudentController.php`
- `app/Models/*`
- `database/migrations/*`
- `resources/views/*`
- `app/Http/Middleware/InteressesIngevuld.php` (if present)

## Notes for the next team

- The app uses `spatie/laravel-permission` for role management.
- Companies can only access vacancy routes when assigned the `bedrijf` role.
- Student interests are stored through the `StudentInteresse` pivot model.
- The home page currently redirects to an auth choice screen, so login setup is required first.
- Check `.env` settings for database configuration before running migrations.