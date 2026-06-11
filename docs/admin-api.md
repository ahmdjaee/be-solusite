# Public Landing REST API Documentation

Dokumen ini untuk integrasi landing page frontend portfolio product digital dengan backend Laravel API.

## Base URL

```text
http://localhost:8000/api/admin
```

Sesuaikan host/port dengan environment backend.

## Authentication

Endpoint API public untuk landing page dan tidak membutuhkan token.

Header yang disarankan:

```http
Accept: application/json
Content-Type: application/json
```

## Common Response

Index endpoint mengembalikan Laravel paginated resource:

```json
{
  "data": [],
  "links": {
    "first": "http://localhost:8000/api/admin/products?page=1",
    "last": "http://localhost:8000/api/admin/products?page=1",
    "prev": null,
    "next": null
  },
  "meta": {
    "current_page": 1,
    "from": 1,
    "last_page": 1,
    "path": "http://localhost:8000/api/admin/products",
    "per_page": 15,
    "to": 3,
    "total": 3
  }
}
```

Status umum:

```text
200 OK              index/show/update
201 Created         store
204 No Content      delete
404 Not Found       resource tidak ditemukan
422 Unprocessable   validation error
```

Validation error mengikuti Laravel default:

```json
{
  "message": "The given data was invalid.",
  "errors": {
    "name": ["The name field is required."]
  }
}
```

## Data Rules

Enum:

```text
Product type: app | source-code
Availability: ready | custom
Discount type: percentage | fixed
```

Field list dikirim sebagai JSON array:

```json
{
  "tags": ["Laravel", "SaaS"],
  "features": ["REST API", "Admin panel"],
  "stack": ["Laravel", "MySQL"]
}
```

Discount rules:

```text
percentage value maksimal 100
fixed value harus lebih besar dari 0
starts_at tidak boleh lebih besar dari ends_at
currently_active true jika is_active true dan tanggal sekarang dalam periode starts_at/ends_at
```

Format tanggal yang disarankan:

```text
YYYY-MM-DD HH:mm:ss
2026-06-11 10:30:00
```

## Products

Endpoints:

```http
GET    /products
POST   /products
GET    /products/{product}
PUT    /products/{product}
PATCH  /products/{product}
DELETE /products/{product}
```

Object:

```json
{
  "id": 1,
  "name": "Starter SaaS Boilerplate",
  "short": "Laravel SaaS starter kit.",
  "description": "Boilerplate SaaS untuk mempercepat development dashboard.",
  "price": 2500000,
  "label": "Bestseller",
  "status": "published",
  "type": "app",
  "availability": "ready",
  "tags": ["Laravel", "SaaS", "API"],
  "thumbnail": "https://placehold.co/600x400?text=Starter+SaaS",
  "discount_amount": 500000,
  "final_price": 2000000,
  "created_at": "2026-06-11T04:16:53.000000Z",
  "updated_at": "2026-06-11T04:16:53.000000Z"
}
```

Create/update payload:

```json
{
  "name": "Starter SaaS Boilerplate",
  "short": "Laravel SaaS starter kit.",
  "description": "Boilerplate SaaS untuk mempercepat development dashboard dan API.",
  "price": 2500000,
  "label": "Bestseller",
  "status": "published",
  "type": "app",
  "availability": "ready",
  "tags": ["Laravel", "SaaS", "API"],
  "thumbnail": "https://placehold.co/600x400?text=Starter+SaaS"
}
```

Required: `name`, `short`, `description`, `price`, `status`, `type`, `availability`.

## Services

Endpoints:

```http
GET    /services
POST   /services
GET    /services/{service}
PUT    /services/{service}
PATCH  /services/{service}
DELETE /services/{service}
```

Object:

```json
{
  "id": 1,
  "name": "MVP Product Build",
  "description": "Pembuatan MVP web app dari scope sampai deployment awal.",
  "level": "Advanced",
  "price": 12000000,
  "availability": "custom",
  "features": ["Discovery", "Backend API", "Deployment"],
  "created_at": "2026-06-11T04:16:53.000000Z",
  "updated_at": "2026-06-11T04:16:53.000000Z"
}
```

Create/update payload:

```json
{
  "name": "MVP Product Build",
  "description": "Pembuatan MVP web app dari scope sampai deployment awal.",
  "level": "Advanced",
  "price": 12000000,
  "availability": "custom",
  "features": ["Discovery", "UI implementation", "Backend API", "Deployment"]
}
```

Required: `name`, `description`, `level`, `price`, `availability`.

## Portfolio

Endpoints:

