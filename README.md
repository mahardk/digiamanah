```bash
git clone <repo-url>
cd digiamanah

composer install
npm install

cp .env.example .env
php artisan key:generate
```

Edit `.env`, sesuaikan minimal:
```
DB_DATABASE=digiamanah
DB_USERNAME=root
DB_PASSWORD=
FILESYSTEM_DISK=public
```

```bash
php artisan migrate
php artisan storage:link
php artisan make:filament-user   # buat akun admin sendiri
npm run build
```