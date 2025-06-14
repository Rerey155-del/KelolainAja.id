# 🚀 Laravel Project Setup Guide

Panduan ini akan membantu Anda menjalankan proyek Laravel ini secara lokal.

---

## 📥 Clone Repository
```git clone https://github.com/username/KelolainAja.id.git```

### masukkan ke directory folder tersebut
```cd KelolainAja.id```

## Install Depedencies
```composer install```

##  buka terminal kedua pada vscode dan install module 
```npm install```

## Jalankan modul vite nya
```npm run dev```

## copy env ini
```cp .env.example .env```

## Generate App Key
```php artisan key:generate```

## Periksa konfigurasi Database
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:XImOWiqnioS8JjD8JVbuwFP6RhRJhoX7czI973QRrxg=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=KELO
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DISK=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=database
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_HOST=
PUSHER_PORT=443
PUSHER_SCHEME=https
PUSHER_APP_CLUSTER=mt1

VITE_APP_NAME="${APP_NAME}"
VITE_APP_URL="${APP_URL}"


```
## Jalankan Migrasi Database
```php artisan migrate```

## Lakukan pemanggilan video storage
```php artisan storage:link```

## Jalankan Server Laravel
```php artisan serve```