```http
GET    /portfolio
POST   /portfolio
GET    /portfolio/{portfolio}
PUT    /portfolio/{portfolio}
PATCH  /portfolio/{portfolio}
DELETE /portfolio/{portfolio}
```

Object:

```json
{
  "id": 1,
  "name": "Property Listing Platform",
  "description": "Platform listing properti dengan search dan dashboard agent.",
  "stack": ["Laravel", "MySQL", "Bootstrap", "REST API"],
  "created_at": "2026-06-11T04:16:53.000000Z",
  "updated_at": "2026-06-11T04:16:53.000000Z"
}
```

Create/update payload:

```json
{
  "name": "Property Listing Platform",
  "description": "Platform listing properti dengan search, lead capture, dan dashboard agent.",
  "stack": ["Laravel", "MySQL", "Bootstrap", "REST API"]
}
```

Required: `name`, `description`.

## Plans

Endpoints:

```http
GET    /plans
POST   /plans
GET    /plans/{plan}
PUT    /plans/{plan}
PATCH  /plans/{plan}
DELETE /plans/{plan}
```

Object:

```json
{
  "id": 1,
  "name": "Growth",
  "description": "Paket populer untuk product digital dengan API dan dashboard lengkap.",
  "price": 9500000,
  "highlight": true,
  "features": ["Custom modules", "REST API", "Auth", "Deployment support"],
  "created_at": "2026-06-11T04:16:53.000000Z",
  "updated_at": "2026-06-11T04:16:53.000000Z"
}
```

Create/update payload:

```json
{
  "name": "Growth",
  "description": "Paket populer untuk product digital dengan API dan dashboard lengkap.",
  "price": 9500000,
  "highlight": true,
  "features": ["Custom modules", "REST API", "Auth", "Deployment support"]
}
```

Required: `name`, `description`, `price`.

## Discounts

Endpoints:

```http
GET    /discounts
POST   /discounts
GET    /discounts/{discount}
PUT    /discounts/{discount}
PATCH  /discounts/{discount}
DELETE /discounts/{discount}
```

Object:

```json
{
  "id": 1,
  "product_id": 1,
  "product": {
    "id": 1,
    "name": "Starter SaaS Boilerplate",
    "price": 2500000,
    "discount_amount": 500000,
    "final_price": 2000000
  },
  "name": "SaaS Launch Promo",
  "code": "SAASLAUNCH20",
  "type": "percentage",
  "value": 20,
  "starts_at": "2026-06-10T04:16:53.000000Z",
  "ends_at": "2026-07-11T04:16:53.000000Z",
  "is_active": true,
  "currently_active": true,
  "created_at": "2026-06-11T04:16:53.000000Z",
  "updated_at": "2026-06-11T04:16:53.000000Z"
}
```

Create/update percentage payload:

```json
{
  "product_id": 1,
  "name": "SaaS Launch Promo",
  "code": "SAASLAUNCH20",
  "type": "percentage",
  "value": 20,
  "starts_at": "2026-06-10 00:00:00",
  "ends_at": "2026-07-11 23:59:59",
  "is_active": true
}
```

Create/update fixed payload:

```json
{
  "product_id": 2,
  "name": "Source Code Discount",
  "code": "SOURCE500K",
  "type": "fixed",
  "value": 500000,
  "starts_at": "2026-06-10 00:00:00",
  "ends_at": "2026-06-30 23:59:59",
  "is_active": true
}
```

Required: `product_id`, `name`, `code`, `type`, `value`.

## PATCH Partial Update

Endpoint `PATCH` menerima field parsial:

```http
PATCH /api/admin/products/1
```

```json
{
  "price": 2750000,
  "status": "published"
}
```

## Frontend Integration Notes

```ts
const API_BASE_URL = "http://localhost:8000/api/admin";

async function apiFetch(path: string, options: RequestInit = {}) {
  return fetch(`${API_BASE_URL}${path}`, {
    ...options,
    headers: {
      Accept: "application/json",
      "Content-Type": "application/json",
      ...(options.headers || {}),
    },
  });
}
```

Fetch list:

```ts
const response = await apiFetch("/products?page=1");
const json = await response.json();
const products = json.data;
const pagination = json.meta;
```

Create:

```ts
await apiFetch("/products", {
  method: "POST",
  body: JSON.stringify(payload),
});
```

Update:

```ts
await apiFetch(`/products/${id}`, {
  method: "PATCH",
  body: JSON.stringify(payload),
});
```

Delete:

```ts
await apiFetch(`/products/${id}`, {
  method: "DELETE",
});
```

Delete sukses mengembalikan `204 No Content`, jadi frontend tidak perlu parse JSON.
