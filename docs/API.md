# Solusite Storefront API

Dokumentasi endpoint publik untuk storefront (katalog produk digital, fokus CMS).

- **Base URL:** `{API}` → semua path di bawah diawali `/api`. Contoh: `https://api.solusite.studio/api`
- **Format:** JSON, semua field **snake_case**.
- **Wrapping:** list dibungkus `{ "data": [...] }`, detail dibungkus `{ "data": {...} }`.
- **Auth:** tidak ada (read-only publik).
- **Header:** kirim `Accept: application/json`.

> Frontend boleh fallback ke data dummy bila API kosong/mati — response tidak akan crash.

---

## Ringkasan Endpoint

| Method | Path | Keterangan |
|--------|------|------------|
| GET | `/api/products` | Semua produk (tidak dipaginasi, untuk grouping per kategori) |
| GET | `/api/products/{id}` | Detail satu produk |
| GET | `/api/categories` | Kategori aktif, urut `sort_order` |
| GET | `/api/discounts` | Semua diskon (frontend memfilter aktif berdasarkan tanggal) |
| GET | `/api/settings` | Pengaturan situs: logo, kontak CTA (WhatsApp/email), media sosial |

Endpoint lama `services`, `plans`, `portfolio` **sudah dihapus** (akan balas `404`).

---

## 1. GET /api/products

Mengembalikan seluruh katalog (sudah urut). Group di sisi frontend berdasarkan `category` (slug).

**Response `200`**
```json
{
  "data": [
    {
      "id": 1,
      "category_id": 1,
      "category": "cms",
      "name": "Solusite CMS",
      "short": "CMS modern untuk website company profile.",
      "description": "Sistem manajemen konten serbaguna untuk membangun website company profile ...",
      "price": 1989000,
      "label": "CMS",
      "status": "published",
      "type": "app",
      "availability": "ready",
      "tags": ["Mudah dikelola", "Responsif", "SEO"],
      "thumbnail": null,
      "thumbnail_url": null,
      "demo_url": "https://demo.solusite.studio/solusite-cms",
      "static_price": 500000,
      "dynamic_price": 1989000,
      "final_price": 500000,
      "original_price": 625000,
      "created_at": "2026-06-27T09:43:31.000000Z",
      "updated_at": "2026-06-27T09:43:31.000000Z"
    }
  ]
}
```

### Field produk

| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | int | ID produk |
| `category_id` | int | ID kategori |
| `category` | string | **Slug** kategori (`cms`, `others`, …). Petakan slug→nama via `/categories`. |
| `name` | string | Nama produk |
| `short` | string | Deskripsi singkat (untuk kartu) |
| `description` | string | Deskripsi lengkap |
| `price` | number | Harga acuan. Untuk CMS = `dynamic_price`. |
| `label` | string\|null | Badge kecil (mis. "CMS") |
| `status` | string | `published` / dll |
| `type` | string | `app` \| `source-code` |
| `availability` | string | `ready` \| `custom` |
| `tags` | string[] | Tag manfaat (bukan tag teknis) |
| `thumbnail` | string\|null | Path mentah (abaikan, pakai `thumbnail_url`) |
| `thumbnail_url` | string\|null | URL gambar siap pakai |
| `demo_url` | string\|null | Link live preview/demo (tombol "Lihat Demo") |
| `static_price` | int\|null | Harga paket **Statis** (khusus CMS). Default 500.000 |
| `dynamic_price` | int\|null | Harga paket **Dinamis** (khusus CMS). Default 1.989.000 |
| `final_price` | number | Harga jual "mulai dari" (lihat Aturan Harga) — hitungan server |
| `original_price` | number\|null | Harga coret (marketing) — `null` bila tidak ada diskon aktif |

---

## 2. GET /api/products/{id}

**Response `200`** → `{ "data": { ...sama seperti item di atas... } }`
**Response `404`** → produk tidak ditemukan.

Untuk halaman **detail CMS**, tampilkan 2 paket:
- **Statis** = `static_price`
- **Dinamis** = `dynamic_price`

Harga coret per paket dihitung frontend dari diskon aktif produk (lihat Aturan Harga).

---

## 3. GET /api/categories

Hanya kategori aktif, urut `sort_order` (`cms` paling depan).

**Response `200`**
```json
{
  "data": [
    { "id": 1, "slug": "cms", "name": "CMS", "description": "Kelola isi website sendiri tanpa coding.", "sort_order": 1, "is_active": true },
    { "id": 2, "slug": "others", "name": "Lainnya", "description": "Solusi bisnis lain seperti CRM, POS.", "sort_order": 2, "is_active": true }
  ]
}
```

| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | int | ID kategori |
| `slug` | string | Dipakai untuk mencocokkan `product.category` |
| `name` | string | Nama tampil |
| `description` | string\|null | Deskripsi kategori |
| `sort_order` | int | Urutan tampil |
| `is_active` | bool | Selalu `true` di endpoint ini |

> Kategori bersifat **dinamis** (bisa ditambah lewat admin), jadi jangan hardcode daftarnya.

---

## 4. GET /api/discounts

Mengembalikan **semua** diskon. Frontend memfilter yang aktif (boleh pakai `currently_active` dari server, atau hitung sendiri dari `starts_at`/`ends_at`).

