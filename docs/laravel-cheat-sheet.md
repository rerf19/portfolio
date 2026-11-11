# Laravel Commands Cheat Sheet

## Table of Contents

- [Artisan Commands](#artisan-commands)
- [Composer Commands](#composer-commands)
- [Database & Migrations](#database--migrations)
- [Models & Eloquent](#models--eloquent)
- [Controllers](#controllers)
- [Routes](#routes)
- [Views & Blade](#views--blade)
- [Authentication & Authorization](#authentication--authorization)
- [Caching](#caching)
- [Queue & Jobs](#queue--jobs)
- [Testing](#testing)
- [Maintenance](#maintenance)

---

## Artisan Commands

### General

```bash
php artisan list                    # List all available commands
php artisan help <command>          # Display help for a specific command
php artisan --version               # Display Laravel version
php artisan tinker                  # Interactive shell
php artisan serve                   # Start development server
php artisan serve --port=8080       # Start on specific port
```

### Application

```bash
php artisan env                     # Display current environment
php artisan about                   # Display basic application information
php artisan down                    # Put application in maintenance mode
php artisan up                      # Bring application out of maintenance
php artisan optimize                # Optimize the application
php artisan optimize:clear          # Clear all cached data
```

---

## Composer Commands

```bash
composer install                    # Install dependencies
composer update                     # Update dependencies
composer require <package>          # Add a new package
composer require --dev <package>    # Add dev dependency
composer remove <package>           # Remove a package
composer dump-autoload              # Regenerate autoload files
composer show                       # List all installed packages
composer outdated                   # Show outdated packages
```

---

## Database & Migrations

### Migrations

```bash
php artisan make:migration create_users_table              # Create migration
php artisan make:migration add_column_to_users_table       # Add column migration
php artisan migrate                                        # Run migrations
php artisan migrate:fresh                                  # Drop all tables and re-run
php artisan migrate:refresh                                # Rollback and re-run
php artisan migrate:reset                                  # Rollback all migrations
php artisan migrate:rollback                               # Rollback last batch
php artisan migrate:rollback --step=3                      # Rollback specific steps
php artisan migrate:status                                 # Show migration status
php artisan migrate --seed                                 # Run migrations with seeding
```

### Seeders

```bash
php artisan make:seeder UserSeeder                         # Create seeder
php artisan db:seed                                        # Run database seeders
php artisan db:seed --class=UserSeeder                     # Run specific seeder
php artisan migrate:fresh --seed                           # Fresh migration with seeding
```

### Database

```bash
php artisan db:show                                        # Display database info
php artisan db:table users                                 # Display table info
php artisan db:monitor                                     # Monitor database connections
php artisan db:wipe                                        # Drop all tables
```

---

## Models & Eloquent

```bash
php artisan make:model User                                # Create model
php artisan make:model User -m                             # Model with migration
php artisan make:model User -c                             # Model with controller
php artisan make:model User -r                             # Model with resource controller
php artisan make:model User -mcs                           # Model with migration, controller, seeder
php artisan make:model User --all                          # Model with all resources
php artisan make:model User --factory                      # Model with factory
php artisan make:model User --pivot                        # Create pivot model
php artisan model:show User                                # Display model information
```

---

## Controllers

```bash
php artisan make:controller UserController                 # Create controller
php artisan make:controller UserController --resource      # Resource controller
php artisan make:controller UserController --api           # API resource controller
php artisan make:controller UserController --model=User    # Controller with model
php artisan make:controller UserController --invokable     # Single action controller
```

---

## Routes

```bash
php artisan route:list                                     # List all routes
php artisan route:list --except-vendor                     # Exclude vendor routes
php artisan route:list --path=api                          # Filter by path
php artisan route:cache                                    # Cache routes
php artisan route:clear                                    # Clear route cache
```

---

## Views & Blade

```bash
php artisan make:view home                                 # Create blade view
php artisan make:view layouts.app                          # Create nested view
php artisan make:component Alert                           # Create component
php artisan make:component forms.input --view              # Component with view
php artisan view:cache                                     # Compile all views
php artisan view:clear                                     # Clear compiled views
```

---

## Authentication & Authorization

```bash
php artisan make:auth                                      # Create auth scaffolding (older versions)
php artisan make:policy UserPolicy                         # Create policy
php artisan make:policy UserPolicy --model=User            # Policy with model
php artisan make:request StoreUserRequest                  # Create form request
php artisan make:middleware CheckAge                       # Create middleware
```

---

## Caching

```bash
php artisan cache:clear                                    # Clear application cache
php artisan config:cache                                   # Cache configuration
php artisan config:clear                                   # Clear config cache
php artisan route:cache                                    # Cache routes
php artisan route:clear                                    # Clear route cache
php artisan view:cache                                     # Cache views
php artisan view:clear                                     # Clear view cache
php artisan event:cache                                    # Cache events
php artisan event:clear                                    # Clear event cache
```

---

## Queue & Jobs

```bash
php artisan make:job SendEmailJob                          # Create job
php artisan queue:work                                     # Process queue jobs
php artisan queue:work --once                              # Process single job
php artisan queue:work --stop-when-empty                   # Stop when queue empty
php artisan queue:listen                                   # Listen for jobs
php artisan queue:restart                                  # Restart queue workers
php artisan queue:retry all                                # Retry all failed jobs
php artisan queue:retry <id>                               # Retry specific job
php artisan queue:failed                                   # List failed jobs
php artisan queue:flush                                    # Delete all failed jobs
php artisan queue:forget <id>                              # Delete failed job
php artisan queue:table                                    # Create queue migration
```

---

## Testing

```bash
php artisan make:test UserTest                             # Create test
php artisan make:test UserTest --unit                      # Create unit test
php artisan test                                           # Run tests
php artisan test --filter UserTest                         # Run specific test
php artisan test --parallel                                # Run tests in parallel
php artisan dusk                                           # Run browser tests
php artisan dusk:install                                   # Install Dusk
```

---

## Maintenance

### Storage & Links

```bash
php artisan storage:link                                   # Create storage symbolic link
```

### Events & Listeners

```bash
php artisan make:event UserRegistered                      # Create event
php artisan make:listener SendWelcomeEmail                 # Create listener
php artisan event:generate                                 # Generate events/listeners
php artisan event:list                                     # List events and listeners
```

### Notifications

```bash
php artisan make:notification InvoicePaid                  # Create notification
php artisan notifications:table                            # Create notifications table
```

### Mail

```bash
php artisan make:mail WelcomeEmail                         # Create mail class
php artisan make:mail WelcomeEmail --markdown=emails.welcome  # With markdown
```

### Factories

```bash
php artisan make:factory UserFactory                       # Create factory
php artisan make:factory UserFactory --model=User          # Factory for model
```

### Resources

```bash
php artisan make:resource UserResource                     # Create API resource
php artisan make:resource UserCollection                   # Create collection resource
```

### Rules

```bash
php artisan make:rule Uppercase                            # Create validation rule
```

### Providers

```bash
php artisan make:provider CustomServiceProvider            # Create service provider
```

### Commands

```bash
php artisan make:command SendEmails                        # Create custom command
```

### Channels

```bash
php artisan make:channel OrderChannel                      # Create broadcast channel
```

### Exceptions

```bash
php artisan make:exception CustomException                 # Create custom exception
```

### Observers

```bash
php artisan make:observer UserObserver --model=User        # Create observer
```

### Scopes

```bash
php artisan make:scope AncientScope                        # Create query scope
```

### Casts

```bash
php artisan make:cast Json                                 # Create custom cast
```

---

## NPM Commands (Frontend Assets)

```bash
npm install                         # Install dependencies
npm run dev                         # Run development build
npm run build                       # Build for production
npm run watch                       # Watch for changes
npm run hot                         # Hot module replacement
```

---

## Useful Combinations

```bash
# Fresh install with seed data
php artisan migrate:fresh --seed

# Create full CRUD resource
php artisan make:model Post -mcr

# Create complete feature
php artisan make:model Product --all

# Clear all caches
php artisan optimize:clear

# Prepare for production
php artisan config:cache
php artisan route:cache
php artisan view:cache
composer install --optimize-autoloader --no-dev

# Reset development environment
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

---

## Environment Variables

```bash
APP_ENV=local                       # Application environment
APP_DEBUG=true                      # Debug mode
APP_KEY=                           # Application key (generate with: php artisan key:generate)
APP_URL=http://localhost            # Application URL

DB_CONNECTION=mysql                 # Database driver
DB_HOST=127.0.0.1                  # Database host
DB_PORT=3306                       # Database port
DB_DATABASE=laravel                # Database name
DB_USERNAME=root                   # Database user
DB_PASSWORD=                       # Database password

QUEUE_CONNECTION=sync              # Queue driver
CACHE_DRIVER=file                  # Cache driver
SESSION_DRIVER=file                # Session driver
```

---

## Tips & Tricks

### Generate Application Key

```bash
php artisan key:generate
```

### List All Artisan Commands with Description

```bash
php artisan list
```

### Clear Everything

```bash
php artisan optimize:clear
# This runs: view:clear, cache:clear, route:clear, config:clear, clear-compiled
```

### Schedule Commands

```bash
php artisan schedule:run            # Run scheduled commands
php artisan schedule:list           # List scheduled commands
php artisan schedule:work           # Run scheduler continuously
```

### IDE Helper (Laravel IDE Helper Package)

```bash
composer require --dev barryvdh/laravel-ide-helper
php artisan ide-helper:generate     # Generate helper files
php artisan ide-helper:models       # Generate model annotations
php artisan ide-helper:meta         # Generate PhpStorm meta file
```

---

## Common Workflow

### Starting a New Project

```bash
composer create-project laravel/laravel project-name
cd project-name
php artisan key:generate
php artisan migrate
php artisan serve
```

### Adding Authentication (Laravel Breeze)

```bash
composer require laravel/breeze --dev
php artisan breeze:install
npm install && npm run dev
php artisan migrate
```

### Adding Authentication (Laravel Jetstream)

```bash
composer require laravel/jetstream
php artisan jetstream:install livewire
npm install && npm run dev
php artisan migrate
```

---

**Note:** Some commands may vary slightly depending on your Laravel version. This cheat sheet covers Laravel 9, 10, and 11 commands.
