# Solusite Admin Pro - Laravel Admin Panel

Solusite Admin Pro is a Laravel 12 admin panel template for operations dashboards, ecommerce, CRM, billing, support desk, admin access, UI kit, and buyer documentation. The codebase uses Blade layouts/components and centralized demo data for easy customization.

## Preview

Screenshots were captured after UI animations settled.

<table>
  <tr>
    <td><img src="public/screenshots/01-dashboard.png" alt="Dashboard preview"><br><strong>Dashboard</strong></td>
    <td><img src="public/screenshots/02-orders.png" alt="Orders preview"><br><strong>Orders</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/03-products.png" alt="Products preview"><br><strong>Products</strong></td>
    <td><img src="public/screenshots/04-customers.png" alt="Customers preview"><br><strong>Customers</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/05-invoices.png" alt="Invoices preview"><br><strong>Invoices</strong></td>
    <td><img src="public/screenshots/06-support-tickets.png" alt="Support tickets preview"><br><strong>Support Tickets</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/07-reports.png" alt="Reports preview"><br><strong>Reports</strong></td>
    <td><img src="public/screenshots/08-ecommerce.png" alt="Ecommerce preview"><br><strong>Ecommerce</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/09-kanban.png" alt="Kanban preview"><br><strong>Kanban</strong></td>
    <td><img src="public/screenshots/10-calendar.png" alt="Calendar preview"><br><strong>Calendar</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/11-users.png" alt="Users preview"><br><strong>Users</strong></td>
    <td><img src="public/screenshots/12-settings.png" alt="Settings preview"><br><strong>Settings</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/13-ui-kit.png" alt="UI kit preview"><br><strong>UI Kit</strong></td>
    <td><img src="public/screenshots/14-login.png" alt="Login preview"><br><strong>Login</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/15-documentation.png" alt="Documentation preview"><br><strong>Documentation</strong></td>
    <td><img src="public/screenshots/16-register.png" alt="Register preview"><br><strong>Register</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/17-profile.png" alt="Profile preview"><br><strong>Profile</strong></td>
    <td><img src="public/screenshots/18-invoice-detail.png" alt="Invoice detail preview"><br><strong>Invoice Detail</strong></td>
  </tr>
  <tr>
    <td><img src="public/screenshots/19-ecommerce-detail.png" alt="Ecommerce detail preview"><br><strong>Ecommerce Detail</strong></td>
    <td><img src="public/screenshots/20-pricing.png" alt="Pricing preview"><br><strong>Pricing</strong></td>
  </tr>
</table>

## Quick Start

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan serve
```

Open `http://127.0.0.1:8000` or the URL shown by Artisan.

## Included Pages

- Dashboard: metric cards, chart, quick actions, recent orders.
- Orders: order queue, filter bar, action buttons, data table.
- Products: inventory CRUD layout, modal form, bulk action.
- Customers: CRM health, retention playbook, segment filter.
- Invoices: billing register, invoice preview, status tracking.
- Support Tickets: SLA board, ticket queue, priority badges.
- Reports: channel revenue, funnel, top products.
- Users, Roles, Settings, Audit Log, Profile.
- Auth: login and register.
- UI Kit: buttons, badges, form controls, palette.
- Documentation: install, structure, customization, release notes.

## Structure

- `routes/web.php`: named routes and legacy `.html` redirects.
- `app/Http/Controllers/PanelController.php`: thin page controller.
- `app/Support/PanelData.php`: demo data, navigation, metrics, tables, docs.
- `resources/views/layouts`: main app and auth layouts.
- `resources/views/components`: reusable Blade components.
- `resources/views/panel`: page views.
- `public/assets/css/app.css`: production CSS.
- `public/assets/js/app.js`: production JavaScript.

## Customization

- Update sidebar navigation from `PanelData::navigation()`.
- Replace demo arrays in `PanelData` with Eloquent models or API resources.
- Adjust design tokens in `public/assets/css/app.css`.
- Keep page URLs using named routes to avoid broken links.

## Quality Checks

```bash
composer validate --strict
php artisan test
./vendor/bin/pint --test
```

## Envato Packaging Notes

Include the full Laravel project, `public/assets`, `.env.example`, this README, and any preview screenshots. Do not include local secrets, generated caches, or environment-specific files.
