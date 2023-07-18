@echo off

REM Copia el archivo .env.example como .env
copy .env.example .env

REM Genera una nueva clave de la aplicación
php artisan key:generate

REM Instala las dependencias de Node.js
start /B npm install

REM Actualiza las dependencias con Composer
start /B composer update



REM Compila los assets
start /B npm run dev

REM Inicia el servidor de desarrollo
start /B php artisan serve

REM Ejecuta las migraciones y los seeders
php artisan migrate:fresh --seed
