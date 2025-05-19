# 🚀 Laravel Project Setup Guide

Panduan ini akan membantu Anda menjalankan proyek Laravel ini secara lokal.

---

## 📥 Clone Repository
git clone https://github.com/username/KelolainAja.id.git
cd KelolainAja.id

## Install Depedencies
composer install

##buka terminal kedua pada vscode dan install module 
```npm install```

##Jalankan modul vite nya
npm run dev

## copy env ini
cp .env.example .env

## Generate App Key
php artisan key:generate

## Periksa konfigurasi Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=KELO
DB_USERNAME=root
DB_PASSWORD=

## Jalankan Migrasi Database
php artisan migrate

##Jalankan Server Laravel
php artisan serve





