# Dokumentasi Setup Admin — DigiAmanah

Dokumen ini merangkum apa yang sudah dikerjakan pada tahap **Sistem Admin** DigiAmanah, termasuk keputusan teknis, masalah yang ditemukan, dan cara mengatasinya. Tujuannya supaya seluruh tim (Web KKN) punya pemahaman yang sama sebelum melanjutkan ke bagian lain.

---

## 1. Tech Stack

| Komponen | Versi/Pilihan |
|---|---|
| Framework | Laravel 13 |
| Admin Panel | Filament v5.x |
| Database | MySQL |
| Frontend (public) | Blade + Tailwind CSS |
| Local Dev Server | Laragon (Nginx) |

---

## 2. Struktur Database

Tiga tabel utama sudah dibuat lewat migration:

### `kategoris`
- `nama`
- `slug` (unique, auto-generate dari nama)

### `umkms`
- `nama_umkm`, `nama_pemilik`, `deskripsi`, `alamat`, `whatsapp`
- `foto` (path gambar)
- `slug` (unique)

### `produks`
- `umkm_id` (foreign key → `umkms`)
- `kategori_id` (foreign key → `kategoris`)
- `nama_produk`, `slug`, `harga`, `deskripsi`
- `foto` (path gambar)
- `qr_code` (path file QR, auto-generate — **jangan diisi manual**)

**Relasi:**
- `Umkm` → `hasMany` `Produk`
- `Produk` → `belongsTo` `Umkm`, `belongsTo` `Kategori`
- `Kategori` → `hasMany` `Produk`

---

## 3. Filament Admin Resource

Tiga resource sudah dibuat: `KategoriResource`, `UmkmResource`, `ProdukResource`, masing-masing berisi:
- **Schema (Form)** — untuk create/edit
- **Table** — untuk list data
- **Infolist** — hanya untuk `Umkm` dan `Produk` (halaman read-only "View")

### Pengaturan penting per resource

| Resource | Title Attribute | View Page |
|---|---|---|
| Kategori | `nama` | Tidak |
| Umkm | `nama_umkm` | Ya |
| Produk | `nama_produk` | Ya |

### Field upload foto
- `UmkmForm` & `ProdukForm` pakai komponen `FileUpload` untuk `foto`.
- Field `slug` otomatis ter-generate dari nama saat mengetik, lalu di-disable (tidak bisa diedit manual) tapi tetap tersimpan.

### Field QR Code
Field `qr_code` **tidak ada di form** — nilainya diisi otomatis oleh sistem.

---


## 4. Generate QR Code Otomatis

### Package
```bash
composer require simplesoftwareio/simple-qrcode
```
Format yang dipakai: **SVG** (bukan PNG) — alasannya SVG tidak butuh extension `gd`/`imagick`, jadi lebih aman untuk deployment di berbagai jenis shared hosting/panel (cPanel, DirectAdmin, dll) tanpa perlu konfigurasi tambahan.

### Cara kerja
- `app/Observers/ProdukObserver.php` "mendengarkan" event `created` dan `updated` pada model `Produk`.
- Saat produk baru dibuat (atau `slug`-nya berubah), sistem otomatis generate QR berisi URL `https://.../produk/{slug}`, simpan sebagai file `.svg` ke `storage/app/public/qrcodes/`, lalu update kolom `qr_code` di database (pakai `updateQuietly()` supaya tidak memicu event lagi/infinite loop).
- Observer didaftarkan di `app/Providers/AppServiceProvider.php` method `boot()`.

---

## 5. Checklist Setup untuk Anggota Tim 

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

Akses admin di `/admin`, login dengan akun yang baru dibuat.

---
