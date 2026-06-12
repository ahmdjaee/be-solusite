# GitHub Actions Deployment

Workflow `.github/workflows/deploy.yml` menjalankan test Laravel pada pull request dan push ke `master`. Deployment VPS hanya berjalan setelah test sukses pada branch `master`.

## GitHub secrets

Tambahkan repository secrets berikut melalui **Settings > Secrets and variables > Actions**:

| Secret | Wajib | Contoh |
| --- | --- | --- |
| `VPS_HOST` | Ya | `203.0.113.10` |
| `VPS_USER` | Ya | `deploy` |
| `VPS_SSH_KEY` | Ya | Private key SSH user deploy |
| `VPS_PORT` | Ya | `22` |
| `VPS_DEPLOY_PATH` | Tidak | `/var/www/be-solusite` |
| `VPS_PHP_BINARY` | Tidak | `/usr/bin/php8.3` |
| `VPS_COMPOSER_BINARY` | Tidak | `/usr/local/bin/composer` |

Nilai default secret opsional adalah `/var/www/be-solusite`, `php`, dan `composer`.

## Persiapan VPS

Repository harus sudah di-clone pada deploy path dan memiliki file `.env` production. User SSH harus dapat menjalankan Git, Composer, PHP Artisan, serta menulis ke `storage` dan `bootstrap/cache`.

Document root Nginx atau Apache harus diarahkan ke:

```text
/var/www/be-solusite/public
```

Jalankan setup awal satu kali di VPS:

```bash
cd /var/www/be-solusite
composer install --no-dev --prefer-dist --optimize-autoloader
cp .env.example .env
php artisan key:generate
php artisan migrate --force
php artisan storage:link
chmod -R ug+rwX storage bootstrap/cache
```

Sesuaikan `.env` untuk database, URL aplikasi, mail, dan konfigurasi production sebelum deployment pertama. Workflow tidak mengganti `.env` dan tidak menjalankan seeder.
