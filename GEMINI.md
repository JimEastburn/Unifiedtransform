# GEMINI.md

This file provides context for Gemini AI when working on the Unifiedtransform project.

## Project Overview

**Unifiedtransform** is an open-source School Management and Accounting Software built with Laravel. It provides comprehensive tools for managing schools including students, teachers, classes, attendance, grading, and more.

## Tech Stack

### Backend
- **Framework**: Laravel 8.x (PHP >= 7.3 or 8.0)
- **Database**: MySQL 5.7
- **Authentication**: Laravel built-in auth with Spatie Laravel Permission for roles
- **Notable Packages**:
  - `spatie/laravel-permission` - Role-based access control
  - `stevebauman/purify` - HTML sanitization
  - `guzzlehttp/guzzle` - HTTP client

### Frontend
- **CSS Framework**: Bootstrap 5.x
- **Build Tool**: Laravel Mix (Webpack)
- **JavaScript**: jQuery, Lodash, Axios

### Development Environment
- **Containerization**: Docker with Nginx, PHP 7.4, MySQL 5.7
- **Testing**: PHPUnit
- **Code Quality**: StyleCI, Travis CI
- **Deployment**: Render-ready (Docker runtime)

## Project Structure

```
app/
├── Console/         # Artisan commands
├── Exceptions/      # Exception handlers
├── Http/            # Controllers, Middleware, Requests
├── Interfaces/      # Repository interfaces
├── Models/          # Eloquent models
├── Providers/       # Service providers
├── Repositories/    # Repository implementations
└── Traits/          # Reusable traits

database/
├── factories/       # Model factories for testing
├── migrations/      # Database migrations
└── seeders/         # Database seeders

resources/
├── views/           # Blade templates
├── js/              # JavaScript files
└── sass/            # SCSS stylesheets

routes/              # Route definitions
tests/               # Feature and Unit tests
```

## Architecture Patterns

- **Repository Pattern**: The project uses interfaces (`app/Interfaces/`) with corresponding repository implementations (`app/Repositories/`) for data access abstraction.
- **Service Providers**: Custom providers in `app/Providers/` bind interfaces to implementations.
- **Role-Based Access Control**: Three main roles - Admin, Teacher, Student - managed via Spatie Permission.

## Common Commands

### Docker Development

```bash
# Start containers
docker-compose up -d

# Access app container
docker exec -it app sh

# Access database container
docker exec -it db sh
```

### Inside App Container

```bash
# Install dependencies
composer install

# Generate app key
php artisan key:generate

# Run migrations with seeding
php artisan migrate:fresh --seed

# Clear and cache config
php artisan config:cache

# Run tests
php artisan test
```

### Render Deployment

The project is optimized for deployment on Render.

```bash
# Custom deployment script
./scripts/render-deploy.sh
```

**Deployment requirements:**
- `storage/app/purify` directory must exist for the `purify` package.
- `php artisan storage:link` must be run to serve uploaded assets.
- `APP_URL` and `ASSET_URL` should be set to the production HTTPS URL to avoid mixed-content issues.

### Frontend Build

```bash
# Development build
npm run dev

# Watch for changes
npm run watch

# Production build
npm run prod
```

## Default Credentials

After seeding, use these credentials to log in:
- **Admin**: admin@ut.com / password

The `DatabaseSeeder` generates a comprehensive educational dataset including:
- 1 Admin
- 10 Teachers (with roles assigned)
- 10 Classes with Sections A & B
- 40 Courses (spread across classes)
- 40 Teacher Assignments
- 50 Students (with parents and academic info)

## Key Concepts

### Sessions & Semesters
- A **Session** is an academic year
- A **Semester** is a period within a session (3-6 months)
- Previous sessions are read-only snapshots

### Classes & Sections
- **Classes** are grade levels (e.g., Class 1, Class 11 Science)
- **Sections** are divisions within classes (e.g., Section A, Section B)

### Attendance Types
Attendance can be tracked either:
1. By Section - All students in a section
2. By Course - Students enrolled in a specific course

### Grading System
- Grading systems are created per class per semester
- Rules define grade boundaries (e.g., A = 90-100)

## Testing Guidelines

- Write tests in `tests/Feature/` for HTTP tests and `tests/Unit/` for isolated unit tests
- Use model factories from `database/factories/` for test data
- Run tests with `php artisan test` inside the Docker container

## Code Style

- Follow PSR-12 coding standards
- Use type hints where possible
- Repository pattern for database access
- Keep controllers thin, move business logic to repositories or services