**Response `200`**
```json
{
  "data": [
    {
      "id": 1,
      "product_id": 1,
      "type": "percentage",
      "value": 20,
      "starts_at": "2026-06-20",
      "ends_at": "2026-12-27",
      "is_active": true,
      "currently_active": true
    },
    {
      "id": 3,
      "product_id": 4,
      "type": "fixed",
      "value": 200000,
      "starts_at": "2026-06-20",
      "ends_at": "2026-12-27",
      "is_active": true,
      "currently_active": true
    }
  ]
}
```

| Field | Tipe | Keterangan |
|-------|------|------------|
| `id` | int | ID diskon |
| `product_id` | int | Produk yang didiskon (cocokkan ke `product.id`) |
| `type` | string | `percentage` \| `fixed` |
| `value` | number | `20` (persen) atau `200000` (rupiah) |
| `starts_at` | string\|null | `YYYY-MM-DD` |
| `ends_at` | string\|null | `YYYY-MM-DD` |
| `is_active` | bool | Toggle aktif dari admin |
| `currently_active` | bool | `is_active` **dan** tanggal sekarang dalam rentang (dihitung server) |

---

## 5. GET /api/settings

Pengaturan situs yang dikelola admin (mengganti nilai hardcode di frontend: logo, WhatsApp, email, dll). Selalu mengembalikan objek penuh dengan nilai default bila belum disetel.

**Response `200`**
```json
{
  "data": {
    "site_name": "Solusite Studio",
    "tagline": "Website & aplikasi siap pakai untuk bisnis Anda.",
    "logo_url": "https://.../storage/settings/logo.png",
    "whatsapp_number": "6281234567890",
    "whatsapp_message": "Halo Solusite, saya tertarik dengan produk Anda.",
    "email": "hello@solusite.studio",
    "phone": "+62 812-3456-7890",
    "address": "Jakarta, Indonesia",
    "instagram_url": "https://instagram.com/solusite.studio",
    "facebook_url": "",
    "tiktok_url": "",
    "youtube_url": ""
  }
}
```

| Field | Tipe | Keterangan |
|-------|------|------------|
| `site_name` | string | Nama situs |
| `tagline` | string | Deskripsi singkat (hero/header) |
| `logo_url` | string\|null | URL logo siap pakai (`null` bila belum diunggah) |
| `whatsapp_number` | string | Nomor WA format internasional tanpa `+` (mis. `62812...`) |
| `whatsapp_message` | string | Teks prefilled saat tombol WhatsApp diklik |
| `email` | string | Email kontak |
| `phone` | string | Nomor telepon |
| `address` | string | Alamat |
| `instagram_url` / `facebook_url` / `tiktok_url` / `youtube_url` | string | URL sosial (string kosong bila tidak diisi) |

**Contoh link CTA WhatsApp:**
```ts
const wa = `https://wa.me/${s.whatsapp_number}?text=${encodeURIComponent(s.whatsapp_message)}`;
```

> Objeknya **bukan** list — baca langsung `data` sebagai objek (bukan array).

---

## Aturan Harga (PENTING)

Diskon **murni marketing** — harga jual **tidak** dikurangi. Diskon hanya menaikkan "harga coret" yang dicoret di atas harga jual.

### Harga jual final ("mulai dari")
- Produk **CMS** (`category === "cms"`) → `static_price` (default **Rp500.000**)
- Produk **non-CMS** → `price`

Server sudah mengirimnya sebagai `final_price`.

### Harga coret (dari diskon aktif terhadap harga final)
- `type === "percentage"` → `coret = round(final / (1 - value/100))`
- `type === "fixed"`      → `coret = final + value`

Server mengirimnya sebagai `original_price` (untuk harga "mulai dari"). Untuk paket Statis/Dinamis di halaman detail, hitung sendiri dengan rumus yang sama memakai `static_price` / `dynamic_price` sebagai `final`.

**Contoh hitung di frontend (JS/TS):**
```ts
function strikethrough(final: number, d?: { type: string; value: number }) {
  if (!d) return null;
  return d.type === "percentage"
    ? Math.round(final / (1 - d.value / 100))
    : Math.round(final + d.value);
}

// Solusite CMS, paket Statis 500.000, diskon LAUNCH20 (20%)
strikethrough(500000, { type: "percentage", value: 20 }); // 625000
// Landing Page CMS, paket Statis 500.000, diskon fixed 200.000
strikethrough(500000, { type: "fixed", value: 200000 });   // 700000
```

### Mencocokkan diskon ke produk
```ts
const active = discounts.find(
  (d) => d.product_id === product.id && d.currently_active
);
```

---

## Contoh perilaku terverifikasi

| Produk | category | final_price | original_price | diskon |
|--------|----------|-------------|----------------|--------|
| Solusite CMS | cms | 500000 | 625000 | 20% |
| Toko Online CMS | cms | 500000 | 588235 | 15% |
| Landing Page CMS | cms | 500000 | 700000 | fixed 200rb |
| Sekolah CMS | cms | 500000 | 666667 | 25% |
| Blog & Berita CMS | cms | 500000 | `null` | — |
| POS Kasir | others | 2500000 | 2941176 | 15% |
| CRM Pelanggan | others | 3500000 | 4375000 | 20% |
| Booking Online | others | 2800000 | `null` | — |

---

## Catatan integrasi
- Selalu baca data dari key `data`.
- `category` di produk adalah **slug** — gabungkan dengan `/categories` untuk dapat nama tampil.
- Field harga (`price`, `static_price`, `dynamic_price`, `final_price`, `original_price`) dalam **Rupiah penuh** (bukan sen), tinggal `toLocaleString('id-ID')`.
- `original_price` `null` artinya tidak perlu menampilkan harga coret.
