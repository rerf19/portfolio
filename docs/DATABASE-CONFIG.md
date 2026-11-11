# Database & Cache Configuration Guide

## Overview

This document explains your Laravel database configuration and how to switch between file-based and database-based storage for cache, sessions, and queues.

## Current Configuration ✅

Your `.env` file is now configured with:

### Database Connection (MySQL Container)

```env
DB_CONNECTION=mysql
DB_HOST=mysql              # Docker container name
DB_PORT=3306
DB_DATABASE=laravel        # Database created by docker-compose
DB_USERNAME=root
DB_PASSWORD=rootpassword   # As defined in docker-compose.yml
```

### File-Based Storage (No Database Required)

```env
CACHE_STORE=file           # Cache stored in storage/framework/cache
SESSION_DRIVER=file        # Sessions stored in storage/framework/sessions
QUEUE_CONNECTION=sync      # Jobs run synchronously (no queue)
```

---

## Why You Had the Error

The error occurred because:

1. **Cache, Session, and Queue were set to `database`** - requiring MySQL connection
2. **Database host was `127.0.0.1`** instead of `mysql` (Docker container name)
3. **Database credentials didn't match** docker-compose.yml settings
4. When you ran `php artisan cache:clear`, it tried to connect to MySQL to delete cache records

---

## How to Use

### Option 1: File-Based Storage (Current - No Database Needed) ✅

**Advantages:**

- ✅ Works immediately without database
- ✅ No database connection errors
- ✅ Perfect for development
- ✅ Faster for small applications

**Current Settings:**

```env
CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

**Commands that work now:**

```bash
php artisan cache:clear      # ✅ Works - clears file cache
php artisan config:cache     # ✅ Works
php artisan route:cache      # ✅ Works
php artisan view:clear       # ✅ Works
```

---

### Option 2: Database Storage (Requires MySQL Running)

If you want to use database for cache/sessions/queue, you need to:

#### Step 1: Start MySQL Container

```bash
# From your project root (outside container)
docker-compose up -d mysql
```

#### Step 2: Update .env

```env
CACHE_STORE=database
SESSION_DRIVER=database
QUEUE_CONNECTION=database
```

#### Step 3: Create Required Tables

```bash
# Inside your Laravel container
php artisan cache:table
php artisan session:table
php artisan queue:table
php artisan migrate
```

#### Step 4: Clear Config Cache

```bash
php artisan config:clear
```

**Advantages:**

- Better for production
- Better for multi-server setups
- Persistent sessions across server restarts
- Can manage queued jobs in database

---

## Docker Commands

### Start All Services

```bash
docker-compose up -d
```

### Start Only MySQL

```bash
docker-compose up -d mysql
```

### Check MySQL Status

```bash
docker-compose ps
```

### Access MySQL Container

```bash
docker exec -it mysql mysql -uroot -prootpassword laravel
```

### View MySQL Logs

```bash
docker-compose logs mysql
```

### Stop All Services

```bash
docker-compose down
```

---

## Quick Reference: Storage Drivers

### Cache Drivers

| Driver     | Description                         | Requires          |
| ---------- | ----------------------------------- | ----------------- |
| `file`     | Stores in `storage/framework/cache` | Nothing           |
| `database` | Stores in database table            | MySQL + migration |
| `redis`    | Stores in Redis                     | Redis server      |
| `array`    | In-memory (lost after request)      | Nothing           |

### Session Drivers

| Driver     | Description                            | Requires          |
| ---------- | -------------------------------------- | ----------------- |
| `file`     | Stores in `storage/framework/sessions` | Nothing           |
| `database` | Stores in database table               | MySQL + migration |
| `cookie`   | Encrypted in cookies                   | Nothing           |
| `redis`    | Stores in Redis                        | Redis server      |

### Queue Connections

| Driver     | Description             | Requires          |
| ---------- | ----------------------- | ----------------- |
| `sync`     | Runs jobs immediately   | Nothing           |
| `database` | Queue in database table | MySQL + migration |
| `redis`    | Queue in Redis          | Redis server      |
| `sqs`      | Amazon SQS              | AWS credentials   |

---

## Troubleshooting

### Error: "Connection refused"

**Problem:** Database not running or wrong host  
**Solution:**

```bash
# Option 1: Use file-based storage
CACHE_STORE=file
SESSION_DRIVER=file

# Option 2: Start MySQL
docker-compose up -d mysql
```

### Error: "Table 'laravel.cache' doesn't exist"

**Problem:** Cache table not created  
**Solution:**

```bash
php artisan cache:table
php artisan migrate
```

### Error: "Access denied for user"

**Problem:** Wrong database credentials  
**Solution:** Check `.env` matches `docker-compose.yml`:

```env
DB_USERNAME=root
DB_PASSWORD=rootpassword
```

### Cache Not Clearing

**Problem:** Config is cached  
**Solution:**

```bash
php artisan config:clear
php artisan cache:clear
php artisan optimize:clear
```

---

## Recommended Setup

### For Development (Current) ✅

```env
CACHE_STORE=file
SESSION_DRIVER=file
QUEUE_CONNECTION=sync
```

### For Production

```env
CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
```

### For Testing

```env
CACHE_STORE=array
SESSION_DRIVER=array
QUEUE_CONNECTION=sync
```

---

## Summary

✅ **Fixed Issues:**

1. Database host changed from `127.0.0.1` to `mysql`
2. Database name changed from `portfolio` to `laravel`
3. Database password added: `rootpassword`
4. Cache changed from `database` to `file`
5. Session changed from `database` to `file`
6. Queue changed from `database` to `sync`

✅ **What Works Now:**

- `php artisan cache:clear` - No database errors!
- `php artisan config:cache` - Works!
- All cache commands work without MySQL running

🔄 **To Switch Back to Database Storage:**

1. Start MySQL: `docker-compose up -d mysql`
2. Update .env: `CACHE_STORE=database`, `SESSION_DRIVER=database`
3. Create tables: `php artisan cache:table && php artisan session:table && php artisan migrate`
4. Clear config: `php artisan config:clear`

---

**Your Laravel application is now properly configured and ready to use! 🎉**
