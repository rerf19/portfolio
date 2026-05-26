![status/active](https://img.shields.io/badge/STATUS-ACTIVE-%23059669?style=flat-square)

<h1 align="center">Portfolio</h1>

> My modern personal portfolio built with Laravel, Inertia.js, and Vue 3. Showcasing my ideas, projects, and skills with a clean, professional design.

## 🚀 Tech Stack

- **Backend**: Laravel 11
- **Frontend**: Vue 3 + Inertia.js
- **Styling**: Tailwind CSS
- **Build Tool**: Vite
- **Animations**: AOS (Animate On Scroll)
- **Deployment**: Docker + Nginx

## 🛠️ Setup & Development

### Prerequisites

- Docker & Docker Compose

### Quick Start

```bash
# Start Docker containers
docker compose up -d

# Install dependencies (first time only)
docker compose exec app composer install
docker compose exec app npm install

# Build assets
docker compose exec app npm run build

# Access the site
# Open http://localhost:8080 in your browser
```

### Development Mode (Hot Reload)

```bash
docker compose exec app npm run dev
```

Then access at `http://localhost:8080`

## 🌐 Live Demo

The portfolio is live at [https://rodrigoferreira.dev](https://rodrigoferreira.dev)

## Contributors

[![](https://github.com/rerf19.png?size=50)](https://github.com/rerf19)

## Show your support

Give a ⭐️ if this project helped you!
<br>
<a href="https://www.buymeacoffee.com/rerf19" target="_blank"><img src="https://cdn.buymeacoffee.com/buttons/default-orange.png" alt="Buy Me A Coffee" height="41" width="174"></a>
