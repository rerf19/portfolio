![status/active](https://img.shields.io/badge/STATUS-ACTIVE-%23059669?style=flat-square)

<h1 align="center">Portfolio</h1>

> My personal portfolio, built with Laravel, Inertia.js and Vue 3. Projects, work experience and the About page are managed from a Filament admin panel.

**Live:** [rodrigoferreira.dev](https://rodrigoferreira.dev)

## Features

- Home, About, Experience timeline, and Projects (grid + detail pages with screenshots and videos)
- Admin panel at `/admin` to manage projects (drag to reorder, publish/hide), experiences and the About bio
- Screenshot uploads stored on the public disk, with automatic cleanup when images or projects are removed
- Admin login created from `.env`, so no credentials live in the repo

## Tech Stack

| Layer      | Technology                                  |
| ---------- | ------------------------------------------- |
| Backend    | Laravel 11 (PHP 8.3)                        |
| Frontend   | Vue 3 + Inertia.js                          |
| Admin      | Filament                                    |
| Styling    | Tailwind CSS                                |
| Build tool | Vite                                        |
| Database   | MySQL                                       |
| Server     | Nginx + PHP-FPM (Docker locally)            |

## Getting Started (Docker)

Prerequisites: Docker and Docker Compose.

```bash
cp .env.example .env            # then set the values below
docker compose up -d
docker compose exec app composer install
docker compose exec app npm install
docker compose exec app php artisan key:generate
docker compose exec app php artisan migrate --seed
docker compose exec app php artisan storage:link
docker compose exec app npm run build
```

Open <http://localhost:8080>. For hot reload, run `docker compose exec app npm run dev` instead of `npm run build`.

### Environment

Set these in `.env`:

```env
APP_URL=http://localhost:8080      # must include the scheme and match the address you browse
DB_HOST=mysql
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=rootpassword

ADMIN_NAME="Your Name"
ADMIN_EMAIL=you@example.com
ADMIN_PASSWORD=a-long-random-password
```

`php artisan migrate --seed` creates the admin user from the `ADMIN_*` values. Log in at `/admin`. To change the password later, edit `ADMIN_PASSWORD` and run `php artisan db:seed --class=AdminUserSeeder`.

Site content is not seeded. It lives in the database, so add it through the admin panel or import a database backup.

## Testing

```bash
docker compose exec app php artisan test
```

## Deployment

```bash
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan migrate --force
php artisan storage:link
php artisan filament:optimize
```

Production notes:

- Point the nginx `root` at `public/` and route PHP through `index.php`.
- `APP_URL` must be the full public URL, e.g. `https://rodrigoferreira.dev`. Without the scheme, uploaded image URLs become relative and 404.
- `storage/` and `bootstrap/cache/` must be writable by the PHP-FPM user (usually `www-data`) and readable by nginx.
- Uploads are limited to 5 MB per image. Raise `client_max_body_size` (nginx) and `upload_max_filesize` / `post_max_size` (PHP) if you change that.

## Project Structure

```
app/Filament/        Admin panel resources (Projects, Experiences, About)
app/Http/            Controllers and Inertia middleware
app/Models/          Eloquent models
resources/js/Pages/  One Vue page per route
resources/js/Components/  Layout, header, menus, hero
routes/web.php       Public routes
tests/               Feature tests (pages, admin access, admin forms)
docs/                Developer guide and extra notes
```

See [docs/DEVELOPER_GUIDE.md](docs/DEVELOPER_GUIDE.md) for the day-to-day workflow, Inertia basics and troubleshooting.

## Contributors

[![](https://github.com/rerf19.png?size=50)](https://github.com/rerf19)

## License

See [LICENSE](LICENSE).

## Show your support

Give a ⭐️ if this project helped you!
<br>
<a href="https://www.buymeacoffee.com/rerf19" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>
